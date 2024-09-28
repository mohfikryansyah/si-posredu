<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Ibu;
use App\Models\Anak;
use App\Models\Lansia;
use App\Models\Remaja;
use App\Models\Pelayanan;
use Illuminate\Console\Command;
use App\Models\MissedPelayanans;

class CheckMissedPelayanans extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pelayanan:check-missed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check and record entities that missed pelayanan';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $currentDate = Carbon::now();

        $pelayanans = Pelayanan::where('tanggal_pelayanan', '<', $currentDate)->get();

        if ($pelayanans->isEmpty()) {
            $this->info('Tidak ada jadwal pelayanan yang telah berlalu.');
            return;
        }

        foreach ($pelayanans as $pelayanan) {
            MissedPelayanans::where('tanggal_pelayanan', $pelayanan->tanggal_pelayanan)->delete();

            $this->checkMissedForModel(Ibu::class, 'pemeriksaanIbu', $pelayanan, 'Ibu');
            $this->checkMissedForModel(Anak::class, 'pemeriksaanAnak', $pelayanan, 'Anak');
            $this->checkMissedForModel(Lansia::class, 'pemeriksaanLansia', $pelayanan, 'Lansia');
            $this->checkMissedForModel(Remaja::class, 'pemeriksaanRemaja', $pelayanan, 'Remaja');
        }

        $this->info('Missed pelayanans check completed.');
    }

    private function checkMissedForModel($model, $relation, $pelayanan, $entityType)
    {
        $entitiesWithoutPemeriksaan = $model::whereDoesntHave($relation, function ($query) use ($pelayanan) {
            $query->where('tanggal_pemeriksaan', '>', $pelayanan->tanggal_pelayanan);
        })->get();

        foreach ($entitiesWithoutPemeriksaan as $entity) {
            MissedPelayanans::create([
                'nama' => $entity->nama,
                'entitas_type' => $entityType,
                'tanggal_pelayanan' => $pelayanan->tanggal_pelayanan,
                'judul_pelayanan' => $pelayanan->nama,
            ]);
        }

        $this->info(count($entitiesWithoutPemeriksaan) . " $entityType ditemukan tanpa pemeriksaan setelah pelayanan pada tanggal " . $pelayanan->tanggal_pelayanan);
    }
}
