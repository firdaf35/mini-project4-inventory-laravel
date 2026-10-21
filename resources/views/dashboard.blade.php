@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<h1>Dashboard</h1>
<p class="muted">Ringkasan persediaan bunga Bloom & Co.</p>

<div class="stats">
    <div class="stat">Total Produk<strong>{{ $productCount }}</strong></div>
    <div class="stat">Kategori<strong>{{ $categoryCount }}</strong></div>
    <div class="stat">Total Stok<strong>{{ $totalStock }}</strong></div>
    <div class="stat">Stok Menipis<strong>{{ $lowStock->count() }}</strong></div>
</div>

<div class="card">
    <h2>Perhatian: Stok Menipis</h2>
    @if($lowStock->isEmpty())
        <p>Semua produk memiliki stok yang cukup.</p>
    @else
        <table>
            <thead><tr><th>Produk</th><th>SKU</th><th>Stok</th></tr></thead>
            <tbody>
            @foreach($lowStock as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->sku ?? '-' }}</td>
                    <td>{{ $product->stock }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</div>

<div class="card">
    <h2>Transaksi Terbaru</h2>
    <table>
        <thead><tr><th>Tanggal</th><th>Produk</th><th>Jenis</th><th>Jumlah</th><th>Pengguna</th></tr></thead>
        <tbody>
        @forelse($latestTransactions as $transaction)
            <tr>
                <td>{{ $transaction->created_at->format('d-m-Y H:i') }}</td>
                <td>{{ $transaction->product->name }}</td>
                <td>{{ $transaction->type === 'IN' ? 'Barang Masuk' : 'Barang Keluar' }}</td>
                <td>{{ $transaction->quantity }}</td>
                <td>{{ $transaction->user->name ?? '-' }}</td>
            </tr>
        @empty
            <tr><td colspan="5">Belum ada transaksi.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection