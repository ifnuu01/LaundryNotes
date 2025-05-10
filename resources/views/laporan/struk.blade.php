<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Struk Laundry</title>
    <style>
        body { font-family: monospace; font-size: 14px; }
    </style>
</head>
<body>
    <h2>LAUNDRY NOTES</h2>
    <p>Jl. Kuatro, Gn. Kelua</p>
    <p>0812 3456 7890</p>
    <hr>
    <p>Customer: {{ $pesanan->nama_pelanggan }}</p>
    <p>ID: {{ $pesanan->id }}</p>
    <p>Tgl: {{ $pesanan->tanggal->format('d/m/Y') }}</p>
    <p>Kasir: {{ $pesanan->kasir->name }}</p>
    <hr>
    @foreach($pesanan->detail_pesanan as $item)
        <p>{{ $item->paket->nama_paket }} - {{ $item->qty }} x {{ number_format($item->harga, 0, ',', '.') }}</p>
    @endforeach
    <hr>
    <p>Total: Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</p>
    <p>Cash: Rp {{ number_format($pesanan->bayar, 0, ',', '.') }}</p>
    <p>Kembali: Rp {{ number_format($pesanan->kembali, 0, ',', '.') }}</p>
    <hr>
    <p>** Terima kasih **</p>
</body>
</html>
