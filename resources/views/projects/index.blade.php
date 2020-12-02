@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Projects') }}
                        @if(\Illuminate\Support\Facades\Auth::user()->role == 1)
                        <a href="{{route('projects.create')}}" class="btn btn-primary float-right"> Create project</a>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="container container-fluid">
                            <div class="row">
                                @foreach($projects as $project)
                                    <a href="{{route('projects.show',['project'=>$project->id])}}" class="btn btn-primary btn-block"> {{$project->title}}</a>
                                @endforeach
                            </div>
                        </div>
                        {{ $projects->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
