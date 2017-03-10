@extends('layouts.blog')
@section('content')
    @section('title')
    <h1>Admin: add</h1>
    @endsection
    @section('formButtons')
        <a href="{{ route('admin') }}" class="button">Back</a>
        <input class="button button-primary" type="submit" name="submit" value="Create">
        @parent
    @endsection
    @include('admin.includes.form')
@endsection
