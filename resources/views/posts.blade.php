<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Blog</title>
</head>
<body>
  <h1>所有文章</h1>
  <table>
  <thead>
    <tr>
      <td>編號</td>
      <td>作者</td>
      <td>標題</td>
      <td>內容</td>
    </tr>
  </thead>
  <tbody>
    @foreach($posts as $post)
      <tr>
        <td>{{ $post->id}} </td>
        <td>{{ $post->author}} </td>
        <td>{{ $post->title}} </td>
        <td>{{ $post->body}} </td>
      </tr>
    @endforeach
  </tbody>
  </table>

  <h1>熱門文章</h1>
  <table>
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
        <td>{{ $post->title}} </td>
        <td>{{ $post->body}} </td>
      </tr>
    @endforeach
  </tbody>
  </table>
</body>
</html>