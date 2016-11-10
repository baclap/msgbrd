@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <h2>Menu</h2>
                    <ul>
                        <li><a href="{{ route('thread_form') }}">Create Thread</a></li>
                    </ul>
                    <h2>Threads</h2>
                    <ul>
                        @foreach($threads as $thread)
                            <li>
                                <a href="{{ route('thread_detail', ['id' => $thread['id']]) }}">{{ $thread['title'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
