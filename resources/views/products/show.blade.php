@extends('layouts.app')
@section('title', 'Detail Bunga')
@section('content')
<div class="card">
<h1>{{ $product->name }}</h1>
<p><strong>SKU:</strong> {{ $product->sku ?? '-' }}</p>
<p><strong>Kategori:</strong> {{ $product->category->name ?? '-' }}</p>
<p><strong>Harga:</strong> Rp {{ number_format((float) $product->price, 0, ',', '.') }}</p>
<p><strong>Stok sekarang:</strong> {{ $product->stock }}</p>
<a class="btn" href="{{ route('products.edit', $product) }}">Edit</a>
<a class="btn" href="{{ route('products.index') }}">Kembali</a>
</div>

<div class="card">
<h2>Histori Transaksi Produk</h2>
<table>
<thead><tr><th>Tanggal</th><th>Jenis</th><th>Jumlah</th><th>Pengguna</th></tr></thead>
<tbody>
@forelse($product->stockTransactions->sortByDesc('created_at') as $transaction)
<tr>
    <td>{{ $transaction->created_at->format('d-m-Y H:i') }}</td>
    <td>{{ $transaction->type === 'IN' ? 'Masuk' : 'Keluar' }}</td>
    <td>{{ $transaction->quantity }}</td>
    <td>{{ $transaction->user->name ?? '-' }}</td>
</tr>
@empty
<tr><td colspan="4">Belum ada transaksi.</td></tr>
@endforelse
</tbody>
</table>
</div>
@endsection