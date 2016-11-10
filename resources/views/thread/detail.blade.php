<h1>{{ $thread['title'] }}</h1>
<small>{{ $thread['author']['name'] }}</small>
<p>{{ $thread['body'] }}</p>
<p><a href="{{ route('dashboard') }}">Go Back To Dashboard</a></p>
