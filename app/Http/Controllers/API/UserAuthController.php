<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Account;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends BaseController {
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)  {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        
        // if($request->validate->fails()){
        //     return $this->sendError('Validation Error.', $request->validate->errors());       
        // }
   
        // $input = $request->all();
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('api_token')->plainTextToken;
        
        $Acct = Account::create([
            'Name' => $request->name,
            'user_id' => $user->id,
        ]);
        $success['token'] =  $token;
        $success['name'] =  $user->name;
   
        return $this->sendResponse($success, 'User register successfully.');
    }
   
    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request) {

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }
        $user = User::where('email', $request['email'])->firstOrFail();
        $token = $user->createToken('api_token')->plainTextToken;
        $success['token'] =  $token; 
        $success['name'] =  $user->name;
        return $this->sendResponse($success, 'User login successfully.');
    }

    public function logout(){
        auth()->user()->api_token->delete();
    
        return response()->json([
          "message"=>"logged out"
        ]);
    }
}
