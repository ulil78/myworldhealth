<?php

namespace App\Http\Controllers\Backend;
use App\Slider;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::orderBy('name')->get();
        return view('backend/slider/index')->with('sliders', $sliders)
                                              ->with('page_title', 'Sliders | Admin Center - MyWorldHealth.Com');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/slider/create')->with('page_title', 'Add Slider | Admin Center - MyWorldHealth.Com');
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

          $upload_path =  'images/slider/';
          $filename = date('ymdhis') . '_' . $request->file('picture')->getClientOriginalName();
          $request->file('picture')->move('images/slider/', $filename);

         $slider = new Slider;
         $slider->name                 = $request->get('name');
         $slider->url                  = $request->get('url');
         $slider->path                 = $upload_path;
         $slider->filename             = $filename;
         $slider->save();

         return redirect('admin/sliders');

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
        $slider  = Slider::find($id);
        return view('backend/slider/edit')->with('slider', $slider)
                                          ->with('page_title', 'Edit Slider | Admin Center - MyWorldHealth.Com');
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

         $slider = Slider::find($id);
         $slider->name                 = $request->get('name');
         $slider->url                  = $request->get('url');
         if (strlen($request->file('picture')) > 0 ){
              $upload_path =  'images/slider/';
              $filename = date('ymdhis') . '_' . $request->file('picture')->getClientOriginalName();
              $request->file('picture')->move('images/slider/', $filename);

              $slider->path                    = $upload_path;
              $slider->filename                = $filename;


          }
         $slider->updated_at           = Carbon::now();
         $slider->status               = $request->get('status');
         $slider->save();

         return redirect('admin/sliders');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        $slider->delete();

        return redirect('admin/sliders');
    }
}
