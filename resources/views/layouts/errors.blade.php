@if(session('error'))
<div class="alert alert-success">
    {{ session('error') }}
</div>
@endif

@if (count($errors) > 0)
  <div class="error">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>    
@endif
