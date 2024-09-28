<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\MissedPelayanans;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class TanpaPemeriksaanExport implements FromQuery, WithHeadings, WithMapping
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
}
