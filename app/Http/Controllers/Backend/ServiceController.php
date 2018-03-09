<?php

namespace App\Http\Controllers\Backend;
use App\AdditionalService;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = AdditionalService::orderBy('name')->get();
        return view('backend/service/index')->with('services', $services)
                                               ->with('page_title', 'Additional Service| Admin Center MyWorldHealth.Com');
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
        $service = AdditionalService::find($id);
        return view('backend/service/edit')->with('service', $service)
                                              ->with('page_title', 'Edit Hospital Depatments | Admin Center MyWorldHealth.Com');

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
                   'notices'           => 'required',

           );

       $this->validate($request, $rules);

       $service = AdditionalService::find($id);
       $service->status          = $request->get('status');
       $service->notices         = $request->get('notices');
       $service->updated_at      = Carbon::now();
       $service->save();

       return redirect('admin/additional-services');


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
