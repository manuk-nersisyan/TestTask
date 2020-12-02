<div class="bs-example">
    <form action="{{route('comment-store')}}" method="post">
        @csrf
        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">Comment</label>
            <div class="col-sm-10">
                <textarea name="text"
                          class="form-control"
                          id="inputText"
                          required>
                </textarea>
                @error('text')
                <p class="text-danger">{{ $message }}</p>
                @enderror

                <input type="hidden" name="task_id" value="{{$task->id}}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-primary">Create comment</button>
            </div>
        </div>
    </form>
</div>
