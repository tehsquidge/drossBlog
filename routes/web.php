<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    $posts = \drossBlog\Post::orderBy('id', 'DESC')->get();
    return view('home', compact('posts'));
})->name('home');

Route::get('/read/{id}', function ($id) {
    $post = \drossBlog\Post::find($id);
    return view('read', compact('post'));
})->name('read');

Route::get('/admin', function () {
    if (!Auth::check()) {
        return redirect()->route('login');
    }
    $posts = \drossBlog\Post::orderBy('id', 'DESC')->get();
    return view('admin.index', compact('posts'));
})->name('admin');

Route::match(array('GET', 'POST'),'/admin/login', function(){
    if(\drossBlog\User::count() == 0){
        return redirect()->route('addUser');
    }
    if (Auth::check()) {
        return redirect()->route('admin');
    }
    if (Auth::attempt(['email' => Input::get('email'), 'password' => Input::get('password')])) {
        return redirect()->route('admin');
    }
    return view('admin.login');
})->name('login');

Route::get('/admin/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

Route::match(array('GET', 'POST'),'/admin/addUser', function () {
    if (!Auth::check() && !\drossBlog\User::count() == 0) {
        return redirect()->route('login');
    }
    if(null !== Input::get('submit')){
        $credentials = Input::only('email', 'password','name');
        $credentials['password'] = Hash::make($credentials['password']);
        try {
            $user = \drossBlog\User::create($credentials);
            $user->save();
        } catch (Exception $e) {

        }
        return redirect()->route('login');
    }
    return view('admin.addUser');
})->name('addUser');

Route::match(array('GET', 'POST'),'/admin/add', function () {
    if (!Auth::check()) {
        return redirect()->route('login');
    }
    $post = new \drossBlog\Post();
    if(null !== Input::get('submit')){
        $post->title = Input::get('title');
        $post->copy = Input::get('copy');
        $post->save();
        return redirect()->route('edit', ['id' => $post->id]);
    }

    return view('admin.add', compact('post'));
})->name('add');

Route::match(array('GET','POST'),'/admin/delete/{id}', function($id){
    if (!Auth::check()) {
        return redirect()->route('login');
    }
    \drossBlog\POST::destroy($id);
    return redirect()->route('admin');
})->name('delete');

Route::match(array('GET', 'POST'),'/admin/edit/{id}', function ($id) {
    $post = \drossBlog\Post::find($id);
    $post->title = (null !== (Input::get('title')))? Input::get('title') : $post->title;
    $post->copy= (null !== (Input::get('copy')))? Input::get('copy') : $post->copy;

    if(null !== Input::get('submit')){
        $post->save();
    }

    return view('admin.edit', compact('post'));
})->name('edit');
