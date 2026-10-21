@extends('layouts.app')
@section('title', 'Edit Kategori')
@section('content')
<div class="card">
<h1>Edit Kategori</h1>
<form method="POST" action="{{ route('categories.update', $category) }}">
    @csrf @method('PUT')
    <label>Nama kategori</label>
    <input type="text" name="name" value="{{ old('name', $category->name) }}" maxlength="100" required>
    <p class="actions">
        <button type="submit">Simpan Perubahan</button>
        <a href="{{ route('categories.index') }}">Batal</a>
    </p>
</form>
</div>
@endsection