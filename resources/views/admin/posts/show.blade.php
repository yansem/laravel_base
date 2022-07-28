@extends('layouts.admin')
@section('content')
    <div>{{ $post->title }}</div>
    <div>{{ $post->content }}</div>
    <a href="{{ route('post.index') }}">Back</a>
    <a href="{{ route('post.edit', $post->id) }}">Edit</a>
@endsection

