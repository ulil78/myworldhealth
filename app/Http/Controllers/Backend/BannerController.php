<?php

namespace App\Http\Controllers\Backend;
use App\Banner;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::orderBy('name')->get();
        return view('backend/banner/index')->with('banners', $banners)
                                              ->with('page_title', 'Banners | Admin Center - MyWorldHealth.Com');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/banner/create')->with('page_title', 'Add Banners | Admin Center - MyWorldHealth.Com');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $rules = array(
                     'name'             => 'required',
                     'url'              => 'required',
                     'picture'           => 'required'
             );

         $this->validate($request, $rules);

          $upload_path =  'images/banner/';
          $filename = date('ymdhis') . '_' . $request->file('picture')->getClientOriginalName();
          $request->file('picture')->move('images/banner/', $filename);

         $banner = new Banner;
         $banner->name                 = $request->get('name');
         $banner->url                  = $request->get('url');
         $banner->position             = $request->get('position');
         $banner->path                 = $upload_path;
         $banner->filename             = $filename;
         $banner->save();

         return redirect('admin/banners');

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
    public function edit($id)
    {
        $banner  = Banner::find($id);
        return view('backend/banner/edit')->with('banner', $banner)
                                          ->with('page_title', 'Edit Banner | Admin Center - MyWorldHealth.Com');
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
          $rules = array(
                'name'             => 'required',
                'url'              => 'required',
          );

         $this->validate($request, $rules);

         $banner = Banner::find($id);
         $banner->name                 = $request->get('name');
         $banner->url                  = $request->get('url');
         $banner->position             = $request->get('position');
           if (strlen($request->file('picture')) > 0 ){
              $upload_path =  'images/banner/';
              $filename = date('ymdhis') . '_' . $request->file('picture')->getClientOriginalName();
              $request->file('picture')->move('images/banner/', $filename);

              $banner->path                    = $upload_path;
              $banner->filename                = $filename;


          }
         $banner->updated_at           = Carbon::now();
         $banner->status               = $request->get('status');
         $banner->save();

         return redirect('admin/banners');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::find($id);
        $banner->delete();

        return redirect('admin/banners');
    }
}
