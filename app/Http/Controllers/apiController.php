<?php

namespace App\Http\Controllers;
use App\Admin;
use App\Procategory;
use Illuminate\Http\Request;

class apiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAdmin(REQUEST $request, Admin $admin)
    {
        if(isset($request->id)):
            $adminArray['admin'] = Admin::find($request->id);    
        else:        
            $adminArray['admin'] = Admin::all();
        endif;
        
        $adminArray['status'] = 'Success'; 
        print json_encode($adminArray);
    
    }

    public function getCategory(REQUEST $request, Procategory $category)
    {
        if(isset($request->id)):
            $catArray['category'] = Procategory::find($request->id);    
        else:        
            $catArray['category'] = Procategory::all();
        endif;
        
        $catArray['status'] = 'Success'; 
        print json_encode($catArray);
    
    }

}
