<?php

namespace App\Http\Controllers\Backend;
use App\Admin;
use Carbon\Carbon;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AdministratorController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::orderBy('name')->get();
        return view('backend/admin/index')->with('admins', $admins)
                                          ->with('page_title', 'Admin | Admin Center MyWorldHealth.Com');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = \App\Group::orderBy('name')->get();
        return view('backend/admin/create')->with('groups', $groups)
                                           ->with('page_title', 'Add Admin | Admin Center MyWorldHealth.Com');
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
                'group_id'  => 'required'
            );

            $this->validate($request, $rules);

            $pass  = $request->get('password');

            $admin = new Admin;
            $admin->group_id    = $request->get('group_id');
            $admin->name        = $request->get('name');
            $admin->Email       = $request->get('email');
            $admin->password    = bcrypt($pass);
            $admin->save();

            return redirect('admin/admins');

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
         $admin = Admin::find($id);
         $groups = \App\Group::orderBy('name')->get();
         return view('backend/admin/edit')->with('admin', $admin)
                                          ->with('groups', $groups)
                                          ->with('page_title', 'Edit Admin | Admin Center MyWorldHealth.Com');
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
              'group_id'    => 'required'

          );

          $this->validate($request, $rules);

          $pass  = $request->get('password');

          $admin = Admin::find($id);
          $admin->group_id    = $request->get('group_id');
          $admin->name        = $request->get('name');
          $admin->password    = bcrypt($pass);
          $admin->status      = $request->get('status');
          $admin->updated_at  = Carbon::now();
          $admin->save();

          return redirect('admin/admins');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::find($id);
        $admin->delete();
        return redirect('admin/admins');
    }
}
