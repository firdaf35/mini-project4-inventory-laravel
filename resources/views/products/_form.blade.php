<label>Kategori</label>
<select name="category_id">
    <option value="">-- Tanpa kategori --</option>
    @foreach($categories as $category)
        <option value="{{ $category->id }}" @selected((string) old('category_id', $product->category_id ?? '') === (string) $category->id)>
            {{ $category->name }}
        </option>
    @endforeach
</select>

<label>Nama bunga</label>
<input type="text" name="name" value="{{ old('name', $product->name ?? '') }}" maxlength="150" required>

<label>SKU</label>
<input type="text" name="sku" value="{{ old('sku', $product->sku ?? '') }}" maxlength="50">

<label>Harga (Rp)</label>
<input type="number" name="price" value="{{ old('price', $product->price ?? 0) }}" min="0" step="0.01" required>

@if(!isset($product) || !$product->exists)
    <label>Stok awal</label>
    <input type="number" name="stock" value="{{ old('stock', 0) }}" min="0" required>
@else
    <p class="muted">Stok saat ini: {{ $product->stock }}. Untuk mengubah stok, gunakan menu Barang Masuk atau Barang Keluar.</p>
@endif