<?php


namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\User;

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

}
