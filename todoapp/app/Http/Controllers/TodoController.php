<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        $tags = Tag::all();
        $user = Auth::id();
        return view('index',[
            'todos' => $todos,
            'tags' => $tags,
            'user' => $user,
        ]);
    }

    public function create(TodoRequest $request)
    {
        $todo =$request->input('content');
        $user = Auth::id();
        $tag = $request->input('tag_id');
        unset($request['_token']);
        Todo::create(['content'=>$todo,'user_id'=>$user,'tag_id'=>$tag]);
        return redirect('/home');
    }

    public function update(TodoRequest $request)
    {
        $todo = $request->input('content');
        $user= Auth::id();
        $tag = $request->input('tag_id');
        unset($request['_token']);
        Todo::find($request->id)->update(['content'=>$todo,'user_id'=>$user,'tag_id'=>$tag]);
        return redirect('/home');
    }

    public function delete(Request $request)
    {
        $todo = Todo::find($request->id)->delete();
        return redirect('/home');
    }
}