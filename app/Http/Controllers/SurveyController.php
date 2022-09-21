<?php

namespace App\Http\Controllers;

use App\Models\Durable;
use App\Models\Department;
use App\Models\Typefasgrp;
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
        //
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
        //
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
