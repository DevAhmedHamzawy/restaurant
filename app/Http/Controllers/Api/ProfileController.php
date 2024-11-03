<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use App\Upload\Upload;
use Illuminate\Http\Request;
use Validator;

class ProfileController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email:rfc,filter',
            'telephone' => 'required|min:11|max:11',
            'avatar_image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
            'password' => 'sometimes|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'something wrong please try again', 'status' => 401 ,'errors' => $validator->errors()], 401);
        }

        $user = User::find(auth()->user()->id);

        if ($request->has('password') && $request->password !== null) {
            $request->merge(['password' => bcrypt($request->password)]);
        }

        if ($request->email !== $user->email) {
            $request->merge(['email' => $request->email]);
        }

        if($request->has('avatar')){
            $request->merge(['avatar' => Upload::uploadImage($request->avatar_image, 'users' , $request->name)]);
        }

        $user->update($request->except('telephone', 'avatar'));

        $user->profile()->update($request->only('telephone','avatar'));

        return response()->json(['message' => 'user and profile update successfully', 'status' => 200], 200);
    }
}
