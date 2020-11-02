<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Products;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::paginate(5);
        return view('backend.categories.index',[
            'categories' => $categories
        ]);
    }
    public function showProducts($id){
        $category = Category::find($id);
        $products = $category->product;
        return view('backend.categories.showProduct',[
            'products' => $products
        ]);


    }
}
