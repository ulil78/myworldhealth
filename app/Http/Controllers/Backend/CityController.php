<?php

namespace App\Http\Controllers\Backend;
use App\City;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::orderBy('name')->get();
        return view('backend/city/index')->with('cities', $cities)
                                              ->with('page_title', 'Cities | Admin Center - MyWorldHealth.Com');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = \App\Country::orderBy('name')->get();
        return view('backend/city/create')->with('countries', $countries)
                                          ->with('page_title', 'Add City | Admin Center - MyWorldHealth.Com');
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
                     'name'                   => 'required',
                     'description'            => 'required',
                     'country_id'             => 'required'
             );

         $this->validate($request, $rules);



         $city = new City;
         $city->name                 = $request->get('name');
         $city->country_id           = $request->get('country_id');
         $city->slug                 = str_slug($request->get('name'), '-');
         $city->description          = $request->get('description');
         $city->save();

         return redirect('admin/cities');

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
        $city  = City::find($id);
        $countries = \App\Country::orderBy('name')->get();
        return view('backend/city/edit')->with('city', $city)
                                        ->with('countries', $countries)
                                        ->with('page_title', 'Edit City | Admin Center - MyWorldHealth.Com');
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
            'name'                   => 'required',
            'description'            => 'required',
            'country_id'             => 'required'
          );

         $this->validate($request, $rules);

         $city = City::find($id);
         $city->name                 = $request->get('name');
         $city->country_id           = $request->get('country_id');
         $city->slug                 = str_slug($request->get('name'), '-');
         $city->description          = $request->get('description');
         $city->updated_at           = Carbon::now();
         $city->status               = $request->get('status');
         $city->save();

         return redirect('admin/cities');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = City::find($id);
        $city->delete();

        return redirect('admin/cities');
    }
}
