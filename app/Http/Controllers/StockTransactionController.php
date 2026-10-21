<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class StockTransactionController extends Controller
{
    public function index(Request $request)
    {
        $query = StockTransaction::with(['product', 'user'])->latest();

        if (in_array($request->type, ['IN', 'OUT'], true)) {
            $query->where('type', $request->type);
        }

        $transactions = $query->paginate(15)->withQueryString();

        return view('stock.index', compact('transactions'));
    }

    public function create(Request $request)
    {
        $type = $request->query('type', 'IN');

        if (!in_array($type, ['IN', 'OUT'], true)) {
            $type = 'IN';
        }

        $products = Product::orderBy('name')->get();

        return view('stock.create', compact('products', 'type'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'type' => ['required', 'in:IN,OUT'],
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        DB::transaction(function () use ($data) {
            $product = Product::whereKey($data['product_id'])
                ->lockForUpdate()
                ->firstOrFail();

            if ($data['type'] === 'OUT' && $product->stock < $data['quantity']) {
                throw ValidationException::withMessages([
                    'quantity' => 'Stok tidak mencukupi. Stok tersedia: ' . $product->stock,
                ]);
            }

            if ($data['type'] === 'IN') {
                $product->increment('stock', $data['quantity']);
            } else {
                $product->decrement('stock', $data['quantity']);
            }

            StockTransaction::create([
                'product_id' => $product->id,
                'user_id' => auth()->id(),
                'type' => $data['type'],
                'quantity' => $data['quantity'],
            ]);
        });

        return redirect()->route('stock.index')
            ->with('success', 'Transaksi stok berhasil disimpan.');
    }
}