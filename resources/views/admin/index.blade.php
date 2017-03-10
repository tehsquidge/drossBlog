@extends('layouts.blog')

@section('content')
<div class="container">
    <div class="row">
        <div class="twelve column">
            <h1>Admin: post list</h1>
        </div>
    </div>
    <div class="row">
        <div class="twelve column">
            <div class="buttons">
                <a href="{{ route('logout') }}" class="button">Logout</a>
                <a href="{{ route('home') }}" class="button">Home</a>
                <a href="{{ route('add') }}" class="button button-primary">Add</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="twelve column">
            <table class="u-full-width">
              <tr><th>Title</th><th>Extract</th><th>Actions</th></tr>
              @foreach ($posts as $postItem)
              <tr>
                  <td>{{ $postItem->title }}</td>
                  <td>{{ str_limit(strip_tags($postItem->copy),200) }}</td>
                  <td>
                      <a class="button" href="{{ route('read', ['id' => $postItem->id]) }}">View</a>
                      <a class="button" href="{{ route('edit', ['id' => $postItem->id]) }}">Edit</a>
                  </td>
              </tr>
              @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
