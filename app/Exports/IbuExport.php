<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Ibu;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;

class IbuExport implements FromQuery, WithHeadings, WithMapping, WithCustomStartCell, WithDrawings, WithEvents
{
    use Exportable;

    protected $id;
    protected $startDate;
    protected $endDate;

    public function __construct($id = null, $startDate = null, $endDate = null)
    {
        $this->id = $id;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    // Query data
    public function query()
    {
        $query = Ibu::query();

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

    // Headings
    public function headings(): array
    {
        return ['Nama', 'NIK', 'Nama Suami', 'Tempat, Tanggal Lahir', 'Golongan Darah', 'Nomor Kehamilan', 'Alamat', 'No. Tlp', 'Pekerjaan', 'Tanggal Pendaftaran'];
    }

    // Map data for each row
    public function map($row): array
    {
        return [$row->nama, $row->nik, $row->nama_suami, $row->tempat_tanggal_lahir, $row->golongan_darah, $row->nomor_kehamilan, $row->alamat, $row->no_tlp, $row->pekerjaan, Carbon::parse($row->tanggal_pendaftaran)->translatedFormat('d F, Y')];
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
        $drawing->setPath(public_path('images/logo.png'));
        $drawing->setHeight(90);
        $drawing->setCoordinates('A1');

        return $drawing;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {

                $event->sheet->setCellValue('F2', 'Pustu Desa Bunto');
                $event->sheet->setCellValue('F3', 'Bunto, Kec. Popayato Timur, Kab. Pohuwato');
                $event->sheet->setCellValue('F4', 'Telp: (+62) 0822 1166 3322, Email: pustubunto@gmail.com');

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
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],
                ]);

                $event->sheet->getStyle('A5:K5')->applyFromArray([
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
