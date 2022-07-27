@extends('layouts.main')
@section('content')
    @foreach($posts as $post)
        <div><a href="{{ route('post.show', [$post->id]) }}">{{ $post->id }}. {{ $post->title }}</a></div>
    @endforeach
    <a href="{{ route('post.create') }}">Create</a>
    {{ $posts->links() }}
@endsection

