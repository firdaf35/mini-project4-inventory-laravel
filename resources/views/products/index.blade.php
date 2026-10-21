@extends('layouts.app')
@section('title', 'Data Bunga')
@section('content')
<div class="actions">
    <h1>Data Bunga</h1>
    <a class="btn" href="{{ route('products.create') }}">+ Tambah Bunga</a>
</div>

<div class="card">
<form class="inline-form" method="GET" action="{{ route('products.index') }}">
    <input type="text" name="search" placeholder="Cari nama atau SKU..." value="{{ request('search') }}">
    <select name="category_id">
        <option value="">Semua kategori</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" @selected((string) request('category_id') === (string) $category->id)>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    <select name="sort">
        <option value="name" @selected(request('sort', 'name') === 'name')>Nama</option>
        <option value="price" @selected(request('sort') === 'price')>Harga</option>
        <option value="stock" @selected(request('sort') === 'stock')>Stok</option>
    </select>
    <select name="direction">
        <option value="asc" @selected(request('direction', 'asc') === 'asc')>Naik</option>
        <option value="desc" @selected(request('direction') === 'desc')>Turun</option>
    </select>
    <button type="submit">Cari / Filter</button>
    <a href="{{ route('products.index') }}">Reset</a>
</form>
</div>

<div class="card">
<table>
    <thead><tr><th>No.</th><th>SKU</th><th>Nama Bunga</th><th>Kategori</th><th>Harga</th><th>Stok</th><th>Aksi</th></tr></thead>
    <tbody>
    @forelse($products as $product)
        <tr>
            <td>{{ $products->firstItem() + $loop->index }}</td>
            <td>{{ $product->sku ?? '-' }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->category->name ?? '-' }}</td>
            <td>Rp {{ number_format((float) $product->price, 0, ',', '.') }}</td>
            <td>{{ $product->stock }}</td>
            <td class="actions">
                <a class="btn" href="{{ route('products.show', $product) }}">Detail</a>
                <a class="btn" href="{{ route('products.edit', $product) }}">Edit</a>
                <form method="POST" action="{{ route('products.destroy', $product) }}" onsubmit="return confirm('Hapus produk ini?')">
                    @csrf @method('DELETE')
                    <button class="danger" type="submit">Hapus</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="7">Data bunga belum tersedia.</td></tr>
    @endforelse
    </tbody>
</table>
{{ $products->links() }}
</div>
@endsection