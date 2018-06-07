<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Auth;


class ViewController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   

        $products = Product::where('active',TRUE)->get();

    	return view('dashboard.index',compact('products'));
    }

    public function show($id)
    {

        $product = Product::find($id);

    	return view('dashboard.show',compact('product'));
    }
}
