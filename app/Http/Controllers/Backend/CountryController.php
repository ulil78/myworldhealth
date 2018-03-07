<?php

namespace App\Http\Controllers\Backend;

use App\Country;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::orderBy('name')->get();
        return view('backend/country/index')->with('countries', $countries)
                                              ->with('page_title', 'Countries | Admin Center - MyWorldHealth.Com');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend/country/create')->with('page_title', 'Add Countries | Admin Center - MyWorldHealth.Com'
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
                     'picture'           => 'required'
             );

         $this->validate($request, $rules);

          $upload_path =  'images/country/';
          $filename = date('ymdhis') . '_' . $request->file('picture')->getClientOriginalName();
          $request->file('picture')->move('images/country/', $filename);

         $country = new Country;
         $country->name                 = $request->get('name');
         $country->slug                 = str_slug($request->get('name'), '-');
         $country->path                 = $upload_path;
         $country->filename             = $filename;
         $country->save();

         return redirect('admin/countries')
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

        $country  = Country::find($id);
        return view('backend/country/edit')->with('country', $country)
                                          ->with('page_title', 'Edit Country | Admin Center - MyWorldHealth.Com'
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
          );

         $this->validate($request, $rules);

         $country = Country::find($id);
         $country->name                 = $request->get('name');
         $country->slug                 = str_slug($request->get('name'), '-');
           if (strlen($request->file('picture')) > 0 ){
              $upload_path =  'images/country/';
              $filename = date('ymdhis') . '_' . $request->file('picture')->getClientOriginalName();
              $request->file('picture')->move('images/country/', $filename);

              $country->path                    = $upload_path;
              $country->filename                = $filename;


          }
         $country->updated_at           = Carbon::now();
         $country->status               = $request->get('status');
         $country->save();

         return redirect('admin/countries');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $country = Country::find($id);
        $country->delete();

        return redirect('admin/countries'
    }
}
