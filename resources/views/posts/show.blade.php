@extends('layouts.master')

@section('title')
  {{ $post->title }} | Blog
@endsection

@section('content')
  <h1>{{ $post->title }}</h1>
  <div class="post-info">
    <span>作者: {{ $post->author }}</span>
    <span>日期: {{ $post->created_at->format('Y/m/d G:i:s') }}</span>
  </div>
  <div class="content">{{ $post->body }}</div>
  <div class="comments mt-3">
    <ul class="list-group">
      @foreach ($post->comments as $comment)
        <li class="list-group-item"> {{ $comment->body }} ({{ $comment->created_at->diffForHumans() }}) </li>
      @endforeach
    </ul>
  </div>
  <div class="card mt-3">
    <div class="card-block">
      <form action="{{ route('comment_store', ['id' => $post->id] )}}" method="POST">
        @csrf
        <div class="form-group">
          <textarea name="body" id="body" class="form-control" placeholder="Your Comment."></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">留言</button>
        </div>
      </form>
      @include('layouts.errors')
    </div>
  </div>
  <div class="mt-3">
    <a href="{{route('posts_index')}}" class="btn btn-primary">Back</a>
  </div>
@endsection