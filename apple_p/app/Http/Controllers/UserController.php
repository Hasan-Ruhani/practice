<?php

namespace App\Http\Controllers;

use App\Helper\JWTToken;
use App\Helper\ResponseHelper;
use App\Mail\OTPEmail;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function UserLogin(Request $request): JsonResponse{
        try{
            $UserEmail = $request -> UserEmail;                              // input from base url in route
            $OTP = rand(100000, 999999);
            $details = ['code' => $OTP];
            Mail::to($UserEmail) -> send(new OTPEmail($details));
            User::updateOrCreate(['email' => $UserEmail], ['email' => $UserEmail, 'otp' => $OTP]);
            return ResponseHelper::Out('success', 'A 6 digit OTP code has been send your email', 200);
        }
        catch(Exception $e){
            return ResponseHelper::Out('fail', $e, 200);
        }
    }

    public function VerifyLogin(Request $request): JsonResponse{
        $userEmail = $request -> UserEmail;
        $OTP = $request -> OTP;

        $verification = User::where('email', $userEmail) -> where('otp', $OTP) -> first();

        if($verification){
            User::where('email', $userEmail) -> where('otp', $OTP) -> update(['OTP' => '0']);
            $token = JWTToken::CreateToken($userEmail, $verification -> id);   // set email and id in token names
            return ResponseHelper::Out('success', "", 200) -> cookie('token', $token, 60*60*30);    // set the $token in browser cookie this issuer name token
        }
        else{
            return ResponseHelper::Out('fail', null, 401);
        }
    }
    
    function UserLogout(){
        return redirect('/userLoinPage') -> cookie('token'. '', -1);
    }
}
