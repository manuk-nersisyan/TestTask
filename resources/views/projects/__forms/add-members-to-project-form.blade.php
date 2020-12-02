<div class="bs-example">
    <form action="{{route('add-members-store')}}" method="post">
        @csrf
        <div class="form-group row">
            <label for="inputUser" class="col-sm-2 col-form-label">User</label>
            <div class="col-sm-10">
                <select class="form-control" id="inputUser" name="user_id">
                    @foreach($members as $member)
                        <option value="{{$member->id}}">{{$member->name}}</option>
                    @endforeach
                </select>
                @error('user_id')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                @error('project_id')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <input type="hidden" name="project_id" value="{{$project->id}}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-primary">Add member</button>
            </div>
        </div>
    </form>
</div>
