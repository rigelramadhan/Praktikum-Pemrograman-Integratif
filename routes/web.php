<?php

use Illuminate\Support\Str;

/** @var \Laravel\Lumen\Routing\Router $router */
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/home/test', ['uses' => 'HomeController@index']);
$router->get('/hello', ['uses' => 'HomeController@hello']);

$router->get('/key', function () {
    return Str::random(32);
});

$router->get('/get', function () {
    return 'GET';
});

$router->post('/post', function () {
    return 'POST';
});

$router->put('/put', function () {
    return 'PUT';
});

$router->patch('/patch', function () {
    return 'PATCH';
});

$router->delete('/delete', function () {
    return 'DELETE';
});

$router->options('/options', function () {
    return 'OPTIONS';
});

$router->get('/post/{postId}/comments/{commentId}', function($postId, $commentId) {
    return "Post ID = $postId Comments ID = $commentId";
});

// $router->get('/users[/{userId}]', function($userId = null) {
//     return $userId === null ? 'Data semua users' : 'Data user dengan id ' . $userId;
// });

$router->get('/auth/login', ['as' => 'route.auth.login', function () {
    return "HALAMAN LOGIN";
}]);

$router->get('/profile', function (Request $request) {
    if ($request->isLoggedIn == false) {
        return redirect()->route('route.auth.login');
    }

    return "HALAMAN PROFILE";
});

$router->group(['prefix' => 'users'], function () use ($router) {
    $router->get('/', function () {
        return "GET /users";
    });

    $router->get('/test', function () {
        return "Testing group route";
    });
});

$router->get('/admin/home/', ['middleware' => 'age', function () {
    return 'Dewasa';
}]);
    
$router->get('/fail', function () {
    return 'Dibawah umur';
});

$router->post('/tambah', ['uses' => 'UserController@tambahUser']);

$router->group(['prefix' => 'user'], function () use ($router) {
    $router->post('/tambah', ['uses' => 'UserController@tambahUser']);
    $router->put('/update/{id}', ['uses' => 'UserController@updateUser']);
});