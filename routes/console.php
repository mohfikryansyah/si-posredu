<?php

use Carbon\Carbon;
use App\Models\Pelayanan;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Console\Scheduling\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('schedule:run', function (Schedule $schedule) {
    // Ambil tanggal pelayanan bulan ini
    $tanggalPelayanan = Pelayanan::whereMonth('tanggal_pelayanan', Carbon::now()->month)
                                ->whereYear('tanggal_pelayanan', Carbon::now()->year)
                                ->value('tanggal_pelayanan');

    // Jika ada jadwal pelayanan untuk bulan ini
    if ($tanggalPelayanan) {
        // Parse tanggal pelayanan untuk mendapatkan hari dan waktu yang dibutuhkan
        $tanggalPelayanan = Carbon::parse($tanggalPelayanan);

        // Jika hari ini adalah tanggal pelayanan, jadwalkan command
        if (Carbon::now()->isSameDay($tanggalPelayanan)) {
            $schedule->command('pelayanan:check-missed')->dailyAt('18:00'); // atau waktu yang kamu inginkan
        }
    }
});
