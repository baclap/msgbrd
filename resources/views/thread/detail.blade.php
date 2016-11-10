<h1>{{ $thread['title'] }}</h1>
<small>{{ $thread['author']['name'] }}</small>
<p>{{ $thread['body'] }}</p>
<p><a href="{{ route('dashboard') }}">Go Back To Dashboard</a></p>

<hr>

@foreach ($thread['comments'] as $comment)
<p>{{ $comment['body'] }}</p>
@endforeach

<hr>

<form action="{{ route('create_comment', ['id' => $thread['id']]) }}" method="POST">
    {{ csrf_field() }}
    <textarea name="body">Write something...</textarea><br>
    <button type="submit">Submit Comment</button>
</form>
