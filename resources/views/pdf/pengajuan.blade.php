<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dokumen Pengajuan</title>
    <style>
        body { font-family: sans-serif; font-size: 14px; }
        h1 { text-align: center; }
        .section { margin-bottom: 20px; }
    </style>
</head>
<body>
    <h1>Dokumen Pengajuan Layanan</h1>

    <div class="section">
        <strong>Nama:</strong> {{ $pengajuan->nama }}<br>
        <strong>Email:</strong> {{ $pengajuan->email }}<br>
        <strong>Telepon:</strong> {{ $pengajuan->telepon }}
    </div>

    <div class="section">
        <strong>Layanan:</strong> {{ $pengajuan->layanan }}<br>
        <strong>Deskripsi:</strong><br>
        {{ $pengajuan->deskripsi }}
    </div>

    <div class="section">
        <strong>Catatan Tambahan:</strong><br>
        {{ $pengajuan->catatan }}
    </div>

    <div class="section">
        <strong>Tanggal Pengajuan:</strong> {{ $pengajuan->created_at->format('d M Y') }}
    </div>
</body>
</html>