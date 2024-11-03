<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Upload\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), ['name' => 'required', 'email' => 'required|email', 'telephone' => 'required|numeric', 'password' => 'required']);
        if($validator->fails()){
            toastr()->error('Check Errors In Add User Form');

            return redirect()->back()->withErrors($validator);
        }

        $request->merge(['password' => bcrypt($request->password), 'avatar' => Upload::uploadImage($request->main_avatar, 'users' , $request->name)]);

        //dd($request->all());

        $user = User::create($request->only('name', 'email', 'telephone' ,'password'));

        $user->profile()->create($request->only('telephone','avatar'));

        toastr()->success('User Added Successfully');

        return redirect()->route('users.index');
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', ['user' => $user]);
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
        $validator = Validator::make($request->all(), ['name' => 'required', 'email' => 'required|email', 'telephone' => 'required|numeric']);
        if($validator->fails()){
            toastr()->error('Check Errors In Edit User Form');

            return redirect()->back()->withErrors($validator);
        }


        if ($request->has('password')) {
            $request->merge(['password' => bcrypt($request->password)]);
        }

        if ($request->has('main_avatar')) {
            $request->merge(['avatar' => Upload::uploadImage($request->main_avatar, 'users' , $request->name)]);
        }

        $user->update($request->only('name', 'email', 'telephone' ,'password'));

        $user->profile()->update($request->only('telephone','avatar'));

        toastr()->success('User Updated Successfully');

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        toastr()->success('User Deleted Successfully');

        return redirect()->route('users.index');
    }

    public function setStatus(User $user)
    {
        if($user->email_verified_at == null)
        {
            $user->email_verified_at = now();
        }else {
            $user->email_verified_at = null;
        }

        $user->update();

        return redirect()->back();
    }
}
