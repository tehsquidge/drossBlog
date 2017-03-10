@extends('layouts.blog')

@section('content')
<div class="container">
  <div class="row">
    <div class="twelve column">
        <h1>Posts</h1>
      @foreach ($posts as $postItem)
        <div class="post-preview">
          <h2>{{ $postItem->title }}</h2>
          {!! truncate_html($postItem->copy,500,'') !!}
          <div class="buttons"><a class="button button-primary" href="{{ route('read', ['id' => $postItem->id]) }}">View</a></div>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
