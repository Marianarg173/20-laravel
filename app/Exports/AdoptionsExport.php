<?php

namespace App\Exports;

use App\Models\Adoption;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AdoptionsExport implements FromView, WithColumnWidths, WithStyles
{
    /**
     * Retorna la vista para exportar las adopciones.
     */
    public function view(): View
    {
        return view('adoptions.excel', [
            'adoptions' => Adoption::with(['user', 'pet'])->get()
        ]);
    }

    /**
     * Define el ancho de las columnas.
     */
    public function columnWidths(): array
    {
        return [
            'A' => 5,   // ID
            'B' => 25,  // Nombre del usuario
            'C' => 25,  // Nombre de la mascota
            'D' => 20,  // Fecha de adopción
            'E' => 30,  // Estado o detalles
        ];
    }

    /**
     * Aplica estilos al Excel.
     */
    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true, 'size' => 16]], // Encabezado en negrita y tamaño 16
        ];
    }
}
