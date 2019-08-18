<?php

namespace App\Http\Controllers;

use App\Todo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodosController extends Controller
{
  public function __construct()
  {
    $this->middleware(['auth']);
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $user = Auth::user();
    $todos = $user->todos()->orderBy('created_at', 'desc')->paginate(8);
    return view('todos.index', compact('todos'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('todos.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $rules = [
      'title' => 'required|string|unique:todos,title|min:2|max:191',
      'body' => 'required|string|min:5|max:1000'
    ];

    $messages = [
      'title.unique' => 'Todo title should be unique'
    ];

    $this->validate($request, $rules, $messages);

    $todo = new Todo;
    $todo->title = $request->title;
    $todo->body = $request->body;
    $todo->user_id = Auth::id(); //add the authenticated user id to "user_id" column.
    $todo->save();

    return redirect()
      ->route('todos.index')
      ->with('status', 'Created a new Todo!');
  }

  /**
   * Display the specified resource.
   *
   * @param \App\Todo $todo
   * @return \Illuminate\Http\Response
   */
  public function show(Todo $todo)
  {
    return view('todos.show', compact('todo'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param \App\Todo $todo
   * @return \Illuminate\Http\Response
   */
  public function edit(Todo $todo)
  {
    return view('todos.edit', compact('todo'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param \App\Todo $todo
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Todo $todo)
  {
    $rules = [
      'title' => "required|string|unique:todos,title,{$todo->id}|min:2|max:191", //Using double quotes
      'body' => 'required|string|min:5|max:1000',
    ];

    $messages = [
      'title.unique' => 'Todo title should be unique'
    ];

    $this->validate($request, $rules, $messages);

    $todo->title = $request->title;
    $todo->body = $request->body;
    $todo->save();

    return redirect()
      ->route('todos.show', $todo->id)
      ->with('status', 'Updated the selected Todo!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param \App\Todo $todo
   * @return \Illuminate\Http\Response
   */
  public function destroy(Todo $todo)
  {
    $todo->delete();
    return redirect()
      ->route('todos.index')
      ->with('status', 'Deleted the selected Todo!');
  }
}
