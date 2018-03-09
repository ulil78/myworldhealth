<?php

namespace App\Http\Controllers\Backend;
use App\HospitalProgram;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = HospitalProgram::orderBy('name')->get();
        return view('backend/program/index')->with('programs', $programs)
                                               ->with('page_title', 'Hospital Program | Admin Center MyWorldHealth.Com');
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
        $program = HospitalProgram::find($id);
        return view('backend/program/edit')->with('program', $program)
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

       $program = HospitalProgram::find($id);
       $program->status          = $request->get('status');
       $program->notices           = $request->get('notices');
       $program->updated_at      = Carbon::now();
       $program->save();

       return redirect('admin/hospital-programs');


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
