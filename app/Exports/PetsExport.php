<?php

namespace App\Exports;

use App\Models\Pet;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PetsExport implements FromView, WithColumnWidths, WithStyles
{
    public function view(): View
    {
        return view('pets.excel', [
            'pets' => Pet::all()
        ]);
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5,    // ID
            'B' => 30,   // Name
            'C' => 20,   // Kind
            'D' => 10,   // Age
            'E' => 25,   // Breed
            'F' => 15,   // Active
            'G' => 18,   // Status
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true, 'size' => 16]], // Primera fila en negrita y tamaño 16
        ];
    }
}
