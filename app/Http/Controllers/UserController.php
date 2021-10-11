<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function tambahUser() {
        $data = User::create([
            "name" => "Rigel Ramadhan",
            "email" => "rigel@gmail.com",
            "password" => "123"
            ]);

        return $data;
    }

    public function updateUser(Request $request, $id) {
        $data = User::where('id', $id)->update($request->all());
        return $data;
    }
}


