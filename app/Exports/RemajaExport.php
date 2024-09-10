<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Remaja;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class RemajaExport implements FromQuery, WithHeadings, WithMapping
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
}
