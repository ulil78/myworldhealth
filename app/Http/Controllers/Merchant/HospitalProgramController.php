<?php

namespace App\Http\Controllers\Merchant;
use App\HospitalProgram;
use Carbon\Carbon;
use App\Mail\ProgramUpdated;
use App\Mail\ProgramCreated;
use App\Mail\ProgramDeleted;
use DB;
use Mail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HospitalProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = DB::table('hospitals')
                            ->join('hospital_departments', 'hospital_departments.hospital_id', '=', 'hospitals.id')
                            ->join('hospital_programs', 'hospital_programs.hospital_department_id', '=', 'hospital_departments.id')
                            ->select('hospital_programs.*', 'hospitals.merchant_id as merchant_id')
                            ->where('hospitals.merchant_id', \Auth::guard('merchant')->user()->id)
                            ->get();

        $hospital = \App\Hospital::where('merchant_id', \Auth::guard('merchant')->user()->id)->first();

        return view('merchant/program/index')->with('programs', $programs)
                                            ->with('hospital', $hospital)
                                            ->with('page_title', 'Hospital Program | merchant Center MyWorldHealth.Com');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hospital = \App\Hospital::where('merchant_id', \Auth::guard('merchant')->user()->id)->first();

        $departments = \App\HospitalDepartment::where('hospital_id', $hospital->id)
                                                ->where('status', 'true')
                                                ->orderBy('name')
                                                ->get();

        $firsts = \App\FirstCategory::orderBy('name')->get();


        return view('merchant/program/create')->with('hospital', $hospital)
                                              ->with('departments', $departments)
                                              ->with('firsts', $firsts)
                                              ->with('page_title', 'Add Hospital Program | merchant Center MyWorldHealth.Com');
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
                     'hospital_department_id'       => 'required',
                     'first_category_id'           => 'required',
                     'second_category_id'           => 'required',
                     'name'                         => 'required',
                     'description'                  => 'required',
                     'price'                        => 'required',
                     'discount'                     => 'required',
                     'duration'                     => 'required'


             );

         $this->validate($request, $rules);

         $program = new HospitalProgram;
         $program->hospital_department_id      = $request->get('hospital_department_id');
         $program->first_category_id           = $request->get('first_category_id');
         $program->second_category_id          = $request->get('second_category_id');
         $program->thrid_category_id          = $request->get('thrid_category_id');
         $program->name                        = $request->get('name');
         $program->description                 = $request->get('description');
         $program->price                       = $request->get('price');
         $program->discount                    = $request->get('discount');
         $program->duration                    = $request->get('duration');
         $program->save();

         $hospital_name = \Auth::guard('merchant')->user()->name;
         $department_name = \App\HospitalDepartment::where('id', $program->hospital_department_id)->value('name');

         $content = [
            'title'               => 'Partner has create New Program',
            'hospital_name'       => $hospital_name,
            'department'          => $department_name,
            'program'             => $program->name,

         ];

        // $receiverAddress = $email_hospital;
         $receiverAddress = 'admin@myworldhealth.com';

        Mail::to($receiverAddress)->send(new ProgramCreated($content));

        return redirect('merchant/hospital-programs');
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
        $hospital = \App\Hospital::where('merchant_id', \Auth::guard('merchant')->user()->id)->first();
        $departments = \App\HospitalDepartment::where('hospital_id', $hospital->id)
                                                ->where('status', 'true')
                                                ->orderBy('name')
                                                ->get();
        $firsts = \App\FirstCategory::orderBy('name')->get();

        return view('merchant/program/edit')->with('program', $program)
                                            ->with('hospital', $hospital)
                                            ->with('departments', $departments)
                                            ->with('firsts', $firsts)
                                            ->with('page_title', 'Edit Hospital Depatments | merchant Center MyWorldHealth.Com');

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
              'hospital_department_id'       => 'required',
              'first_category_id'            => 'required',
              'second_category_id'           => 'required',
              'name'                         => 'required',
              'description'                  => 'required',
              'price'                        => 'required',
              'discount'                     => 'required',
              'duration'                     => 'required'

           );

       $this->validate($request, $rules);

       $program = HospitalProgram::find($id);
       $program->hospital_department_id      = $request->get('hospital_department_id');
       $program->first_category_id           = $request->get('first_category_id');
       $program->second_category_id          = $request->get('second_category_id');
       $program->thrid_category_id          = $request->get('thrid_category_id');
       $program->name                        = $request->get('name');
       $program->description                 = $request->get('description');
       $program->price                       = $request->get('price');
       $program->discount                    = $request->get('discount');
       $program->duration                    = $request->get('duration');
       $program->status                      = $request->get('status');
       $program->updated_at                  = Carbon::now();
       $program->save();

       $hospital_name = \Auth::guard('merchant')->user()->name;
       $department_name = \App\HospitalDepartment::where('id', $program->hospital_department_id)->value('name');

       $content = [
          'title'               => 'Partner has update a Program',
          'hospital_name'       => $hospital_name,
          'department'          => $department_name,
          'program'             => $program->name,

       ];

      // $receiverAddress = $email_hospital;
       // $receiverAddress = 'rully.arfan@gmail.com';

       // Mail::to($receiverAddress)->send(new ProgramUpdated($content));

       return redirect('merchant/hospital-programs');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $program = HospitalProgram::find($id);

        $hospital_name = \Auth::guard('merchant')->user()->name;
        $department_name = \App\HospitalDepartment::where('id', $program->hospital_department_id)->value('name');

        $content = [
           'title'               => 'Partner has deleted a Program',
           'hospital_name'       => $hospital_name,
           'department'          => $department_name,
           'program'             => $program->name,

        ];

       // $receiverAddress = $email_hospital;
        $receiverAddress = 'rully.arfan@gmail.com';

        Mail::to($receiverAddress)->send(new ProgramDeleted($content));
        $program->delete();

        return redirect('merchant/hospital-programs');
    }
}
