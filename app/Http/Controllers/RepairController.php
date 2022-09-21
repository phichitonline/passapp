<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repair;
use App\Models\Durable;
use Illuminate\Support\Facades\DB;

class RepairController extends Controller
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
        $repairs = Repair::select('repairs.*','durables.image_filename')
        ->leftJoin('durables', 'repairs.durable_id', '=', 'durables.id')
        // ->where('repairs.repair_status', 1)
        ->orderby('repairs.id', 'desc')
        ->get();
        $repair_count = Repair::where('repair_status', 1)->count();

        return view('repair.index', [
            'pagename' => "รายการส่งซ่อม",
            'repairs' => $repairs,
            'repair_count' => $repair_count,
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
        $check_repair_status = DB::connection('mysql')->select('
            SELECT * FROM repairs
            WHERE id = (SELECT MAX(id) FROM repairs WHERE durable_id = '.$request->durable_id.')
            ');
        foreach($check_repair_status as $data) {
            $r_status = $data->repair_status;
            $r_date = $data->repair_date;
            $r_reciev_date = $data->repair_reciev_date;
        }

        if (isset($r_status)) {
            if ($r_status == 1) {
                return redirect()->route('durable.show', $request->durable_id)
                                ->with('unsuccess', 'ครุภัณฑ์นี้ส่งซ่อมแล้วเมื่อ '.$r_date);
            } else if ($r_status == 2) {
                return redirect()->route('durable.show', $request->durable_id)
                                ->with('unsuccess', 'ช่างรับซ่อมครุภัณฑ์นี้แล้วเมื่อ '.$r_reciev_date.' อยู่ระหว่างการซ่อม... โปรดติดต่อช่างเพื่อสอบถาม');
            } else {
                Repair::create($request->all());
                Durable::where('id', $request->durable_id)->update(['status' => 3,'repair_status' => 'ส่งซ่อม '.$request->repair_date]);
                return redirect()->route('durable.show', $request->durable_id)
                                ->with('success', 'แจ้งซ่อมเรียบร้อยแล้ว');
            }
        } else {
            if (isset($request->image)) {
                $image1 = $request->file('image');
                $file_name1 = $request->durable_id."_".time()."_1_".$image1->getClientOriginalName();
                $destinationPath1 = public_path('/images/repair');
                $image1->move($destinationPath1, $file_name1);
                $request->merge(['repair_image' => $file_name1]);
            }
            Repair::create($request->all());
            Durable::where('id', $request->durable_id)->update(['status' => 3,'repair_status' => 'ส่งซ่อม '.$request->repair_date]);
            return redirect()->route('search.show', $request->durable_id)
                            ->with('repairsuccess', 'แจ้งซ่อม: '.$request->pass_number.', สาเหตุ: '.$request->repair_text.', ผู้ส่งซ่อม: '.$request->user_name.' ... '.env('APP_URL').'/repair/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $repairs = Repair::select('repairs.*','durables.*')
        ->leftJoin('durables', 'repairs.durable_id', '=', 'durables.id')
        ->where('repairs.id', $id)
        ->get();

        return view('repair.detail', [
            'pagename' => "ข้อมูลส่งซ่อม",
            'repairs' => $repairs,
            'repairid' => $id,
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
        Repair::where('id', $request->repairid)
            ->update([
                'repair_reciev_date' => $request->repair_reciev_date,
                'repair_reciev_user' => $request->repair_reciev_user,
                'repair_status' => $request->repair_status,
            ]);

        Durable::where('id', $request->durable_id)
            ->update([
                'repair_status' => 'ช่างรับซ่อม '.$request->repair_reciev_date,
            ]);

        return redirect()->route('repair.index')->with('success','คุณรับงานซ่อมเรียบร้อยแล้ว');
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
