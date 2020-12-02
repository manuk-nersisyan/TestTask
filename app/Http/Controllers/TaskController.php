<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMember;
use App\Http\Requests\StoreTask;
use App\Http\Requests\UpdateProject;
use App\Http\Requests\UpdateTask;
use App\Models\Member;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        if ($project->user_id != Auth::id()){
            abort(404);
        }
        $members = Member::query()->where('project_id','=', $project->id)->get();

        return view('tasks.create', compact('members', 'project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTask $request)
    {
        Task::query()->create([
            'title' => $request->post('title'),
            'project_id' => $request->post('project_id'),
            'creator_id' => Auth::id(),
            'user_id' => $request->post('user_id'),
        ]);

        return redirect()->route('projects.show', ['project' => $request->project_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $members = Member::query()->where('project_id','=', $task->project_id)->get();

        return view('tasks.edit', compact('task','members'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTask $request, Task $task)
    {
        if (Auth::user()->role == 0){
            $task->update([
                'status'=>$request->post('status')
            ]);
            return redirect()->back();
        }
        $task->update([
            'title'=>$request->post('title'),
            'user_id'=>$request->post('user_id'),
            'status'=>$request->post('status')
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->back();
    }
//
//    public function updateTaskStatus(){
//
//    }
}
