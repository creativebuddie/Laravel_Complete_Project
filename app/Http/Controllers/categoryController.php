<?php

namespace App\Http\Controllers;

use App\Procategory;
use Illuminate\Http\Request;
use DB;
class categoryController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Procategory::all();
        return view('admin.proCategory.createCategory', ['category'=> $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(empty($request->par_cat_role)):
        $parId = 0;
        else:
        $parId =  $request->par_cat_role;  
        endif;    

   
        $category = new Procategory;
        $category->cat_name=$request->name;
        $category->cat_role=$request->assign_role;
        $category->par_cat_id= $parId;
        $category->cat_token=$request->_token;
        $category->status='active';
        $category->save();
        return redirect('proCategory/show')->with('success', 'category created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Procategory  $procategory
     * @return \Illuminate\Http\Response
     */
    public function show(Procategory $procategory)
    {
        $category = Procategory::all();
        return view('admin.proCategory.manageCategory', ['category'=>$category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Procategory  $procategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Procategory $procategory)
    {
        $category = Procategory::find($request->id);
        return view('admin.proCategory.editCategory', ['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Procategory  $procategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Procategory $procategory)
    {
        $curDate = date('Y-m-d H:i:s');  
        $category = array(
        'cat_name'=>$request->name,    
        'cat_role'=>$request->assign_role,  
        'par_cat_id'=>'0',
        'cat_token'=>$request->_token,  
        'updated_at'=>$curDate
        );
        $updateCategory = Procategory::where('id', $request->id)->update($category);
        return redirect('proCategory/show')->with('success', 'category updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Procategory  $procategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Procategory $procategory)
    {
        $category = Procategory::where('id', $request->id)->delete();
        return redirect('proCategory/show')->with('success', 'category deleted');
    }
}
