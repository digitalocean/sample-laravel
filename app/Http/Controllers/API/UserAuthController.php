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
use Carbon\Carbon;

use function PHPUnit\Framework\isEmpty;

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
        
   
        // $input = $request->all();
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('api_token', ['api-access'], Carbon::now()->addMinutes(config('sanctum.ac_expiration')))->plainTextToken;
        $refreshToken = $user->createToken('refresh_token', ['token-refresh'], Carbon::now()->addMinutes(config('sanctum.rt_expiration')))->plainTextToken;
        
        Account::create([
            'Name' => $request->name,
            'user_id' => $user->id,
        ]);
        $success['token'] =  $token;
        $success['name'] =  $user->name;
        $success['refresh_token'] = $refreshToken;
   
        return $this->sendResponse($success, 'User registered successfully.');
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
        $account = Account::where('user_id', $user->id)->firstOrFail();

        // $minus = Carbon::now()->subDays(13); 
        // $expire = Carbon::now()->subDays(1); 
        // // check if token is valid
        
        // $authUser = auth()->user();
        // $j = $authUser->tokens->whereNotNull()->last();
        // //$N = $authUser->tokens->last()->whereNotNull('expires_at')->get();
        // //$b = $authUser->tokens->last()->whereBetween('expires_at', [$minus, $expire]);
        // if( !empty($j) && $authUser->tokens->last()->whereBetween('expires_at', [$minus, $expire]) ) {
            
        //         $answer = 'hello';
        
        // }  else {

        //     $answer = $user->createToken('api_token', ['api-access'], Carbon::now()->addMinutes(config('sanctum.ac_expiration')))->plainTextToken;
        // }

            
        $answer = $user->createToken('api_token', ['api-access'], Carbon::now()->addMinutes(config('sanctum.ac_expiration')))->plainTextToken;
        
       
        
        //$refreshToken = $user->createToken('refresh_token', ['token-refresh'], Carbon::now()->addMinutes(config('sanctum.rt_expiration')))->plainTextToken;
        $output = [
            'id' => $account->id,
            'Name' => $account->name,
            'WalletAmount' => $account->WalletAmout,
            'token' => $answer,
            // 'user' => $user,
            //'refreshToken' => $refreshToken,            
        ];

        return $this->sendResponse($output, 'User logined successfully.');
    }

    public function logout(){
        auth()->user()->api_token->delete();
    
        return response()->json([
          "message"=>"logged out"
        ]);
    }

    public function refreshToken(Request $request) {
            $token = $request->user()->createToken('api_token', ['api-access'], Carbon::now()->addMinutes(config('sanctum.ac_expiration')))->plainTextToken;
            $refreshToken = $request->user->createToken('refresh_token', ['api:token-refresh'], Carbon::now()->addMinutes(config('sanctum.rt_expiration')))->plainTextToken;
            $success['token'] =  $token;
            $success['refresh_token'] = $refreshToken;
            return $this->sendResponse($success, 'User token refreshed.');
    }

    public function getCreateToken() {
        $token = Auth()->user->createToken('api_token', ['api-access'], Carbon::now()->addMinutes(config('sanctum.ac_expiration')))->plainTextToken;
        return $token;
    }

}
