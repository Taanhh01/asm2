<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalProducts = Product::count();
        $productsByCategory = Category::withCount('products')->get();
        $totalViews = DB::table('products')->sum('views');

        return view('admin.dashboard', compact('totalProducts', 'productsByCategory', 'totalViews'));
    }
}
