<form method="post" action="{{route('projects.destroy', ['project'=>$project->id])}}">
    @method('delete')
    @csrf
    <button
        type="submit"
        onclick="return confirm('Are you sure?')"
        class="btn btn-danger float-right">Delete project</button>
</form>
