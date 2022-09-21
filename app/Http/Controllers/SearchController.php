<?php

namespace App\Http\Controllers;

use App\Models\Durable;
use App\Models\Transfer;
use App\Models\Repair;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (isset($request->keyword)) {
            $keyword = $request->keyword;
        } else {
            $keyword = "?????";
        }

        $durable = DB::connection('mysql')->select('
        SELECT d.*,p.dep_name,t.type_name_fasgrp
        FROM durables d
        LEFT JOIN departments p ON d.depcode = p.depcode
        LEFT JOIN typefasgrps t ON d.fasgrp = t.id
        WHERE CONCAT(d.id," ",d.pass_number," ",d.pass_name) LIKE "%'.$keyword.'%"
        ');

        return view('durable.index', [
        'pagename' => "ค้นหา",
        'durable' => $durable,
        ]);
    }

    public function didsearch(Request $request)
    {
        return view('search.search', [
            'pagename' => "ค้นหา",
            ]);
    }

    public function durablesearch(Request $request)
    {
        return redirect()->route('search.show',$request->did);
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

    public function printpreview(Request $request)
    {
        $durable = Durable::select('durables.*', 'departments.dep_name','typemoneys.money_name','typefasgrps.type_name_fasgrp')
        ->leftJoin('departments', 'durables.depcode', '=', 'departments.depcode')
        ->leftJoin('typemoneys', 'durables.str1', '=', 'typemoneys.id')
        ->leftJoin('typefasgrps', 'durables.fasgrp', '=', 'typefasgrps.id')
        ->where('durables.id', $_GET['id'])
        ->get();

        return view('durable.print', [
            'pagename' => "พิมพ์สติกเกอร์",
            'durable' => $durable,
        ]);
    }

    public function printallpreview(Request $request)
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

        if ($request->status == 1) {
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

        return view('durable.printall', [
            'pagename' => "พิมพ์สติกเกอร์",
            'durable' => $durable,
        ]);
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
