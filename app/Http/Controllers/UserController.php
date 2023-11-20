<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class UserController extends Controller
{
    //
    public function Userindex(){
        $users = User::all();
        return UserResource::collection($users);
    }

    public function UserCreate(Request $request){
        $request->validate([
            "name"=> "required|string",
            "email"=> "required|string|unique:users",
            "password"=> "required|string",
            
        ]);
        $user = new User([
            "name"=> $request->name,
            "email"=> $request->email,
            "password"=> Hash::make($request->password),
        ]);
        $user->save();
        return response()->json(['message'=>'User has been registered'],200);

    }

    public function UserUpdate(Request $request){
        $request->validate([]);
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return response()->json(['message'=> 'user updated successfully'],200);
    }
    public function UserDestroy(Request $request){
        $request->validate(["id"=> "required"]);
        $user = User::findOrFail($request->id);
        $user->delete();
        return response()->json(['message'=> 'User deleted'],200);
    }

    public function UserLogin(Request $request){
        $request->validate([
            "email"=> "required|string",
            "password"=> "required|string",
        ]);
        $user = User::where('email', $request->email)->first();
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        $token= $user->createToken("personal access token")->plainTextToken;

        return response()->json(['message'=> ['access_token'=>$token]],200);
    }

    public function UserLoginVerify(Request $request){
        $request->validate([
            "value"=> "required|string",
        ]);
        return response()->json(["message"=> ["value"=> $request->value]],200);
    }

}
