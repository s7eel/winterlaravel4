<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TaskController extends Controller
{
     public function __construct()
  {
    $this->middleware('auth');
  }
  
  /**
 * Отображение списка всех задач пользователя.
 *
 * @param  Request  $request
 * @return Response
 */
public function index(Request $request)
{
  return view('tasks.index');
}
/**
 * Создание новой задачи.
 *
 * @param  Request  $request
 * @return Response
 */
public function store(Request $request)
{
  $this->validate($request, [
    'name' => 'required|max:255',
  ]);
   $request->user()->tasks()->create([
    'name' => $request->name,
  ]);

  return redirect('/tasks');

  // Создание задачи...
}

}
