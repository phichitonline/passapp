<?php

namespace App\Http\Controllers;

use File;
use App\Models\Survey;
use App\Models\Durable;
use App\Models\Setting;
use App\Models\Typeget;
use App\Models\Transfer;
use App\Models\Typemoney;
use App\Models\Department;
use App\Models\Durable_log;
use App\Models\Typefasgrp;
use App\Models\Typestatus;
use Illuminate\Http\Request;

class SurveyController extends Controller
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
    public function index(Request $request)
    {
        if ($request->selecttype == "typefasgrp") {
            $wherefield = "durables.fasgrp";
        } else {
            $wherefield = "durables.depcode";
        }

        if (isset($request->keyword)) {
            $keyword = $request->keyword;
        } else {
            $keyword = "?????";
        }

        if (isset($request->status)) {
            $statusw1 = 1;
            $statusw2 = "=";
        } else {
            $statusw1 = 9;
            $statusw2 = "<>";
        }

        $durable = Durable::select('durables.*', 'departments.dep_name','typemoneys.money_name','typefasgrps.type_name_fasgrp')
        ->leftJoin('departments', 'durables.depcode', '=', 'departments.depcode')
        ->leftJoin('typemoneys', 'durables.str1', '=', 'typemoneys.id')
        ->leftJoin('typefasgrps', 'durables.fasgrp', '=', 'typefasgrps.id')
        ->where([
                    ['durables.status',$statusw2,$statusw1],
                    [$wherefield,$keyword]
                ])
        ->get();

        return view('survey.index', [
            'pagename' => "สำรวจครุภัณฑ์",
            'durable' => $durable,
            'department' => Department::all(),
            'typefasgrp' => Typefasgrp::all(),
            'keyword' => $keyword,
            'selecttype' => $request->selecttype,
            'status' => $statusw1,
        ]);
    }

    public function search(Request $request)
    {
        if (isset($request->keyword)) {
            $keyword = $request->keyword;
        } else {
            $keyword = "?????";
        }

        $durable = Durable::select('durables.*', 'departments.dep_name','typemoneys.money_name','typefasgrps.type_name_fasgrp')
        ->leftJoin('departments', 'durables.depcode', '=', 'departments.depcode')
        ->leftJoin('typemoneys', 'durables.str1', '=', 'typemoneys.id')
        ->leftJoin('typefasgrps', 'durables.fasgrp', '=', 'typefasgrps.id')
        ->where([
                    ['durables.status','<>','9'],
                    ['durables.depcode','LIKE', '%'.$keyword.'%']
                ])
        ->get();

        return view('survey.index', [
            'pagename' => "สำรวจครุภัณฑ์",
            'durable' => $durable,
            'department' => Department::all(),
            'keyword' => $keyword,
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
    public function edit($id)
    {
        $durable = Durable::select('durables.*')
            ->where('durables.id', $id)
            ->get();

        return view('survey.edit', [
            'pagename' => "สำรวจข้อมูลครุภัณฑ์",
            'department' => Department::all(),
            'typefasgrp' => Typefasgrp::all(),
            'typemoney' => Typemoney::all(),
            'typeget' => Typeget::all(),
            'typestatus' => Typestatus::all(),
            'durable' => $durable,
        ]);
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
        if (isset($request->image)) {
            $image1 = $request->file('image');
            $file_name1 = $request->id."_".time()."_1_".$image1->getClientOriginalName();
            $destinationPath1 = public_path('/images/duraimg');
            $image1->move($destinationPath1, $file_name1);
            $img1 = $file_name1;
        } else {
            $img1 = $request->imageold;
        }
        if (isset($request->image2)) {
            $image2 = $request->file('image2');
            $file_name2 = $request->id."_".time()."_2_".$image2->getClientOriginalName();
            $destinationPath2 = public_path('/images/duraimg');
            $image2->move($destinationPath2, $file_name2);
            $img2 = $file_name2;
        } else {
            $img2 = $request->image2old;
        }
        if (isset($request->image3)) {
            $image3 = $request->file('image3');
            $file_name3 = $request->id."_".time()."_3_".$image3->getClientOriginalName();
            $destinationPath3 = public_path('/images/duraimg');
            $image3->move($destinationPath3, $file_name3);
            $img3 = $file_name3;
        } else {
            $img3 = $request->image3old;
        }
        if (isset($request->manual_file)) {
            $manual_file = $request->file('manual_file');
            $file_name4 = $request->id."_".time()."_manual_".$manual_file->getClientOriginalName();
            $destinationPath4 = public_path('/manual');
            $manual_file->move($destinationPath4, $file_name4);
            $manual_file1 = $file_name4;
        } else {
            $manual_file1 = $request->manual_fileold;
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

        switch ($request->status) {
            case 1:
                $durable_status = " (ยังใช้งานอยู่)";
                break;
            case 2:
                $durable_status = " (ระหว่างการสำรวจ)";
                break;
            case 3:
                $durable_status = " (ชำรุด)";
                break;
            case 4:
                $durable_status = " (ขอจำหน่าย)";
                break;
            case 9:
                $durable_status = " (จำหน่ายแล้ว)";
                break;
            default:
                $durable_status = "";
        }

        $request->merge(['memo_survey' => $request->memo_survey.$durable_status]);
        Survey::create($request->all());


        $request->merge(['method' => "Survey"]);
        Durable_log::create($request->all());

        Durable::where('id', $request->id)
        ->update([
            'image_filename' => $img1,
            'image_filename2' => $img2,
            'image_filename3' => $img3,
            'manual_file1' => $manual_file1,
            'manual_link' => $request->manual_link,
            'pass_number' => $request->pass_number,
            'depcode' => $request->depcode,
            'locationgps' => $request->locationgps,
            'status' => $request->status,
            'memo_text' => $request->memo_text,
        ]);

        return redirect()->route('durable.index')
                        ->with('success','ปรับปรุงข้อมูลสำรวจ '.$request->id.' สำเร็จ');

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
