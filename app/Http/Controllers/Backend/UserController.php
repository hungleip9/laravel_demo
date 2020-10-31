<?php


namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Products;
use App\Models\User;

use App\Models\User_info;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserController
{
    public function index(){
        $users = User::paginate(2);
//        $users = DB::table('users')->get();
//        dd($users);
        return view('backend.users.index',[
            'users' => $users
        ]);
    }
    public function create(){
        return view('backend.users.create');
    }
    public function store(Request $request)
    {
        // Lấy dữ liệu từ Form
        $name = $request->get('name');
        $email = $request->get('email');
        $password = $request->get('password');
        $status = $request->get('status');


        // Tạo dữ liệu mới
        $user = new User();
        $user->name = $name;
        $user->status = $status;
        $user->email = $email;
        $user->password = $password;
        echo $user;
        $user->save();
        return redirect()->route('user.index');
    }
    public function showProduct($id){
        $user = User::find($id);
        $products = $user->product;
        foreach ($products as $product){
            echo $product->name."\n";
        }
    }
    public function test(){
//        $user = User::find(1);
////        dd($user->userInfo->fullname);
//        $userInfo = $user-> userInfo;
////        dd($userInfo->fullname);
//        $user_info = UserInfo::find(1);
//        $user = $user_info->user;
//        dd($user->email);
        //quan he 1 nhieu
//        $category = Category::find(1);
//        $products = $category->products;
////        dd($products);
//        foreach ($products as $product){
//            echo $product->name."\n";
//        }
//        $products = Category::find(1)->products()->where('status',1)->get();
//        dd($products);
//        $products = Products::find(1);
//        $category = Category::find(1);
//        $products = $category->products()->save($products);

//        $category = Category::find(3);

//        $product = $category->products()->create([
//            'name' => 'san pham create 3',
//            'slug' => 'h1',
//            'status' => '10',
//            'origin_price' => '10000',
//            'sale_price' => '5000',
//            'content' => 'Noi dung demo',
//            'user_id' => 1
//        ]);
        $order = Order::find(1);
        $product_id = 1;
        $product_id_2 = 2;
        $product_id_3 = 3;
//        dd($order);
        $order->products()->attach([
            $product_id,
            $product_id_2,
            $product_id_3
        ]);
    }

}
