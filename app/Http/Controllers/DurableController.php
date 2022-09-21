<?php

namespace App\Http\Controllers;

use App\Models\Durable;
use App\Models\Typefasgrp;
use App\Models\Typemoney;
use App\Models\Department;
use App\Models\Transfer;
use App\Models\Repair;
use Illuminate\Http\Request;
use File;

class DurableController extends Controller
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
        $durable = Durable::select('durables.*', 'departments.dep_name','typemoneys.money_name','typefasgrps.type_name_fasgrp')
        ->leftJoin('departments', 'durables.depcode', '=', 'departments.depcode')
        ->leftJoin('typemoneys', 'durables.str1', '=', 'typemoneys.id')
        ->leftJoin('typefasgrps', 'durables.fasgrp', '=', 'typefasgrps.id')
        ->where([
                ['durables.status','<>','9'],
                ['durables.status','<>','4']
            ])
        ->get();

        return view('durable.index', [
            'pagename' => "ทะเบียนครุภัณฑ์",
            'durable' => $durable,
        ]);
    }

    public function index9()
    {
        $durable = Durable::select('durables.*', 'departments.dep_name','typemoneys.money_name','typefasgrps.type_name_fasgrp')
        ->leftJoin('departments', 'durables.depcode', '=', 'departments.depcode')
        ->leftJoin('typemoneys', 'durables.str1', '=', 'typemoneys.id')
        ->leftJoin('typefasgrps', 'durables.fasgrp', '=', 'typefasgrps.id')
        ->where('durables.status','9')
        ->get();

        return view('durable.index9', [
            'pagename' => "ครุภัณฑ์จำหน่ายแล้ว",
            'durable' => $durable,
        ]);
    }

    public function index4()
    {
        $durable = Durable::select('durables.*', 'departments.dep_name','typemoneys.money_name','typefasgrps.type_name_fasgrp')
        ->leftJoin('departments', 'durables.depcode', '=', 'departments.depcode')
        ->leftJoin('typemoneys', 'durables.str1', '=', 'typemoneys.id')
        ->leftJoin('typefasgrps', 'durables.fasgrp', '=', 'typefasgrps.id')
        ->where('durables.status','4')
        ->get();

        return view('durable.index9', [
            'pagename' => "ครุภัณฑ์ขอจำหน่าย",
            'durable' => $durable,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('durable.create', [
            'pagename' => "เพิ่มครุภัณฑ์ใหม่",
            'department' => Department::all(),
            'typefasgrp' => Typefasgrp::all(),
            'typemoney' => Typemoney::all(),
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
        $request->validate([
            'pass_number' => 'required',
            'pass_name' => 'required',
            'fasgrp' => 'required',
            'str_date' => 'required',
            'depcode' => 'required',
            'pass_price' => 'required',
        ]);

        if (isset($request->image)) {
            $image1 = $request->file('image');
            $file_name1 = $request->id."_".time()."_1_".$image1->getClientOriginalName();
            $destinationPath1 = public_path('/images/duraimg');
            $image1->move($destinationPath1, $file_name1);
            $request->merge(['image_filename' => $file_name1]);
        }
        if (isset($request->image2)) {
            $image2 = $request->file('image2');
            $file_name2 = $request->id."_".time()."_2_".$image2->getClientOriginalName();
            $destinationPath2 = public_path('/images/duraimg');
            $image2->move($destinationPath2, $file_name2);
            $request->merge(['image_filename2' => $file_name2]);
        }
        if (isset($request->image3)) {
            $image3 = $request->file('image3');
            $file_name3 = $request->id."_".time()."_3_".$image3->getClientOriginalName();
            $destinationPath3 = public_path('/images/duraimg');
            $image3->move($destinationPath3, $file_name3);
            $request->merge(['image_filename3' => $file_name3]);
        }
        if (isset($request->manual_file)) {
            $manual_file = $request->file('manual_file');
            $file_name4 = $request->id."_".time()."_manual_".$manual_file->getClientOriginalName();
            $destinationPath4 = public_path('/manual');
            $manual_file->move($destinationPath4, $file_name4);
            $request->merge(['manual_file1' => $file_name4]);
        }

        Durable::create($request->all());

        return redirect()->route('durable.index')
                         ->with('success', 'เพิ่มข้อมูลเรียบร้อยแล้ว');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $durable = Durable::select('durables.*', 'departments.dep_name','typemoneys.money_name','typefasgrps.type_name_fasgrp')
        ->leftJoin('departments', 'durables.depcode', '=', 'departments.depcode')
        ->leftJoin('typemoneys', 'durables.str1', '=', 'typemoneys.id')
        ->leftJoin('typefasgrps', 'durables.fasgrp', '=', 'typefasgrps.id')
        ->where('durables.id', $id)
        ->get();

        $transfers = Transfer::select('transfers.*', 'departments.dep_name', 'departments2.dep_name AS dep_name_old','users.name AS username')
        ->leftJoin('departments', 'transfers.depcode', '=', 'departments.depcode')
        ->leftJoin('departments AS departments2', 'transfers.depcodeold', '=', 'departments2.depcode')
        ->leftJoin('users', 'transfers.userid', '=', 'users.id')
        ->where('transfers.durableid', $id)
        ->orderby('transfers.id', 'desc')
        ->get();
        $tranfer_count = Transfer::where('durableid', $id)->count();

        $repairs = Repair::select('repairs.*')
        ->where('repairs.durable_id', $id)
        ->orderby('repairs.id', 'desc')
        ->get();
        $repair_count = Repair::where('durable_id', $id)->count();

        return view('durable.detail', [
            'pagename' => "ข้อมูลครุภัณฑ์",
            'durable' => $durable,
            'transfers' => $transfers,
            'tranfer_count' => $tranfer_count,
            'repairs' => $repairs,
            'repair_count' => $repair_count,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Durable $durable)
    {
        return view('durable.edit', [
            'pagename' => "แก้ไขข้อมูลครุภัณฑ์",
            'department' => Department::all(),
            'typefasgrp' => Typefasgrp::all(),
            'typemoney' => Typemoney::all(),
        ],compact('durable'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Durable $durable)
    {
        if (isset($request->image)) {
            $image1 = $request->file('image');
            $file_name1 = $request->id."_".time()."_1_".$image1->getClientOriginalName();
            $destinationPath1 = public_path('/images/duraimg');
            $image1->move($destinationPath1, $file_name1);
            $request->merge(['image_filename' => $file_name1]);
        }
        if (isset($request->image2)) {
            $image2 = $request->file('image2');
            $file_name2 = $request->id."_".time()."_2_".$image2->getClientOriginalName();
            $destinationPath2 = public_path('/images/duraimg');
            $image2->move($destinationPath2, $file_name2);
            $request->merge(['image_filename2' => $file_name2]);
        }
        if (isset($request->image3)) {
            $image3 = $request->file('image3');
            $file_name3 = $request->id."_".time()."_3_".$image3->getClientOriginalName();
            $destinationPath3 = public_path('/images/duraimg');
            $image3->move($destinationPath3, $file_name3);
            $request->merge(['image_filename3' => $file_name3]);
        }
        if (isset($request->manual_file)) {
            $manual_file = $request->file('manual_file');
            $file_name4 = $request->id."_".time()."_manual_".$manual_file->getClientOriginalName();
            $destinationPath4 = public_path('/manual');
            $manual_file->move($destinationPath4, $file_name4);
            $request->merge(['manual_file1' => $file_name4]);
        }

        if ($request->imgdel1 == "Y") {
            $request->merge(['image_filename' => NULL]);
            if(File::exists(public_path('images/duraimg/'.$request->image_del.''))){
                File::delete(public_path('images/duraimg/'.$request->image_del.''));
            }
        }
        if ($request->imgdel2 == "Y") {
            $request->merge(['image_filename2' => NULL]);
            if(File::exists(public_path('images/duraimg/'.$request->image2_del.''))){
                File::delete(public_path('images/duraimg/'.$request->image2_del.''));
            }
        }
        if ($request->imgdel3 == "Y") {
            $request->merge(['image_filename3' => NULL]);
            if(File::exists(public_path('images/duraimg/'.$request->image3_del.''))){
                File::delete(public_path('images/duraimg/'.$request->image3_del.''));
            }
        }
        if ($request->mandel1 == "Y") {
            $request->merge(['manual_file1' => NULL]);
            if(File::exists(public_path('manual/'.$request->manual_file_del.''))){
                File::delete(public_path('manual/'.$request->manual_file_del.''));
            }
        }

        if ($request->depcode != $request->depcodeold) {
            Transfer::create($request->all());
        }


        $durable->update($request->all());

        // return redirect()->route('durable.show', $request->id)
        return redirect()->route('durable.index')
                        ->with('success','ปรับปรุงข้อมูล '.$request->id.' สำเร็จ');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Durable $durable)
    {
        if(File::exists(public_path('images/duraimg/'.$request->image_del.''))){
            File::delete(public_path('images/duraimg/'.$request->image_del.''));
        }
        if(File::exists(public_path('images/duraimg/'.$request->image2_del.''))){
            File::delete(public_path('images/duraimg/'.$request->image2_del.''));
        }
        if(File::exists(public_path('images/duraimg/'.$request->image3_del.''))){
            File::delete(public_path('images/duraimg/'.$request->image3_del.''));
        }
        if(File::exists(public_path('manual/'.$request->manual_file_del.''))){
            File::delete(public_path('manual/'.$request->manual_file_del.''));
        }
        $durable->delete();
        return redirect()->route('durable.index')
                         ->with('deletesuccess', 'ลบข้อมูล ID:'.$request->id.' เรียบร้อยแล้ว');
    }
}
