@extends('layouts.blog')
@section('content')
    @section('title')
    <h1>Admin: edit</h1>
    @endsection
    @section('formButtons')
        <a href="{{ route('admin') }}" class="button">Back</a>
        <a href="{{ route('read', $post->id) }}" class="button">View</a>
        <a href="{{ route('delete', $post->id) }}" class="button">Delete</a>
        <input class="button button-primary" type="submit" name="submit" value="Save">
        @parent
    @endsection
    @include('admin.includes.form')
@endsection
