<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\MissedPelayanans;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;

class TanpaPemeriksaanExport implements FromQuery, WithHeadings, WithMapping, WithCustomStartCell, WithDrawings, WithEvents
{
    Use Exportable;

    protected $id;
    protected $entitas;
    protected $startDate;
    protected $endDate;

    public function __construct($id = null, $entitas = null, $startDate = null, $endDate = null)
    {
        $this->id = $id;
        // dd($this->id);
        $this->entitas = $entitas;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function query()
    {
        $query = MissedPelayanans::query();

        if($this->entitas) {
            $query->where('entitas_type', $this->entitas);
        }

        if ($this->id) {
            $query->where('id', $this->id);
        }

        // dd($query);
        

        if ($this->startDate && $this->endDate) {
            $query->whereBetween('tanggal_pelayanan', [$this->startDate, $this->endDate]);
        } elseif ($this->startDate) {
            $query->whereDate('tanggal_pelayanan', '>=', $this->startDate);
        } elseif ($this->endDate) {
            $query->whereDate('tanggal_pelayanan', '<=', $this->endDate);
        }

        $query->orderBy('tanggal_pelayanan', 'desc');

        return $query;
    }

    public function headings(): array
    {
        return ['Nama', 'Tanggal Pelayanan', 'Nama Pelayanan', 'Tipe Entitas'];
    }

    public function map($row): array
    {   
        return [
            $row->nama,
            Carbon::parse($row->tanggal_pelayanan)->translatedFormat('d F, Y'),
            $row->judul_pelayanan,
            $row->entitas_type,
        ];
    }

    public function startCell(): string
    {
        return 'A7';
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('images/logo-pohuwato.png'));
        $drawing->setHeight(100);
        $drawing->setCoordinates('A1');

        return $drawing;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {

                $event->sheet->setCellValue('E2', 'PEMERINTAH KABUPATEN POHUWATO');
                $event->sheet->setCellValue('E3', 'KECAMATAN POPAYATO TIMUR');
                $event->sheet->setCellValue('E4', 'DESA BUNTO');
                $event->sheet->setCellValue('E5', 'Jln. Hi. DR Djibu Ishak');

                $event->sheet->getStyle('A7:K7')->applyFromArray([
                   'font' => [
                        'bold' => true
                   ], 
                ]);

                $event->sheet->getStyle('E2:E4')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 12,
                        'center' => true,
                        'name' => 'Times New Roman',
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],
                ]);

                $event->sheet->getStyle('E5')->applyFromArray([
                    'font' => [
                        'name' => 'Blackadder ITC',
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ]
                ]);

                $event->sheet->getStyle('A5:G5')->applyFromArray([
                    'borders' => [
                        'bottom' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);
            },
        ];
    }
}
