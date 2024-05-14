<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Todo;


class TodoController extends Controller
{
   public function index(){
        $todos = Todo::all();
        return view('admin.manage-todos.view',['todos'=> $todos]);
    }
    
    public function store(Request $request){

       $formData =  $request -> validate([
            'title' => 'required',
            'content' => 'required',
        ]); 

        Todo::create($formData);

        return redirect()->route('todos.create')->withStatus('Created Succesfully!');
    }

    public function edit(Todo $todos){
        return view('admin.manage-todos.edit',['todos'=>$todos]);
    }
   
    public function update(Todo $todos, Request $request){

        $formData =  $request -> validate([
            'title' => 'required',
            'content' => 'required',
        ]); 
        $todos->update($formData);

        return redirect()->route('view.todos')->withStatus('Created Succesfully!');
    }
    public function distroy(Todo $todos){
        $todos->delete();
        return redirect()->route('view.todos')->withStatus('deleted Succesfully!');
    }
}
