@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Project') }}
                        @if(\Illuminate\Support\Facades\Auth::user()->role == 1)
                            @include('projects.__forms.delete-project-form')
                            <a href="{{route('projects.edit', ['project'=>$project->id])}}" class="btn btn-warning float-right"> Update project</a>
                            <a href="{{route('task-create',['project'=>$project])}}" class="btn btn-primary float-right"> Create task</a>
                        @endif
                    </div>
                    <div class="card-body">
                        <h1>{{$project->title}}</h1>
                        @if(\Illuminate\Support\Facades\Auth::user()->role == 1)
                            @include('projects.__forms.add-members-to-project-form')
                            <h1>Members</h1>
                            @foreach($project->members as  $member)
                                <p> {{$member->user->name}}</p>
                                @include('projects.__forms.delete-team-members-form')
                            @endforeach
                        @endif
                            <h1>Tasks</h1>
                            @foreach($project->tasks as  $task)
{{--                            @if($task->user_id == \Illuminate\Support\Facades\Auth::id())--}}
                                <a href="{{route('task-show', ['task'=>$task])}} "> {{$task->title}} </a>
                                <a href="{{route('task-edit', ['task'=>$task])}} " class="btn btn-primary"> Edit </a>
{{--                            @endif--}}
                            @if(\Illuminate\Support\Facades\Auth::user()->role == 1)
                                @include('tasks.__forms.delete-task-from')
                            @endif
                            @endforeach




                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
