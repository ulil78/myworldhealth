<?php

namespace App\Http\Controllers\Backend;
use App\Hospital;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $hospitals = Hospital::orderBy('name')->get();
        return view('backend/hospital/index')->with('hospitals', $hospitals)
                                                    ->with('page_title', 'Hospital | Admin Center - MyWorldHealth.Com');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $countries = \App\Country::orderBy('name')->get();
        $merchants = \App\Merchant::orderBy('name')->get();
        return view('backend/hospital/create')->with('countries', $countries)
                                              ->with('merchants', $merchants)
                                              ->with('page_title', 'Add Hospital | Admin Center - MyWorldHealth.Com');
    }

     public function store(Request $request)
     {
         $rules = array(
                    'name'                  => 'required',
                    'address'               => 'required',
                    'city_id'               => 'required',
                    'merchant_id'           => 'required',
                    'pic'                   => 'required',
                    'phone'                 => 'required',
                    'fax'                   => 'required',
                    'description'           => 'required',
                    'accommodation'         => 'required',
                    'map'                   => 'required'
            );

        $this->validate($request, $rules);

        $hospital                       = new Hospital;
        $hospital->name                 = $request->get('name');
        $hospital->slug                 = str_slug($request->get('name'), '-');
        $hospital->address              = $request->get('address');
        $hospital->city_id              = $request->get('city_id');
        $hospital->merchant_id          = $request->get('merchant_id');
        $hospital->pic                  = $request->get('pic');
        $hospital->phone                = $request->get('phone');
        $hospital->fax                  = $request->get('fax');
        $hospital->description          = $request->get('description');
        $hospital->accommodation        = $request->get('accommodation');
        $hospital->save();

        return redirect('admin/hospitals');
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
         $hospital = Hospital::find($id);
         $countries = \App\Country::orderBy('name')->get();
         $merchants = \App\Merchant::orderBy('name')->get();
         return view('backend/hospital/edit')->with('countries', $countries)
                                             ->with('merchants', $merchants)
                                             ->with('hospital', $hospital)
                                             ->with('page_title', 'Edit Hospital| Admin Center - MyWorldHealth.Com');
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
                       'name'                  => 'required',
                       'address'               => 'required',
                       'city_id'               => 'required',
                       'merchant_id'           => 'required',
                       'pic'                   => 'required',
                       'phone'                 => 'required',
                       'fax'                   => 'required',
                       'description'           => 'required',
                       'accommodation'         => 'required',
                       'map'                   => 'required'

          );

          $this->validate($request, $rules);




          $hospital                       = Hospital::find($id);
          $hospital->name                 = $request->get('name');
          $hospital->slug                 = str_slug($request->get('name'), '-');
          $hospital->address              = $request->get('address');
          $hospital->city_id              = $request->get('city_id');
          $hospital->merchant_id          = $request->get('merchant_id');
          $hospital->pic                  = $request->get('pic');
          $hospital->phone                = $request->get('phone');
          $hospital->fax                  = $request->get('fax');
          $hospital->description          = $request->get('description');
          $hospital->accommodation        = $request->get('accommodation');
          $hospital->status               = $request->get('status');
          $hospital->notes                = $request->get('notes');
          $hospital->updated_at           = Carbon::now();
          $hospital->save();

          return redirect('admin/hospitals');
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
         $hospital = Hospital::find($id);
         $hospital->delete();

         return redirect('admin/hospitals');
     }
}
