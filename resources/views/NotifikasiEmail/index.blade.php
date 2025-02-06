<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelayanan Terlewat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 30px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #187f80;
            text-align: center;
        }
        p {
            font-size: 16px;
            color: #555;
            line-height: 1.6;
        }
        .button {
            display: block;
            width: 200px;
            margin: 20px auto;
            padding: 12px;
            background-color: #187f80;
            color: #ffffff;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            border-radius: 6px;
            font-weight: bold;
        }

        .text-white {
            color: white;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Pelayanan Terlewat</h2>
        <p>Halo <strong>{{ $informasiEmail['nama'] }}</strong>,</p>
        <p>Kami mendeteksi bahwa Anda belum melakukan pemeriksaan setelah pelayanan <strong>{{ $informasiEmail['judul_pelayanan'] }}</strong> pada tanggal <strong>{{ $informasiEmail['tanggal_pelayanan'] }}</strong>.</p>
        <p>Silakan segera menghubungi petugas untuk melakukan pemeriksaan.</p>
        {{-- <p href="#" class="button text-white">Hubungi Petugas</p> --}}
        <p class="footer">Terima kasih atas perhatian Anda. (Jangan balas pesan ini. Ini adalah pesan otomatis.)</p>
    </div>
</body>
</html>
