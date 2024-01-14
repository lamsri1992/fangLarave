<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class orderController extends Controller
{
    public function index()
    {
        // สร้างตัวแปรเพื่อเก็บข้อมูล ที่มาจากการเรียกใช้ผ่าน QueryBuilder
        // RAW QUERY
        $data = DB::select('SELECT order_id,order_datetime,dept_a.place_name as place,dept_b.place_name as destination,
                device_name,cradle_name,status_name,level_name,note,`order`.status_id
                FROM `order`
                LEFT JOIN department as dept_a ON dept_a.place_id = `order`.place_id
                LEFT JOIN department as dept_b ON dept_b.place_id = `order`.destination_id
                LEFT JOIN cradle_type ON cradle_type.cradle_id = `order`.cradle_id
                LEFT JOIN device ON device.device_id = `order`.device_id
                LEFT JOIN `level` ON `level`.level_id = `order`.status_id
                LEFT JOIN `status` ON `status`.status_id = `order`.status_id');
        
        $dept = DB::table('department')->get();
        $ctype = DB::table('cradle_type')->get();
        $dtype = DB::table('device')->get();
        $level = DB::table('level')->get();
        $officer = DB::table('officer')->get();

        return view('dashboard', ['data' => $data,'dept'=>$dept
        ,'ctype'=>$ctype,'dtype'=>$dtype,'level'=>$level,'officer'=>$officer]);
    }

    public function create(Request $request)
    {
        // เรียกใช้งานข้อมูลเวลา
        $date = date('Y-m-d H:i:s');
        // dd($request->all());
        DB::table('order')->insert(
            [
                'place_id' => $request->place,
                'destination_id' => $request->dest,
                'cradle_id' => $request->type,
                'device_id' => $request->device,
                'level_id' => $request->level,
                'note' => $request->note,
                'order_datetime' => $date,
            ]
        );
        return redirect()->route('order.all');
    }

    public function update(Request $request)
    {
        $date = date('Y-m-d H:i:s');
        DB::table('order')->where('order_id', $request->dataId)->update(
            [
                'officer_id' => $request->officer,
                'status_id' => 2,
                'recive_datetime' => $date,
            ]
        );
        // dd($request->all());
        return redirect()->route('order.all');
    }

    public function confirm(Request $request,$id)
    {
        $date = date('Y-m-d H:i:s');
        DB::table('order')->where('order_id', $id)->update(
            [
                'status_id' => 3,
                'ward_datetime' => $date,
            ]
        );
        return redirect()->route('order.all');
    }

    public function success(Request $request,$id)
    {
        $date = date('Y-m-d H:i:s');
        DB::table('order')->where('order_id', $id)->update(
            [
                'status_id' => 4,
                'finish_datetime' => $date,
            ]
        );
        return redirect()->route('order.all');
    }
}
