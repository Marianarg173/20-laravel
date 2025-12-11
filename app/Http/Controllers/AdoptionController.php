<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use Illuminate\Http\Request;
use App\Exports\AdoptionsExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class AdoptionController extends Controller
{
    /**
     * Mostrar listado de adopciones con búsqueda.
     */
    public function index(Request $request)
    {
        $search = $request->input('q'); // búsqueda desde input AJAX

        $adoptions = Adoption::with(['user', 'pet'])
            ->when($search, function ($query, $search) {
                $query->where('id', 'LIKE', "%{$search}%") // buscar por ID de adopción
                    ->orWhereHas('pet', function ($q) use ($search) { // buscar por nombre de mascota
                        $q->where('name', 'LIKE', "%{$search}%");
                    })
                    ->orWhereHas('user', function ($q) use ($search) { // buscar por nombre de usuario
                        $q->where('fullname', 'LIKE', "%{$search}%");
                    });
            })
            ->orderBy('id', 'DESC')
            ->paginate(20)
            ->withQueryString(); // mantiene la query en la paginación

        return view('adoptions.index', compact('adoptions', 'search'));
    }

    /**
     * Mostrar detalle de una adopción.
     */
    public function show($id)
    {
        $adoption = Adoption::with(['user', 'pet'])->findOrFail($id);
        return view('adoptions.show', compact('adoption'));
    }

    /**
     * Búsqueda AJAX para la vista index.
     */
    public function search(Request $request)
    {
        $query = $request->q;

        $adoptions = Adoption::with(['user', 'pet'])
            ->when($query, function ($q) use ($query) {
                $q->where('id', 'LIKE', "%{$query}%") // Buscar por ID
                    ->orWhereHas('pet', function ($q2) use ($query) {
                        $q2->where('name', 'LIKE', "%{$query}%"); // Buscar por nombre de mascota
                    })
                    ->orWhereHas('user', function ($q3) use ($query) {
                        $q3->where('fullname', 'LIKE', "%{$query}%"); // Buscar por nombre de usuario
                    });
            })
            ->orderBy('id', 'DESC')
            ->get();

        return response()->json($adoptions);
    }

    /**
     * Exportar adopciones a Excel.
     */
    public function exportExcel()
    {
        return Excel::download(new AdoptionsExport, 'adoptions.xlsx');
    }

    /**
     * Exportar adopciones a PDF.
     */
    public function exportPdf()
    {
        $adoptions = Adoption::with(['user', 'pet'])->get();
        $pdf = PDF::loadView('adoptions.pdf', compact('adoptions'));
        return $pdf->download('adoptions.pdf');
    }
}
