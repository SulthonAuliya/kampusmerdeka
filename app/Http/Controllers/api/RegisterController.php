<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\api\BaseController as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegisterController extends BaseController
{
    public function Register(Request $request){
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'email'     => 'required|email',
            'password'  => 'required',
            'c_password'=> 'required|same:password'
        ]);

        if($validator->fails()){
            return $this->SendError('Validation Error', $validator->errors());
        }

        $input              = $request->all();
        $input['password']  = bcrypt($input['password']);
        $user               = User::create($input);
        $success['token']   = $user->createToken('MyApp')->plainTextToken;
        $success['name']    = $user->name;

        return $this->SendResponse($success, 'User registered successfuly.');
    }

    public function Login(request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user               = Auth::user();
            $success['token']   = $user->createToken('MyApp')->plainTextToken;
            $success['name']    = $user->name;

            return $this->SendResponse($success, 'User loged in successfuly.');
        }else{
            return $this->SendError('Unauthorized', ['error' => 'Unauthorized']);
        }
    }
}
