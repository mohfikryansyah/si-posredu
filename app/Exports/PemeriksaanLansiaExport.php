<?php

namespace App\Exports;

// use Carbon\Carbon;
use App\Models\PemeriksaanLansia;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PemeriksaanLansiaExport implements FromQuery, WithHeadings, WithMapping
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
        $query = PemeriksaanLansia::query();
        // dd($query->where('lansia_id', $this->id));

        if ($this->id) {
            $query->with(['lansia', 'employee'])->where('lansia_id', $this->id);
        }

        if ($this->startDate && $this->endDate) {
            $query->with(['lansia', 'employee'])->whereBetween('tanggal_pemeriksaan', [$this->startDate, $this->endDate]);
        } elseif ($this->startDate) {
            $query->with(['lansia', 'employee'])->whereDate('tanggal_pemeriksaan', '>=', $this->startDate);
        } elseif ($this->endDate) {
            $query->with(['lansia', 'employee'])->whereDate('tanggal_pemeriksaan', '<=', $this->endDate);
        }

        $query->orderBy('tanggal_pemeriksaan', 'desc');

        return $query;
    }

    public function headings(): array
    {
        return ['Nama', 'Tanggal Pemeriksaan', 'Tekanan Darah (mmHg)', 'Kolestrol (mg/dL)', 'Asam Urat (mg/dL)', 'Gula Darah (mg/dL)', 'Catatan', 'Petugas Pemeriksa'];
    }

    public function map($row): array
    {   
        return [
            $row->lansia->nama,
            Carbon::parse($row->tanggal_pemeriksaan)->translatedFormat('d F, Y'),
            $row->tekanan_darah,
            $row->kolestrol,
            $row->asam_urat,
            $row->gula_darah,
            // $row->suhu_tubuh,
            $row->catatan,
            $row->employee->nama,
        ];
    }
}
