<?php

namespace App\Http\Controllers;

use App\Models\Typefasgrp;
use Illuminate\Http\Request;

class TypefasgrpController extends Controller
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
        return view('typefasgrp.index', [
            'pagename' => "ประเภทครุภัณฑ์",
            'typefasgrps' => Typefasgrp::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('typefasgrp.create', [
            'pagename' => "เพิ่มประเภทครุภัณฑ์ใหม่",
            'typefasgrps' => Typefasgrp::all(),
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
        Typefasgrp::create($request->all());
        return redirect()->route('typefasgrp.index')->with('success3', 'เพิ่มประเภท "'.$request->type_name_fasgrp.'" ใหม่แล้ว');

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
    public function edit(Typefasgrp $typefasgrp)
    {
        return view('typefasgrp.edit', [
            'pagename' => "แก้ไขประเภทครุภัณฑ์",
        ], compact('typefasgrp'));
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
        Typefasgrp::where('id', $request->typefasgrpid)
            ->update([
                'type_name_fasgrp' => $request->type_name_fasgrp,
            ]);

        return redirect()->route('typefasgrp.index')->with('success3', 'ปรับปรุงประเภท "'.$request->type_name_fasgrp.'" แล้ว');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Typefasgrp $typefasgrp)
    {
        $typefasgrp->where('id', $request->typefasgrpid)->delete();
        return redirect()->route('typefasgrp.index')->with('success2', 'ประเภทครุภัณฑ์ถูกลบแล้ว');
    }
}
