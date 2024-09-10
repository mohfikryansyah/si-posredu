<?php

namespace App\Exports;

use App\Models\PemeriksaanIbu;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PemeriksaanIbuExport implements FromQuery, WithHeadings, WithMapping
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
}
