<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
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
        return view('department.index', [
            'pagename' => "หน่วยงาน",
            'departments' => Department::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department.create', [
            'pagename' => "เพิ่มหน่วยงานใหม่",
            'departments' => Department::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Department::create($request->all());
        return redirect()->route('department.index')->with('success3', 'เพิ่มหน่วยงาน "'.$request->dep_name.'" ใหม่แล้ว');

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
    public function edit(Department $department)
    {
        return view('department.edit', [
            'pagename' => "แก้ไขหน่วยงาน",
        ], compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Department::where('id', $request->departmentid)
            ->update([
                'depcode' => $request->depcode,
                'dep_name' => $request->dep_name,
            ]);

        return redirect()->route('department.index')->with('success3', 'ปรับปรุงหน่วยงาน "'.$request->dep_name.'" แล้ว');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Department $department)
    {
        $department->where('id', $request->departmentid)->delete();
        return redirect()->route('department.index')->with('success2', 'หน่วยงานถูกลบแล้ว');
    }
}
