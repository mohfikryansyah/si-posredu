<?php

namespace App\Exports;

use App\Models\PemeriksaanAnak;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PemeriksaanAnakExport implements FromQuery, WithHeadings, WithMapping
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
        $query = PemeriksaanAnak::query();

        if ($this->id) {
            $query->with(['anak', 'employee'])->where('anak_id', $this->id);
        }

        if ($this->startDate && $this->endDate) {
            $query->with(['anak', 'employee'])->whereBetween('tanggal_pemeriksaan', [$this->startDate, $this->endDate]);
        } elseif ($this->startDate) {
            $query->with(['anak', 'employee'])->whereDate('tanggal_pemeriksaan', '>=', $this->startDate);
        } elseif ($this->endDate) {
            $query->with(['anak', 'employee'])->whereDate('tanggal_pemeriksaan', '<=', $this->endDate);
        }

        $query->orderBy('tanggal_pemeriksaan', 'desc');

        return $query;
    }

    public function headings(): array
    {
        return ['Nama', 'Tanggal Pemeriksaan', 'Berat Badan (kg)', 'Tinggi Badan (cm)', 'Tekanan Darah (mmHg)', 'Suhu Tubuh', 'Status Imunisasi', 'Riwayat Penyakit', 'Catatan', 'Petugas Pemeriksa'];
    }

    public function map($row): array
    {   
        return [
            $row->anak->nama,
            Carbon::parse($row->tanggal_pemeriksaan)->translatedFormat('d F, Y'),
            $row->berat_badan,
            $row->tinggi_badan,
            $row->tekanan_darah,
            $row->suhu_tubuh,
            $row->status_imunisasi,
            $row->riwayat_penyakit,
            $row->catatan,
            $row->employee->nama,
        ];
    }
}
