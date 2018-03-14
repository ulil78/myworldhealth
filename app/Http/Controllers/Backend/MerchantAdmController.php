<?php

namespace App\Http\Controllers\Backend;
use App\Merchant;
use Carbon\Carbon;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class MerchantAdmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merchants = Merchant::orderBy('name')->get();
        return view('backend/merchant/index')->with('merchants', $merchants)
                                          ->with('page_title', 'Merchant | Admin Center MyWorldHealth.Com');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/merchant/create')->with('page_title', 'Add Merchant | Admin Center MyWorldHealth.Com');
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
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
            );

            $this->validate($request, $rules);

            $pass  = $request->get('password');

            $merchant = new Merchant;
            $merchant->name        = $request->get('name');
            $merchant->Email       = $request->get('email');
            $merchant->password    = bcrypt($pass);
            $merchant->save();

            return redirect('admin/merchants');

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
         return view('backend/merchant/edit')->with('merchant', $merchant)
                                             ->with('page_title', 'Edit Merchant | Admin Center MyWorldHealth.Com');
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
              'name'        => 'required|string|max:255',
              'password'    => 'required|string|min:6|confirmed',

          );

          $this->validate($request, $rules);

          $pass  = $request->get('password');

          $merchant = Merchant::find($id);
          $merchant->name        = $request->get('name');
          $merchant->password    = bcrypt($pass);
          $merchant->status      = $request->get('status');
          $merchant->notices     = $request->get('notices');
          $merchant->updated_at  = Carbon::now();
          $merchant->save();

          return redirect('admin/merchants');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $merchant = Merchant::find($id);
        $merchant->delete();
        return redirect('admin/merchants');
    }
}
