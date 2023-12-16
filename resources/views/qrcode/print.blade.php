<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Mesin</title>
</head>

<body>
    <div class="container text-center mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h2>ID: {{ $mesin->kode_jenis }}</h2>
            </div>
            <div class="card-body">
                <div class="qr-code">
                    {!! $qrCode !!}
                </div>
                <h3 class="mt-4">Scan QR Code</h3>
                <p class="text-muted">{{ $mesin->nama_mesin }}</p>
            </div>
        </div>
    </div>
</body>

</html>