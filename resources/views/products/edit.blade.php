@extends('layouts.app')
@section('title', 'Edit Produk')
@section('content')
<div class="card">
<h1>Edit Bunga</h1>
<form method="POST" action="{{ route('products.update', $product) }}">
    @csrf @method('PUT')
    @include('products._form')
    <p class="actions">
        <button type="submit">Simpan Perubahan</button>
        <a href="{{ route('products.index') }}">Batal</a>
    </p>
</form>
</div>
@endsection