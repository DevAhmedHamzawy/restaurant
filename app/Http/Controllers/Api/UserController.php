<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Mail\sendOtp;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Validator;

class UserController extends Controller
{
    public $successStatus = 200;
    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $token =  $user->createToken('MyLaravelApp')->accessToken;
            $user = $user;
            return response()->json(['message' => 'login successfully', 'status' => 200, 'token' => $token, 'user' => $user], $this->successStatus);
        }
        else{
            return response()->json(['message' => 'email or password is not correct' , 'status' => 401], 401);
        }
    }

    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email:rfc,filter|unique:users',
            'telephone' => 'required|min:11|max:11',
            //'password' => 'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'something wrong please try again', 'status' => 401 ,'errors' => $validator->errors()], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);


        // temp it will be 1234
        // $input['otp'] = rand(0000,9999);
        $input['otp'] = 1234;

        $user = User::create($input);
        $user->profile()->create();
        $token =  $user->createToken('MyLaravelApp')->accessToken;
        $user =  $user;
        return response()->json(['message' => 'registered successfully', 'status' => 200, 'token' => $token, 'user' => $user], $this->successStatus);
    }

    /**
     * check otp to verify user
     */
    public function checkOtp(Request $request)
    {
        $user = Auth::user();
        if($request->otp == $user->otp) {
            $user->email_verified_at = Carbon::now();
            $user->update();
            return response()->json(['message' => 'user verified successfully', 'status' => 200], 200);
        }else{
            return response()->json(['message' => 'otp is wrong', 'status' => 401], 401);
        }

    }

    /**
     * check email exists in system
     */
    public function checkEmail(Request $request)
    {
        $user = User::whereEmail($request->email)->first();
        if($user !== null) {
            $user->otp = rand(0000,9999);
            if($user->otp < 1000) $user->otp = rand(0000,9999);

            $user->update();

            $details = [
                'title' => 'otp is',
                'body' => $user->otp
            ];

            Mail::to($user->email)->send(new sendOtp($details));

            return response()->json(['message' => 'Otp Verification Code Has Been Sent To Your Email , Check Your Email', 'status' => 200, 'email' => $request->email]);
         }else{
            return response()->json(['message' => 'email doesn\'t exist', 'status' => 404]);
         }
    }

    /**
     * Resend OTP
     */
    public function resendOtp(Request $request)
    {
        return $this->checkEmail($request);
    }

    public function checkOtpForEmail(Request $request)
    {
        $user = Auth::user();
        return $request->otp == $user->otp ? response()->json(['message' => 'otp verified successfully', 'status' => 200], 200):  response()->json(['message' => 'otp verified failed', 'status' => 401], 401);
    }


    public function resetPassword(Request $request)
    {
        $user = Auth::user();
        $validator = Validator::make($request->all(), ['password' => 'required|min:8|max:25|confirmed']);

        if ($validator->fails()) {
            return response()->json(['message' => 'something wrong please try again', 'status' => 401 ,'errors' => $validator->errors()], 401);
        }else{
            $user->update(['password' => bcrypt($request->password)]);
            return response()->json(['message' => 'password changed successfully', 'status' => 200], 200);
        }
    }

    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function userDetails()
    {
        $user = Auth::user();
        return response()->json(['message' => 'user retrieved successfully', 'status' => 200 , 'user' => new UserResource($user)], $this-> successStatus);
    }

    public function logout()
    {
        $user = Auth::user()->token();
        $user->revoke();

        return response()->json(['message' => 'user LoggedOut successfully', 'status' => 200], $this->successStatus);
    }
}
