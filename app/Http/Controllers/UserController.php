<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Partner;
use App\Models\Role;

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

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $roles = Role::select('name', 'id');
        $cities = City::select('name', 'id')->get();
        $partners = Partner::select('name', 'id')->get();
        return  view('users.create', compact('roles', 'cities', 'partners'));
    }

    public function edit(User $user)
    {
        $user->load('partner', 'role', 'city.department.country');
        $cities = City::all();

        return view('users.edit', compact('user', 'cities'));
    }


    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());

        return redirect()->route('users.index')->withStatus(__('User successfully updated.'));
    }
}
