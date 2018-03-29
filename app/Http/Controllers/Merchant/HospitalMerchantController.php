<?php

namespace App\Http\Controllers\Merchant;
use App\Hospital;
use Carbon\Carbon;
use App\Mail\HospitalUpdated;
use Mail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HospitalMerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $hospitals = Hospital::where('merchant_id', \Auth::guard('merchant')->user()->id)->get();
        return view('merchant/hospital/index')->with('hospitals', $hospitals)
                                                    ->with('page_title', 'Hospital | Admin Center - MyWorldHealth.Com');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

     public function store(Request $request)
     {

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
         $images = \App\HospitalImage::where('hospital_id', $id)->orderBy('id', 'desc')->get();
         $image_count = \App\HospitalImage::where('hospital_id', $id)->count();
         return view('merchant/hospital/edit')->with('countries', $countries)
                                             ->with('merchants', $merchants)
                                             ->with('hospital', $hospital)
                                             ->with('images', $images)
                                             ->with('image_count', $image_count)
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
          $hospital->pic                  = $request->get('pic');
          $hospital->phone                = $request->get('phone');
          $hospital->fax                  = $request->get('fax');
          $hospital->description          = $request->get('description');
          $hospital->accommodation        = $request->get('accommodation');
          $hospital->updated_at           = Carbon::now();
          $hospital->save();

          $hospital_name = \Auth::guard('merchant')->user()->name;

          $content = [
             'title'               => 'Partner Update Hospital',
             'hospital_name'       => $hospital_name,


          ];

         // $receiverAddress = $email_hospital;
          $receiverAddress = 'admin@myworldhealth.com';

         Mail::to($receiverAddress)->send(new HospitalUpdated($content));

          return redirect('merchant/hospitals');
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {

     }

     public function postImage(Request $request)
     {
         $rules = array(

                    'description'       => 'required',
                    'picture'           => 'required'
            );

        $this->validate($request, $rules);

         $id = $request->post('hospital_id');

         $upload_path =  'images/hospital/';
         $filename = date('ymdhis') . '_' . $request->file('picture')->getClientOriginalName();
         $request->file('picture')->move('images/hospital/', $filename);

         $image = new \App\HospitalImage;
         $image->hospital_id   = $id;
         $image->path          = $upload_path;
         $image->filename      = $filename;
         $image->description   = $request->post('description');
         $image->save();

         return redirect('merchant/hospitals/' .$id. '/edit');

     }

     public function getRemoveImage($id, $hospital)
     {
          \DB::table('hospital_images')->where('id', $id)->delete();
          return redirect('merchant/hospitals/' .$hospital. '/edit');
     }
}
