@extends('layouts.app')
@section('title', $type === 'IN' ? 'Barang Masuk' : 'Barang Keluar')
@section('content')
<div class="card">
<h1>{{ $type === 'IN' ? 'Catat Barang Masuk' : 'Catat Barang Keluar' }}</h1>

@if($products->isEmpty())
    <p>Belum ada produk. Tambahkan produk terlebih dahulu.</p>
    <a class="btn" href="{{ route('products.create') }}">Tambah Produk</a>
@else
<form method="POST" action="{{ route('stock.store') }}">
    @csrf
    <label>Jenis Transaksi</label>
    <select name="type" required>
        <option value="IN" @selected(old('type', $type) === 'IN')>Barang Masuk</option>
        <option value="OUT" @selected(old('type', $type) === 'OUT')>Barang Keluar</option>
    </select>

    <label>Produk</label>
    <select name="product_id" required>
        <option value="">-- Pilih produk --</option>
        @foreach($products as $product)
            <option value="{{ $product->id }}" @selected((string) old('product_id') === (string) $product->id)>
                {{ $product->name }} (stok: {{ $product->stock }})
            </option>
        @endforeach
    </select>

    <label>Jumlah</label>
    <input type="number" name="quantity" value="{{ old('quantity', 1) }}" min="1" required>

    <p class="actions">
        <button type="submit">Simpan Transaksi</button>
        <a href="{{ route('stock.index') }}">Batal</a>
    </p>
</form>
@endif
</div>
@endsection