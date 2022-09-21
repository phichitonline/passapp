<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usertype;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserPasswordRequest;
use Illuminate\Support\Facades\Hash;
use File;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $user = User::select('users.*', 'usertypes.usertype', 'departments.dep_name')
        ->leftJoin('usertypes', 'usertypes.type', '=', 'users.isadmin')
        ->leftJoin('departments', 'departments.depcode', '=', 'users.depcode')
        ->get();

        return view('users.index', [
            'pagename' => "รายชื่อผู้ใช้งาน",
            'users' => $user,
            'usertype' => Usertype::all(),
            'department' => Department::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create', [
            'pagename' => "เพิ่มผู้ใช้งานใหม่",
            'usertype' => Usertype::all(),
            'department' => Department::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request, User $model)
    {
        $model->create($request->merge(['password' => Hash::make($request->get('password'))])->all());
        return redirect()->route('user.index')->with('success3', 'เพิ่มผู้ใช้ใหม่แล้ว');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', [
            'pagename' => "แก้ไขผู้ใช้",
            'usertype' => Usertype::all(),
            'department' => Department::all(),
        ], compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User  $user)
    {
        $user->update(
            $request->all());

        return redirect()->route('user.index')->with('success', 'ปรับปรุงข้อมูลผู้ใช้แล้ว');
    }

    public function password(UserPasswordRequest $request)
    {
        User::where('id', $request->userid)->update(['password' => Hash::make($request->get('password'))]);

        return redirect()->route('user.index')->with('success','เปลี่ยนรหัสผ่านของคุณ '.$request->name.' สำเร็จแล้ว');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        if(File::exists(public_path('images/user/'.$request->avatar_del.''))){
            File::delete(public_path('images/user/'.$request->avatar_del.''));
        }

        $user->delete();

        return redirect()->route('user.index')->with('success2', 'ผู้ใช้ถูกลบแล้ว');
    }
}
