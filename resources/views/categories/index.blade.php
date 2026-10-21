@extends('layouts.app')
@section('title', 'Kategori')
@section('content')
<div class="actions">
    <h1>Kategori Bunga</h1>
    <a class="btn" href="{{ route('categories.create') }}">+ Tambah Kategori</a>
</div>
<div class="card">
<table>
    <thead><tr><th>No.</th><th>Nama Kategori</th><th>Jumlah Produk</th><th>Aksi</th></tr></thead>
    <tbody>
    @forelse($categories as $category)
        <tr>
            <td>{{ $categories->firstItem() + $loop->index }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->products_count }}</td>
            <td class="actions">
                <a class="btn" href="{{ route('categories.edit', $category) }}">Edit</a>
                <form method="POST" action="{{ route('categories.destroy', $category) }}" onsubmit="return confirm('Hapus kategori ini?')">
                    @csrf @method('DELETE')
                    <button class="danger" type="submit">Hapus</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="4">Belum ada kategori.</td></tr>
    @endforelse
    </tbody>
</table>
{{ $categories->links() }}
</div>
@endsection