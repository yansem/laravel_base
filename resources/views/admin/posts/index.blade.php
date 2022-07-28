@extends('layouts.admin')
@section('content')
    @foreach($posts as $post)
        <div><a href="{{ route('admin.post.show', [$post->id]) }}">{{ $post->id }}. {{ $post->title }}</a></div>
    @endforeach
    <a href="{{ route('admin.post.create') }}">Create</a>
    {{ $posts->links() }}
@endsection
