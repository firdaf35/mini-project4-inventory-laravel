@extends('layouts.app')
@section('title', 'Tambah Kategori')
@section('content')
<div class="card">
<h1>Tambah Kategori</h1>
<form method="POST" action="{{ route('categories.store') }}">
    @csrf
    <label>Nama kategori</label>
    <input type="text" name="name" value="{{ old('name') }}" maxlength="100" required>
    <p class="actions">
        <button type="submit">Simpan</button>
        <a href="{{ route('categories.index') }}">Batal</a>
    </p>
</form>
</div>
@endsection