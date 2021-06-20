


<h3><a href="{{ route('posts.show', ['post' => $post->id])}}">{{ $post->title }}</a></h3>


@if ($post->comments_count)
    <p>{{ $post->comments_count }} comment</p>
@else
    <p>NOOOOOOO!!!!!</p>
@endif
<div class="mb-3">
    <a href="{{ route('posts.edit', ['post' => $post->id])}}" class="btn btn-primary">Edit</a>
    <form class="d-inline" action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="POST">
        @csrf
        @method("DELETE")
        <input type="submit" class="btn btn-primary " value="Delete!">
    </form>
</div>
