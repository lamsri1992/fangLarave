<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class dataController extends Controller
{
    public function index()
    {
        $data = DB::table('department')->get();
        return view('department.index',['data'=>$data]);
    }

    public function officerList()
    {
        $data = DB::table('officer')->get();
        return view('officer.index',['data'=>$data]);
    }
}
