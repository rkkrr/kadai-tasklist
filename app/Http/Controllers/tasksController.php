<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Task; 

use App\User;

class tasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $tasks = $user->tasks()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'tasks' => $tasks,
            ];
            //  $data += $this->counts($user);
            return view('tasks.index', $data);
        }else {
            return view('welcome');
        }
    return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (\Auth::check()) {
        
          $task = new Task;

        return view('tasks.create', [
            'tasks' => $task,
        ]);
        
    }
    else {
        return redirect('/');
    }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    
    {
        if (\Auth::check()) {
          $this->validate($request, [
            'staus' => 'required|max:191',
            'content' => 'required|max:191',
        ]);
        $request->user()->tasks()->create([
            'content' => $request->content,
            'staus'  => $request->staus,
        ]);
        // $tasks = new Task;
        // $tasks->staus = $request->staus; 
        // $tasks->content = $request->content;
        //  $tasks->save();
        
    }else{
        return redirect('/');
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (\Auth::check()) {
          $tasks = Task::find($id);

        return view('tasks.show', [
            'tasks' => $tasks,
        ]);

    }
    else{
        return redirect('/');
    }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (\Auth::check()) {
            $tasks = Task::find($id);

        return view('tasks.edit', [
            'tasks' => $tasks,
        ]);
    }
    else{
        return redirect('/');
    }
}
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (\Auth::check()) {
        $this->validate($request, [
            'status' => 'required|max:10', 
            'content' => 'required|max:10',
        ]);
        $tasks = Task::find($id);
        $tasks->status = $request->status;
        $tasks->content = $request->content;
        $tasks->save();

    }
    else{
        return redirect('/');
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (\Auth::check()) {
          $tasks = Task::find($id);
        $tasks->delete();

        return redirect('/');
    }
    }
}
