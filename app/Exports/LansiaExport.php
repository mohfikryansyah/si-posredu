<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Lansia;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class LansiaExport implements FromQuery, WithHeadings, WithMapping
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
        $query = Lansia::query();

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
        return ['Nama', 'NIK', 'Tempat, Tanggal Lahir', 'Golongan Darah', 'Alamat', 'No. Tlp', 'Pekerjaan', 'Tanggal Pendaftaran'];
    }

    public function map($row): array
    {
        return [
            $row->nama,
            $row->nik,
            $row->tempat_tanggal_lahir,
            $row->golongan_darah,
            $row->alamat,
            $row->no_tlp,
            $row->pekerjaan,
            Carbon::parse($row->tanggal_pendaftaran)->translatedFormat('d F, Y'),
        ];
    }
}
