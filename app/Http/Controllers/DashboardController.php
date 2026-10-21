<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\StockTransaction;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'productCount' => Product::count(),
            'categoryCount' => Category::count(),
            'totalStock' => Product::sum('stock'),
            'lowStock' => Product::where('stock', '<=', 5)->get(),
            'latestTransactions' => StockTransaction::with([
                'product',
                'user',
            ])->latest()->take(10)->get(),
        ]);
    }
}