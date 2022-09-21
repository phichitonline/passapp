<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usertype;
use Illuminate\Http\Request;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use File;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('profile.edit', [
            'usertype' => Usertype::all(),
        ])->with('user'. auth()->user());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (isset($request->avatarimg)) {
            if(File::exists(public_path('images/user/'.$request->avatarimg_old.''))){
                File::delete(public_path('images/user/'.$request->avatarimg_old.''));
            }
            $avatarimg = $request->file('avatarimg');
            $avatar_name = $request->id."_".time()."_avatar_".$avatarimg->getClientOriginalName();
            $destinationPath = public_path('/images/user');
            $avatarimg->move($destinationPath, $avatar_name);
            $request->merge(['avatar' => $avatar_name]);
        }

        auth()->user()->update($request->all());
        return redirect()->route('profile')
        ->with('success','ปรับปรุงข้อมูล '.$request->name.' สำเร็จ');
    }

    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);
        return redirect()->route('profile')
        ->with('passsuccess','เปลี่ยนรหัสผ่านสำเร็จ');
    }

}
