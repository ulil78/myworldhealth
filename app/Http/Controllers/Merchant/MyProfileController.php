<?php

namespace App\Http\Controllers\Merchant;
use App\Merchant;
use Carbon\Carbon;
use Auth;
use Session;
use Hash;
use DB;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MyProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
          $merchant = Merchant::find($id);
          return view('merchant/myprofile/edit')->with('merchant', $merchant)
                                              ->with('page_title', 'Edit Myprofile | Merchant Center MyWorldHealth.Com');
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



           $current_password = $request->get('current_password');
           $current_pass     = bcrypt($current_password);

           $merch = DB::table('merchants')->where('id', $id)->first();

           $pass1 = $merch->password;

           if (Auth::guard('merchant')->attempt(['email' => $request->email, 'password' => $request->current_password], $request->remember)) {
                Session::flash('message','Update Successfuly');

          }else{
                Session::flash('message','Password not found');

          }

          $rules = array(
              'name'                      => 'required|string|max:255',
              'current_password'          => 'required',
              'password'                  => 'required|min:4|max:20|confirmed',
              'password_confirmation'     => 'required|min:4|same:password'

          );

          $this->validate($request, $rules);

            $pass  = $request->get('password');

           $merchant = Merchant::find($id);
           $merchant->name        = $request->get('name');
           $merchant->password    = bcrypt($pass);
           $merchant->updated_at  = Carbon::now();
           $merchant->save();


           // Session::flash('message','Update Successfuly');
           return redirect('merchant/myprofiles/' .$merchant->id. '/edit');

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
