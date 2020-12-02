<div class="bs-example">
    <form action="{{route('task-store')}}" method="post">
        @csrf
        <div class="form-group row">
            <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input type="text" name="title" class="form-control" id="inputTitle" placeholder="Title" required>
                @error('title')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="inputUser" class="col-sm-2 col-form-label">Member</label>

            <div class="col-sm-10">

            <select class="form-control" id="inputUser" name="user_id">
                <option value="">choose member</option>

            @foreach($members as $member)
                    <option value="{{$member->user->id}}">{{$member->user->name}}</option>
            @endforeach
            </select>
            @error('user_id')
            <p class="text-danger">{{ $message }}</p>
            @enderror
                <input type="hidden" name="project_id" value="{{$project->id}}">
        </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-primary">Create task</button>
            </div>
        </div>
    </form>
</div>
