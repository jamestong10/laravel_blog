@extends('layouts.master')

@section('title')
  Edit a post
@endsection

@section('content')
  @include('layouts.errors')

  <h1>Edit {{ $post->id }}</h1>
  <form action="{{ route('posts_update', $post->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="title">標題</label>
      <input type="text" id="title" name="title" placeholder="Title" class="form-control" value="{{ $post->title }}">
    </div>
    <div class="form-group">
      <label for="body">內容</label>
      <textarea id="body" name="body" cols="30" rows="10" placeholder="Body" class="form-control">{{ $post->body }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">更新</button>
  </form>
@endsection