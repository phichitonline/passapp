<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
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
    public function index()
    {
        return view('setting.edit', [
            'pagename' => "ตั้งค่าระบบ",
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Setting $setting)
    {
        return view('setting.edit', [
            'pagename' => "ตั้งค่าระบบ",
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        $request->validate([
            's_no' => 'required',
            's_name' => 'required',
            's_headname' => 'required',
        ]);

        if (isset($request->module1)) {
            $module1 = $request->module1;
        } else {
            $module1 = "0";
        }
        if (isset($request->module2)) {
            $module2 = $request->module2;
        } else {
            $module2 = "0";
        }
        if (isset($request->module3)) {
            $module3 = $request->module3;
        } else {
            $module3 = "0";
        }
        if (isset($request->module4)) {
            $module4 = $request->module4;
        } else {
            $module4 = "0";
        }
        if (isset($request->module5)) {
            $module5 = $request->module5;
        } else {
            $module5 = "0";
        }

        $request->merge(['module1' => $module1]);
        $request->merge(['module2' => $module2]);
        $request->merge(['module3' => $module3]);
        $request->merge(['module4' => $module4]);
        $request->merge(['module5' => $module5]);
        $setting->update($request->all());

        return redirect()->route('setting.index')
                         ->with('success', 'แก้ไขข้อมูลเรียบร้อยแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
