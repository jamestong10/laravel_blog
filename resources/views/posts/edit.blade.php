@extends('layouts.master')

@section('title')
  Create a new post
@endsection

@section('content')
  @include('layouts.errors')

  <h1>Edit {{ $post->id }}</h1>
  <hr>
  <form action="{{ route('posts_update', $post->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="title">標題</label>
    <input type="text" id="title" name="title" placeholder="Title" value="{{ $post->title }}">
    <br>
    <label for="body">內容</label>
  <textarea id="body" name="body" cols="30" rows="10" placeholder="Body">{{ $post->body }}</textarea>
    <button type="submit">更新</button>
  </form>
@endsection