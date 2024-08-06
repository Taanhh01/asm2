<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
{
    $featuredProducts = Product::where('is_featured', true)->take(3)->get();
    return view('index', compact('featuredProducts'));
}
}
