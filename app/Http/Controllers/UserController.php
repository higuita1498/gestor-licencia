<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Partner;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

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
        $users = User::with('partner', 'role', 'city.department.country')->latest()->paginate(10);

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
        $partners = Partner::select('PartnerName', 'id')->get();
        return  view('users.create', compact('roles', 'cities', 'partners'));
    }

    /**
     * Store a new user
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreUserRequest $request)
    {
        $user = new User();
        $user->UserName = $request->UserName;
        $user->password = bcrypt($request->password);
        $user->partner_id = $request->partner_id;
        $user->city_id = $request->city_id;
        $user->role_id = $request->role_id;
        $user->UserContactNumber = $request->UserContactNumber;
        $user->save();

        return redirect()->route('users.index')->withStatus(__('Usuario creado con éxito.'));
    }

    public function edit(User $user)
    {
        $user->load('partner', 'role', 'city.department.country');
        $cities = City::select('name', 'id')->get();
        $partners = Partner::select('PartnerName', 'id')->get();

        return view('users.edit', compact('user', 'cities', 'partners'));
    }


    public function update(UpdateUserRequest $request, User $user)
    {
        try {
            DB::beginTransaction();
            $user->update($request->all());

            if ($request->has('password')) {
                $user->password = bcrypt($request->password);
            }

            $user->save();
            DB::commit();

            return redirect()->route('users.index')->withStatus(__('User successfully updated.'));
        } catch (\Throwable $th) {
            DB::rollback();
            \Log::error($th->getMessage());
            return back()
                ->withInput()
                ->withErrors($th->getMessage());
        }
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->withStatus(__('User successfully deleted.'));
    }
}
