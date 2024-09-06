function updateClock() {
    // Dapatkan objek Date untuk waktu saat ini
    var now = new Date();

    // Ekstrak jam, menit, dan detik dari objek Date
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();

    // Format waktu dalam format 12 jam
    var ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12;
    hours = hours ? hours : 12; // Jam 0 akan dianggap sebagai 12

    // Buat string waktu dalam format HH:mm:ss AM/PM
    var timeString = hours + ':' + addLeadingZero(minutes) + ':' + addLeadingZero(seconds) + ' ' + ampm;

    // Tampilkan waktu di dalam elemen dengan id "digitalClock"
    document.getElementById('tanggalwaktu').innerText = timeString;
}

function addLeadingZero(number) {
    // Tambahkan nol di depan angka jika angka < 10
    return number < 10 ? '0' + number : number;
}

// Panggil fungsi updateClock setiap detik
setInterval(updateClock, 1000);

// Inisialisasi jam pada saat halaman dimuat
updateClock();