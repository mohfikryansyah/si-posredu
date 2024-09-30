<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Remaja;
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

class RemajaExport implements FromQuery, WithHeadings, WithMapping, WithCustomStartCell, WithDrawings, WithEvents
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
        $query = Remaja::query();

        if ($this->id) {
            $query->where('id', $this->id);
        }

        if ($this->startDate && $this->endDate) {
            $query->whereBetween('tanggal_pendaftaran', [$this->startDate, $this->endDate]);
        } elseif ($this->startDate) {
            $query->whereDate('tanggal_pendaftaran', '>=', $this->startDate);
        } elseif ($this->endDate) {
            $query->whereDate('tanggal_pendaftaran', '<=', $this->endDate);
        }

        $query->orderBy('tanggal_pendaftaran', 'desc');

        return $query;
    }

    public function headings(): array
    {
        return ['Nama', 'NIK', 'Tempat, Tanggal Lahir', 'Jenis Kelamin', 'Usia', 'Alamat', 'No. Tlp', 'Nama Orang Tua', 'Pekerjaan Orang Tua', 'Golongan Darah', 'Tanggal Pendaftaran'];
    }

    public function map($row): array
    {
        $row->usia = $row->usia . ' tahun';
        
        return [
            $row->nama,
            $row->nik,
            $row->tempat_tanggal_lahir,
            $row->jenis_kelamin,
            $row->usia,
            $row->alamat,
            $row->no_tlp,
            $row->nama_orang_tua,
            $row->pekerjaan_orang_tua,
            $row->golongan_darah,
            Carbon::parse($row->tanggal_pendaftaran)->translatedFormat('d F, Y'),
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

                $event->sheet->getStyle('A5:L5')->applyFromArray([
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
