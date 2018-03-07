<?php

namespace App\Http\Controllers\Backend;
use App\Preference;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PreferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preferences = Preference::all();
        return view('backend/preference/index')->with('preferences', $preferences)
                                               ->with('page_title', 'Preference | Admin Center MyWorldHealth.Com');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $preference = Preference::find($id);
        $countries = \App\Country::orderBy('name')->get();
        return view('backend/preference/edit')->with('countries', $countries)
                                              ->with('preference', $preference)
                                             ->with('page_title', 'Preference | Admin Center - MyWorldHealth.Com');
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
          'company_name'                  => 'required',
          'address'                       => 'required',
          'phone'                         => 'required',
          'city_id'                       => 'required',
          'state'                         => 'required',
          'country_id'                    => 'required',
          'postcode'                      => 'required',
          'map'                           => 'required',
          'fax'                           => 'required',
          'email'                         => 'required|email',
          'facebook'                      => 'required',
          'twitter'                       => 'required',
          'youtube'                       => 'required',

        );

       $this->validate($request, $rules);


       $preference = Preference::find($id);
       $preference->company_name    = $request->get('company_name');
       $preference->address         = $request->get('address');
       $preference->phone           = $request->get('phone');
       $preference->city_id         = $request->get('city_id');
       $preference->state           = $request->get('state');
       $preference->country_id      = $request->get('country_id');
       $preference->postcode        = $request->get('postcode');
       $preference->map             = $request->get('map');
       $preference->fax             = $request->get('fax');
       $preference->email           = $request->get('email');
       $preference->facebook        = $request->get('facebook');
       $preference->twitter         = $request->get('twitter');
       $preference->youtube         = $request->get('youtube');
       if (strlen($request->file('picture')) > 0 ){
          $upload_path =  'images/';
          $filename = date('ymdhis') . '_' . $request->file('picture')->getClientOriginalName();
          $request->file('picture')->move('images/', $filename);

          $preference->path                    = $upload_path;
          $preference->filename                = $filename;
       }
       $preference->updated_at                = Carbon::now();
       $preference->save();

       return redirect('admin/preferences');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
