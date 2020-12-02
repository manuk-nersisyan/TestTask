<div class="bs-example">
    <form action="{{route('task-update',['task'=>$task])}}" method="post">
        @csrf
        @method('put')
        <div class="form-group row">
            <label for="inputTaskStatus" class="col-sm-2 col-form-label">Task status</label>
            <div class="col-sm-10">
                <select class="form-control" id="inputTaskStatus" name="status">
                    <option value="0" {{($task->status == 0) ? 'selected':''}}>To Do</option>
                    <option value="1" {{($task->status == 1) ? 'selected':''}}>In Progress</option>
                    <option value="2" {{($task->status == 2) ? 'selected':''}}>Resolved</option>
                </select>
                @error('status')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input type="hidden" value="{{$task->project_id}}" name="project_id">
                <input type="hidden" value="{{$task->title}}" name="title">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-primary">Update task status</button>
            </div>
        </div>
    </form>
</div>
