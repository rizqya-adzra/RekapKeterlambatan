<?php

namespace App\Exports;

use App\Models\Late;
use App\Models\Student;
use App\Models\Rayon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Support\Facades\Auth;

class LateExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $user = Auth::user();
        
        if ($user->role === 'ps') {
            $rayon = Rayon::where('user_id', $user->id)->first();
            
            $studentsInRayon = Student::where('rayon_id', $rayon->id)->pluck('id')->toArray();
            
            return Late::whereIn('student_id', $studentsInRayon)->select('student_id')->distinct()->get();
        }

        return Late::select('student_id')->distinct()->get();
    }

    public function headings(): array
    {
        return [
            "NIS", "Nama", "Rombel", "Rayon", "Total Keterlambatan"
        ];
    }

    public function map($late): array
    {
        $lateStudent = $late->student;
        $totalLate = Late::where('student_id', $lateStudent->id)->count();

        return [
            $lateStudent->nis,
            $lateStudent->name,
            $lateStudent->rombel->rombel,
            $lateStudent->rayon->rayon,
            $totalLate,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:E1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['argb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['argb' => 'ADD8E6'], 
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ]);

        $sheet->getStyle('A2:E' . ($sheet->getHighestRow()))->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ]);

        return [
            'A1:E1' => [
                'font' => ['size' => 14, 'bold' => true],
                'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
            ],
        ];
    }

    public function title(): string
    {
        return "Keterlambatan Siswa";
    }
}
