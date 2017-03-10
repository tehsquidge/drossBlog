@extends('layouts.blog')
@section('content')
    <form id="admin-login-form" class="container" method="post">
        <div class="row">
            <div class="twelve column">
                <h1>Admin: Login</h1>
            </div>
        </div>
        <div class="row">
            <div class="twelve column">
                <label for="email">Email</label>
                <input type="text" name="email" id="email">
            </div>
        </div>
        <div class="row">
            <div class="twelve column">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </div>
        </div>
        <div class="row">
            <div class="twelve column">
                <input type="submit" class="button button-primary" value="Login">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
        </div>
    </form>

@endsection
