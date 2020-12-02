<div class="bs-example">
    <form action="{{route('projects.store')}}" method="post">
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
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-primary">Create project</button>
            </div>
        </div>
    </form>
</div>
