<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Typefasgrp;
use Illuminate\Http\Request;

class ReportController extends Controller
{
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

        return view('report.index', [
            'pagename' => "รายงาน",
            'department' => Department::all(),
            'typefasgrp' => Typefasgrp::all(),
            'keyword' => $keyword,
            'selecttype' => $request->selecttype,
            'status' => $statusw1,
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
