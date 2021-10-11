<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index (Request $request) {
        return 'Hello, from lumen! We got your request from endpoint: ' . $request->path();
    }

    public function hello()
    {
        $data['status'] = 'Success';
        $data['message'] = 'Hello, from lumen!';
        return (new Response($data, 201))
            ->header('Content-Type', 'application/json');
    }
}
