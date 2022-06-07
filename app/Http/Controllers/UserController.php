<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $users = User::with('partner', 'role', 'city.department.country')->paginate(10);

        return view('users.index', compact('users'));
    }

    public function edit(User $user)
    {
        $user->load('partner', 'role', 'city.department.country');
        $cities = City::all();

        return view('users.edit', compact('user', 'cities'));
    }
}
