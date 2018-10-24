@extends('layouts.master')

@section('title')
  Create a new post
@endsection

@section('content')
  @include('layouts.errors')

  <h1>Create</h1>
  <form action="{{route('posts_store')}}" method="POST">
    @csrf
    <div class="form-group">
      <label for="title">標題</label>
      <input type="text" id="title" name="title" placeholder="Title" class="form-control">
    </div>
    <div class="form-group">
      <label for="body">內容</label>
      <textarea id="body" name="body" cols="30" rows="10" placeholder="Body" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">建立</button>
  </form>
@endsection