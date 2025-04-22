<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class HomepageController extends Controller
{
    public function index()
    { 
       $categories = Categories::all();
        return view('web.homepage', [
            'categories' => $categories,
        ]);
    }

    public function products()
    {
        return view('web.products');
    }

    public function categories()
    {
        return view('web.categories');
    }

    public function cart()
    {
        return view('web.cart');
    }

    public function checkout()
    {
        return view('web.checkout');
    }

    public function singleProduct($slug)
    {
        return view('web.single_products', ['slug' => $slug]);
    }

    public function singleCategory($slug)
    {
        return view('web.single_categories', ['slug' => $slug]);
    }
}