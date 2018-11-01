<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;

class bannerController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.adminBanners.createBanner');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $banner = new Banner;
        $banner->banner_heading = $request->heading;
        $banner->get_started_url = $request->started_url;
        $banner->our_project_url = $request->project_url;
        $banner->__token = $request->_token;
        $banner->status = 'active';
        $banner->save();
        return '/demoproject/adminBanners/show';
       //return redirect('adminBanners/show')->with('success', 'Banner Added');

       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        $banner = Banner::all();
        
        return view('admin.adminBanners.manageBanner', ['banner'=>$banner]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Banner $banner)
    {
        $banner = Banner::find($request->id);
        return view('admin.adminBanners.editBanner', ['banner'=>$banner]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $curDate = date('Y-m-d H:i:s'); 
        $dataArray = array(
        'banner_heading'=> $request->banner_heading,
        'get_started_url'=> $request->started_url,
        'our_project_url'=> $request->website_url,
        '__token'=> $request->_token,
        'updated_at'=> $curDate
        );
        Banner::where('id', $request->id)->update($dataArray);
        return redirect('adminBanners/show')->with('success', 'Banner Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Banner $banner)
    {
        Banner::where('id', $request->id)->delete();
        return redirect('adminBanners/show')->with('success', 'successfully deleted');
    }
}
