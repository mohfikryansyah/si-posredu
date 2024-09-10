<?php

namespace App\Exports;

use App\Models\PemeriksaanRemaja;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PemeriksaanRemajaExport implements FromQuery, WithHeadings, WithMapping
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
        $query = PemeriksaanRemaja::query();
        // dd($query->where('remaja_id', $this->id));

        if ($this->id) {
            $query->with(['remaja', 'employee'])->where('remaja_id', $this->id);
        }

        if ($this->startDate && $this->endDate) {
            $query->with(['remaja', 'employee'])->whereBetween('tanggal_pemeriksaan', [$this->startDate, $this->endDate]);
        } elseif ($this->startDate) {
            $query->with(['remaja', 'employee'])->whereDate('tanggal_pemeriksaan', '>=', $this->startDate);
        } elseif ($this->endDate) {
            $query->with(['remaja', 'employee'])->whereDate('tanggal_pemeriksaan', '<=', $this->endDate);
        }

        $query->orderBy('tanggal_pemeriksaan', 'desc');

        return $query;
    }

    public function headings(): array
    {
        return ['Nama', 'Tanggal Pemeriksaan', 'Berat Badan (kg)', 'Tinggi Badan (cm)', 'Tekanan Darah (mmHg)', 'Konseling Kesehatan', 'Pemberian Vitamin', 'Catatan', 'Petugas Pemeriksa'];
    }

    public function map($row): array
    {   
        return [
            $row->remaja->nama,
            Carbon::parse($row->tanggal_pemeriksaan)->translatedFormat('d F, Y'),
            $row->berat_badan,
            $row->tinggi_badan,
            $row->tekanan_darah,
            $row->konseling_kesehatan,
            $row->pemberian_vitamin,
            $row->catatan,
            $row->employee->nama,
        ];
    }
}
