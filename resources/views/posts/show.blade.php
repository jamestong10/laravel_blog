@extends('layouts.master')

@section('title')
  {{ $post->title }} | Blog
@endsection

@section('content')
  <h1>{{ $post->title }}</h1>
  <div class="post-info">
    <span>作者: {{ $post->author }}</span>
    <span>日期: {{ \Carbon\Carbon::parse($post->created_at)->format('Y/m/d G:i:s') }}</span>
  </div>
  <div class="content">{{ $post->body }}</div>
  <a href="{{route('posts_index')}}">Back</a>
@endsection