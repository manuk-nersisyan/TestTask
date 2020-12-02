<form method="post" action="{{route('delete-tasks', ['task'=>$task])}}">
    @method('delete')
    @csrf
    <button
        type="submit"
        onclick="return confirm('Are you sure?')"
        class="btn btn-danger float-right">Delete project</button>
</form>
