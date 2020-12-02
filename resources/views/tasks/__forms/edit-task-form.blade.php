<div class="bs-example">
    <form action="{{route('task-update',['task'=>$task])}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group row">
            <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input type="text" name="title" class="form-control" id="inputTitle" placeholder="Title" value="{{$task->title}}" required>
                @error('title')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="inputUser" class="col-sm-2 col-form-label">Member</label>

            <div class="col-sm-10">
                <select class="form-control" id="inputUser" name="user_id">
                    @if(!$task->user_id)
                    <option value="">choose member</option>
                    @endif
                    @foreach($members as $member)
                        <option
                            value="{{$member->user->id}}"
                            {{($task->user_id == $member->user_id) ? 'selected':''}}>
                            {{$member->user->name}}
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <input type="hidden" name="project_id" value="{{$task->project_id}}">
            </div>
        </div>

        <div class="form-group row">
            <label for="inputStatus" class="col-sm-2 col-form-label">Status</label>

            <div class="col-sm-10">
                <select class="form-control" id="inputTaskStatus" name="status">
                    <option value="0" {{($task->status == 0) ? 'selected':''}}>To Do</option>
                    <option value="1" {{($task->status == 1) ? 'selected':''}}>In Progress</option>
                    <option value="2" {{($task->status == 2) ? 'selected':''}}>Resolved</option>
                </select>
                @error('status')
                     <p class="text-danger">{{ $message }}</p>
                @enderror
                <input type="hidden" name="project_id" value="{{$task->project_id}}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-primary">Update task</button>
            </div>
        </div>
    </form>
</div>
