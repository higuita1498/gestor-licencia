<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\View\View
     */
    public function index(User $user)
    {
        return view('users.index', ['users' => $user->paginate(15)]);
    }
}
