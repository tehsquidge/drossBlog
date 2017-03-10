@extends('layouts.blog')

@section('content')
<div class="container">
  <div class="row">
    <div class="twelve column">
        <h1>{{$post->title}}</h1>
        {!! $post->copy !!}
    </div>
  </div>
  <div class="row">
    <div class="twelve column">
        <div class="buttons">
            <a href="{{ route('home') }}" class="button">Back</a>
        </div>
    </div>
  </div>
</div>
@endsection
