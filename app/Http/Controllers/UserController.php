<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(int $id)
    {
        $user = User::find($id);

        return view('users.show', ['user' => $user]);
    }
}