<h1>{{ $user['name'] }}</h1>
<h2>{{ $user['email'] }}</h2>
<small>Joined: {{ Carbon\Carbon::parse($user['created_at'])->diffForHumans() }}</small>

<h3>Last 5 Threads</h3>
<ol>
    @foreach ($user['threads'] as $thread)
    <li><a href="{{ route('thread_detail', $thread['id']) }}">{{ $thread['title'] }}</a></li>
    @endforeach
</ol>

<h3>Last 5 Comments</h3>
<ol>
    @foreach ($user['comments'] as $comment)
    <li>"{{ $comment['body'] }}" on <a href="{{ route('thread_detail', $comment['thread']['id']) }}">{{ $comment['thread']['title'] }}</a></li>
    @endforeach
</ol>
