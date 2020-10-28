<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::paginate(5);
        return view('backend.categories.index',[
            'category' => $category
        ]);

    }
}
