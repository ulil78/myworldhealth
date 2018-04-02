<?php

namespace App\Http\Controllers\Backend;
use App\Partner;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::orderBy('name')->get();
        return view('backend/partner/index')->with('partners', $partners)
                                              ->with('page_title', 'Partners | Admin Center - MyWorldHealth.Com');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/partner/create')->with('page_title', 'Add Partner | Admin Center - MyWorldHealth.Com');
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

          $upload_path =  'images/partner/';
          $filename = date('ymdhis') . '_' . $request->file('picture')->getClientOriginalName();
          $request->file('picture')->move('images/partner/', $filename);

         $partner = new Partner;
         $partner->name                 = $request->get('name');
         $partner->url                  = $request->get('url');
         $partner->path                 = $upload_path;
         $partner->filename             = $filename;
         $partner->save();

         return redirect('admin/partners');

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
        $partner  = Partner::find($id);
        return view('backend/partner/edit')->with('partner', $partner)
                                          ->with('page_title', 'Edit Partner | Admin Center - MyWorldHealth.Com');
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

         $partner = Partner::find($id);
         $partner->name                 = $request->get('name');
         $partner->url                  = $request->get('url');
         if (strlen($request->file('picture')) > 0 ){
              $upload_path =  'images/partner/';
              $filename = date('ymdhis') . '_' . $request->file('picture')->getClientOriginalName();
              $request->file('picture')->move('images/partner/', $filename);

              $partner->path                    = $upload_path;
              $partner->filename                = $filename;


          }
         $partner->updated_at           = Carbon::now();
         $partner->status               = $request->get('status');
         $partner->save();

         return redirect('admin/partners');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partner = Partner::find($id);
        $partner->delete();

        return redirect('admin/partners');
    }
}
