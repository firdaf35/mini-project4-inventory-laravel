@extends('layouts.app')
@section('title', 'Tambah Produk')
@section('content')
<div class="card">
<h1>Tambah Bunga</h1>
<form method="POST" action="{{ route('products.store') }}">
    @csrf
    @include('products._form')
    <p class="actions">
        <button type="submit">Simpan Produk</button>
        <a href="{{ route('products.index') }}">Batal</a>
    </p>
</form>
</div>
@endsection