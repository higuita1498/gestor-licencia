<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\UserCollection;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Licence;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new UserCollection(User::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $errors = [];

        $validator = Validator::make($request->all(), [
            'UserID' => 'required|unique:users|max:255',
            'UserName' => 'required|unique:users|max:255',
            'password' => 'required',
            'UserContactNumber' => 'required',
            'licence' => 'required'
        ]);
 
        if ($validator->fails()) {
            foreach($validator->errors()->all() as $error){
                $errors[] = $error;
            }
        }
       
        $user = new User();
        $user->UserID = $request->UserID;
        $user->UserName = $request->UserName;
        $user->password = bcrypt($request->password);
        $user->partner_id = $request->partner_id;
        $user->city_id = $request->city_id;
        $user->UserContactNumber = $request->UserContactNumber;

        $licence = Licence::where('LicenseKey', $request->licence)->whereNull('user_id')->first();

        if($licence && $validator->fails() == false){
            if($licence->ExpirationDate == null || (now()->diffInSeconds($licence->ExpirationDate, false) > 0)){
                    $user->save();
                    $licence->automaticActivation($user);
            }else{
                $errors[] = 'La licencia ya expiro';
            }

        }else{
            $errors[] = 'La licencia no existe o ya esta en uso';
        }

    
        if(count($errors) > 0){
            return response()->json(['success' => false,
                                    'message' => 'No fue posible registrar el usuario',
                                    'data' => [],
                                    'errors' => $errors,
                                    'type' => 'array',
            ]);
        }

        
        return response()->json(['success' => true,
                                 'message' => 'Usuario creado con éxito.',
                                 'data' => $user,
                                 'type' => 'object'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
