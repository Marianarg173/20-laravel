<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use Illuminate\Support\Facades\File; // Para borrar archivos directamente
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PetsExport;
use App\Imports\PetsImport;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pets = Pet::with('owner')
            ->orderBy('id', 'DESC') // Más recientes primero
            ->paginate(20);         // Paginación correcta

        return view('pets.index', compact('pets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'kind' => 'required|string|max:50',
            'weight' => 'required|numeric|min:0.1',
            'age' => 'required|integer|min:0',
            'breed' => 'required|string|max:100',
            'location' => 'required|string|max:100',
            'description' => 'required|string', // obligatorio
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // obligatorio
        ], [
            'description.required' => '¡La descripción es obligatoria!',
            'image.required' => '¡La imagen es obligatoria!',
        ]);

        // Guardar imagen
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('photos'), $imageName);

        Pet::create([
            'name' => $validatedData['name'],
            'kind' => $validatedData['kind'],
            'weight' => $validatedData['weight'],
            'age' => $validatedData['age'],
            'breed' => $validatedData['breed'],
            'location' => $validatedData['location'],
            'description' => $validatedData['description'],
            'image' => $imageName,
        ]);

        return redirect('pets')->with('message', '¡Mascota agregada correctamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pet $pet)
    {
        return view('pets.show', compact('pet'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pet $pet)
    {
        return view('pets.edit', compact('pet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pet $pet)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'kind' => 'required|string|max:50',
            'weight' => 'required|numeric|min:0.1',
            'age' => 'required|integer|min:0',
            'breed' => 'required|string|max:100',
            'location' => 'required|string|max:100',
            'description' => 'required|string', // obligatorio
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'active' => 'required|boolean',
            'status' => 'required|boolean',
        ], [
            'description.required' => '¡La descripción es obligatoria!',
        ]);

        $imageName = $pet->image;

        if ($request->hasFile('image')) {
            // Borrar imagen antigua si existe y no es default
            if ($pet->image && $pet->image !== 'default_pet.png') {
                $oldImagePath = public_path('photos/' . $pet->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('photos'), $imageName);
        }

        $pet->update([
            'name' => $validatedData['name'],
            'kind' => $validatedData['kind'],
            'weight' => $validatedData['weight'],
            'age' => $validatedData['age'],
            'breed' => $validatedData['breed'],
            'location' => $validatedData['location'],
            'description' => $validatedData['description'],
            'image' => $imageName,
            'active' => $validatedData['active'],
            'status' => $validatedData['status'],
        ]);

        return redirect('pets')->with('message', '¡Mascota actualizada correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pet $pet)
    {
        if ($pet->image && $pet->image != 'default_pet.png') {
            $imagePath = public_path('photos/' . $pet->image);
            if (file_exists($imagePath)) unlink($imagePath);
        }

        $pet->delete();

        return redirect('pets')->with('message', '¡Mascota eliminada correctamente!');
    }

    /**
     * Search pets by name or kind.
     */
    public function search(Request $request)
    {
        $query = $request->q;

        $pets = Pet::where('name', 'like', "%$query%")
            ->orWhere('kind', 'like', "%$query%")
            ->orderBy('id', 'desc')
            ->get();

        return view('pets.search', compact('pets'));
    }

    /**
     * Export PDF
     */
    public function pdf()
    {
        $pets = Pet::all();
        $pdf = Pdf::loadView('pets.pdf', compact('pets'));
        return $pdf->download('allpets.pdf');
    }

    /**
     * Export Excel
     */
    public function excel()
    {
        return Excel::download(new PetsExport, 'allpets.xlsx');
    }

    /**
     * Import Excel
     */
    public function import(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new PetsImport, $file);
        return redirect()->back()->with('message', '¡Mascotas importadas correctamente!');
    }
}
