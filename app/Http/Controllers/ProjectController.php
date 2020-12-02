<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProject;
use App\Http\Requests\UpdateProject;
use App\Models\Member;
use App\Models\Project;
use App\Models\Team;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\DocBlockFactory;

class ProjectController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        if (Auth::user()->role == 0){
            $projects = Project::query()
                ->select('projects.id', 'projects.title')
                ->join('members','members.project_id','=', 'projects.id')
                ->where('members.user_id','=', Auth::id())
                ->paginate(10);
        }else{
            $projects = Project::query()->paginate(10);
        }


        return view('projects.index',  compact('projects'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProject $request)
    {
        Project::query()->create([
            'title' => $request->post('title'),
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $team = Member::query()
            ->select('user_id')
            ->where('project_id','=', $project->id)
            ->pluck('user_id')->toArray();

        $members = \App\Models\User::query()
            ->select('id', 'name')
            ->where('role' ,'=', 0)
            ->whereNotIn('id', $team)
            ->get();

        return view('projects.show',compact('project','members'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProject $request, Project $project)
    {
        $project->update(['title'=>$request->post('title')]);
        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index');
    }
}
