@extends('layouts.app')
@section('title', 'Histori Stok')
@section('content')
<div class="actions">
    <h1>Histori Stok</h1>
    <a class="btn" href="{{ route('stock.create', ['type' => 'IN']) }}">+ Barang Masuk</a>
    <a class="btn" href="{{ route('stock.create', ['type' => 'OUT']) }}">+ Barang Keluar</a>
</div>

<div class="card">
<form class="inline-form" method="GET" action="{{ route('stock.index') }}">
    <select name="type">
        <option value="">Semua transaksi</option>
        <option value="IN" @selected(request('type') === 'IN')>Barang Masuk</option>
        <option value="OUT" @selected(request('type') === 'OUT')>Barang Keluar</option>
    </select>
    <button type="submit">Filter</button>
    <a href="{{ route('stock.index') }}">Reset</a>
</form>
</div>

<div class="card">
<table>
<thead><tr><th>Tanggal</th><th>SKU</th><th>Produk</th><th>Jenis</th><th>Jumlah</th><th>Petugas</th></tr></thead>
<tbody>
@forelse($transactions as $transaction)
<tr>
    <td>{{ $transaction->created_at->format('d-m-Y H:i') }}</td>
    <td>{{ $transaction->product->sku ?? '-' }}</td>
    <td>{{ $transaction->product->name }}</td>
    <td>{{ $transaction->type === 'IN' ? 'Barang Masuk' : 'Barang Keluar' }}</td>
    <td>{{ $transaction->quantity }}</td>
    <td>{{ $transaction->user->name ?? '-' }}</td>
</tr>
@empty
<tr><td colspan="6">Belum ada histori transaksi.</td></tr>
@endforelse
</tbody>
</table>
{{ $transactions->links() }}
</div>
@endsection