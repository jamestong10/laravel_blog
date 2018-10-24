@extends('layouts.master')

@section('title')
  Blog
@endsection

@section('content')
  <div class="add-post mt-2">
    <a href="{{ route('posts_create') }}" class="btn btn-primary">新增文章</a>
  </div>
  <h1>所有文章</h1>
  <table class="table">
    <thead>
      <tr>
        <td>編輯</td>
        <td>編號</td>
        <td>作者</td>
        <td>標題</td>
        <td>內容</td>
      </tr>
    </thead>
    <tbody>
      @foreach($posts as $post)
        <tr>
          <td><a href="{{route('posts_edit', ['post' => $post->id])}}" class="btn btn-success">Edit</a></td>
          <td>{{ $post->id}} </td>
          <td>{{ $post->author}} </td>
          <td>
            <a href="{{route('posts_show', ['post' => $post->id])}}">
              {{ $post->title}}
            </a>
          </td>
          <td>{{ $post->body}} </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <h1>熱門文章</h1>
  <table class="table">
    <thead>
      <tr>
        <td>瀏覽數</td>
        <td>作者</td>
        <td>標題</td>
        <td>內容</td>
      </tr>
    </thead>
  <tbody>
    @foreach($hotPosts as $post)
      <tr>
        <td>{{ $post->hits}} </td>
        <td>{{ $post->author}} </td>
        <td>
          <a href="{{route('posts_show', ['post' => $post->id])}}">
            {{ $post->title}}
          </a>
        </td>
        <td>{{ $post->body}} </td>
      </tr>
    @endforeach
  </tbody>
  </table>

  <h2>分類統計</h2>
  <table class="table">
    <thead>
      <tr>
        <td>類別</td>
        <td>數量</td>
      </tr>
    </thead>
    <tbody>
      @foreach($states as $state)
        <tr>
          <td>{{ array_key_exists($state->state, $mappingState) ? $mappingState[$state->state] : '' }}</td>
          <td>{{ $state->cnt }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection