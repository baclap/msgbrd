<h1>Thread Title: {{ $thread['title'] }}</h1>
<small>Author: <a href="{{ route('user_profile', ['id' => $thread['author']['id']]) }}">{{ $thread['author']['name'] }}</a></small><br>
<small>Date: {{ Carbon\Carbon::parse($thread['created_at'])->format('m-d-Y @h:i:sA') }}</small>
<p>Body: {{ $thread['body'] }}</p>
<p><a href="{{ route('dashboard') }}">Go Back To Dashboard</a></p>

<hr>

@foreach ($thread['comments'] as $comment)
<p>{{ $comment['body'] }}</p>
<small>Author: {{ $comment['author']['name'] }}</small><br>
<small>Date: {{ Carbon\Carbon::parse($comment['created_at'])->format('m-d-Y @h:i:sA') }}</small>
@endforeach

<hr>

<form action="{{ route('create_comment', ['id' => $thread['id']]) }}" method="POST">
    {{ csrf_field() }}
    <textarea name="body">Write something...</textarea><br>
    <button type="submit">Submit Comment</button>
</form>
