<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index(){
        $tasks  = Task::where('status',1)
            ->orderBy('name', 'desc')
            ->take(5)
            ->get();
        return view('task.list',[
            'tasks'=> $tasks
        ]);
    }


    public function create()
    {
        return view('task.create');
    }


    public function store(Request $request)
    {
        $task = new Task();
        $task->name = $request->name;
        $task->content = $request->content;
        $task->deadline = $request->deadline;
        $task->status = $request->status;
        dd($task);
        $task->save();
        setcookie('msg', 'Thêm thành công', time() + 4);
        return redirect(route('task.index'));

    }


    public function show($id)
    {
        $task = Task::find($id);
        $task = Task::where('id', $id)->first();
        dd($task->name);
    }


    public function edit($id)
    {
        $name = "Hoc lap trinh";
        return view('task.edit')->with(['name' => $name]);
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        setcookie("msg", "Xóa Thành công", time() + 4);
        return redirect(route('task.index'));
    }
    public function complete($id){
        return 'Ban da hoan thanh';
    }
    public function reComplete($id){
        return 'Lam Lai';
    }
}
