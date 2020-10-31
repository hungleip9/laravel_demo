<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(){
        $products = Product::paginate(5);
//        dd($products);
        return view('backend.products.index',[
            'products' => $products
        ]);

    }
    public function showImages($id){
        $product = Product::find($id);
        $images = $product->image;
        foreach ( $images as $image ){
            echo $image->name."\n";
        }
    }

}
