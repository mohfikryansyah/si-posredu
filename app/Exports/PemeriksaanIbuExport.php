<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\PemeriksaanIbu;
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

class PemeriksaanIbuExport implements FromQuery, WithHeadings, WithMapping, WithCustomStartCell, WithDrawings, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */

    Use Exportable;

    protected $id;
    protected $startDate;
    protected $endDate;

    public function __construct($id = null, $startDate = null, $endDate = null)
    {
        $this->id = $id;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function query()
    {
        $query = PemeriksaanIbu::query();
        // dd($query->where('ibu_id', $this->id));

        if ($this->id) {
            $query->with(['ibu', 'employee'])->where('ibu_id', $this->id);
        }

        if ($this->startDate && $this->endDate) {
            $query->with(['ibu', 'employee'])->whereBetween('tanggal_pemeriksaan', [$this->startDate, $this->endDate]);
        } elseif ($this->startDate) {
            $query->with(['ibu', 'employee'])->whereDate('tanggal_pemeriksaan', '>=', $this->startDate);
        } elseif ($this->endDate) {
            $query->with(['ibu', 'employee'])->whereDate('tanggal_pemeriksaan', '<=', $this->endDate);
        }

        $query->orderBy('tanggal_pemeriksaan', 'desc');

        return $query;
    }

    public function headings(): array
    {
        return ['Nama', 'Tanggal Pemeriksaan', 'Usia Kehamilan (minggu)', 'Tekanan Darah (mmHg)', 'Berat Badan (kg)', 'Tinggi Badan (cm)', 'Tinggi Fundus (cm)', 'Denyut Jantung Janin (bpm)', 'Lingkar Lengan Atas (cm)', 'Pemeriksaan Lab', 'Suntik Tetanus Toksoid', 'Keluhan', 'Pemberian Vitamin', 'Catatan', 'Petugas Pemeriksa'];
    }

    public function map($row): array
    {   
        return [
            $row->ibu->nama,
            Carbon::parse($row->tanggal_pemeriksaan)->translatedFormat('d F, Y'),
            $row->usia_kehamilan,
            $row->tekanan_darah,
            $row->tinggi_badan,
            $row->berat_badan,
            $row->tinggi_fundus,
            $row->denyut_jantung_janin,
            $row->lingkar_lengan_atas,
            $row->pemeriksaan_lab,
            $row->suntik_tetanus_toksoid,
            $row->keluhan,
            $row->pemberian_vitamin,
            $row->catatan,
            $row->employee->nama,
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

                $event->sheet->setCellValue('F2', 'PEMERINTAH KABUPATEN POHUWATO');
                $event->sheet->setCellValue('F3', 'KECAMATAN POPAYATO TIMUR');
                $event->sheet->setCellValue('F4', 'DESA BUNTO');
                $event->sheet->setCellValue('F5', 'Jln. Hi. DR Djibu Ishak');

                $event->sheet->getStyle('A7:K7')->applyFromArray([
                   'font' => [
                        'bold' => true
                   ], 
                ]);

                $event->sheet->getStyle('F2:F4')->applyFromArray([
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

                $event->sheet->getStyle('F5')->applyFromArray([
                    'font' => [
                        'name' => 'Blackadder ITC',
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ]
                ]);

                $event->sheet->getStyle('A5:P5')->applyFromArray([
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
