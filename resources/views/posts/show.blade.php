<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $post->title }} | Blog</title>
</head>
<body>
  <h1>{{ $post->title }}</h1>
  <div class="post-info">
    <span>作者: {{ $post->author }}</span>
    <span>日期: {{ $post->created_at }}</span>
  </div>
  <div class="content">{{ $post->body }}</div>
  
</body>
</html>