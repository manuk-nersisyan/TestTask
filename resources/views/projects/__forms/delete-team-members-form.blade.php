<form method="post" action="{{route('delete-members', ['member'=>$member->id])}}">
@method('delete')
@csrf
<button
    type="submit"
    onclick="return confirm('Are you sure?')"
    class="btn btn-danger float-right">Delete project</button>
</form>
