@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Task Edit') }}</div>
                    <div class="card-body">
                        @if(\Illuminate\Support\Facades\Auth::user()->role == 1)
                            @include('tasks.__forms.edit-task-form')
                        @else
                            @include('tasks.__forms.edit-task-status-form')
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
