<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){

        $tasks = $request->user()->tasks()->orderBy('created_at','desc')->get();
       

        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function store(Request $request){
       $this->validate($request, [
           'title'=> 'required|max:255', 
       ]);

       $request-> user()-> tasks()->create([
           'title'=> $request->title
       ]);
       return redirect('/tasks');
    }

    public function editView($id){
        $task = Task::find($id);

        if (empty($task)) {
            return redirect('/tasks');
        }
        $this->authorize('edit', $task);
        return view('tasks.edit', ['task'=>$task]);

    }

    public function edit(Request $request, $id){

     
        $this->validate($request, [
            'title'=> 'required|max:255', 
        ]);

        $task = Task::find($id);
       
        if (empty($task)) {
            return redirect('/tasks');
        }
        $this->authorize('edit', $task);
        $task->title = $request->title;
        $task->save();
        return redirect('/tasks');
    }


    public function destroy($id){
        $task = Task::find($id);

        if (empty($task)) {
            return redirect('/tasks');
        }
        $this->authorize('edit', $task);
        $task->delete();
        return redirect('/tasks');
    }
}
