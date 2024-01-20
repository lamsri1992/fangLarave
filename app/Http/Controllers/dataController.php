<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class dataController extends Controller
{
    public function departmentList()
    {
        $data = DB::table('department')->get();
        return view('department.index',['data'=>$data]);
    }

    public function departmentCreate(Request $request)
    {   
        DB::table('department')->insert([
            'place_name' => $request->place_name,
        ]);
        return back()->with('success','เพิ่มข้อมูลสถานที่ / หน่วยบริการสำเร็จ');
    }

    public function departmentEdit(Request $request, $id)
    {
        $data = DB::table('department')->where('place_id',$id)->first();
        return view('department.show',['data'=>$data]);
    }

    public function departmentUpdate(Request $request, $id)
    {
        DB::table('department')->where('place_id', $id)->update([
            'place_name' => $request->place_name
        ]);
        return back()->with('success','แก้ไขข้อมูลสำเร็จ');
    }

    public function departmentDelete(Request $request)
    {
        DB::table('department')->where('place_id',$request->id)->delete();
    }

    public function officerList()
    {
        $data = DB::table('officer')->get();
        return view('officer.index',['data'=>$data]);
    }
}
