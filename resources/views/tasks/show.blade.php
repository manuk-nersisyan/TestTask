@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Task') }}
                    </div>
                    <div class="card-body">
                        <h1>{{$task->title}}</h1>
                        <h1>Comments</h1>
                        @include('tasks.__forms.create-comment-to-task-form')
                        @foreach($task->comments as  $comment)
                            <b> {{$comment->user->name}}</b>
                            <p> {{$comment->text}}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
