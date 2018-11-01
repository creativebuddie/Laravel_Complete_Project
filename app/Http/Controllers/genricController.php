<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
class genricController extends Controller
{
    
    public function updateStatus(Request $request)
    {
    $queryBuilder = DB::table($request->table)->select('status')->where('id', $request->id)->first();
    $status = $queryBuilder->status=='active'? 'inactive': 'active';
    $dataArray = array('status'=>$status);
    return DB::table($request->table)->where('id', $request->id)->update($dataArray)?'success':'error';
    }
}
