<?php

namespace App\Http\Controllers\Merchant;
use App\AdditionalService;
use Carbon\Carbon;
use App\Mail\ServiceUpdated;
use App\Mail\ServiceCreated;
use App\Mail\ServiceDeleted;
use DB;
use Mail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdditionalServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = DB::table('hospitals')
                            ->join('hospital_departments', 'hospital_departments.hospital_id', '=', 'hospitals.id')
                            ->join('hospital_programs', 'hospital_programs.hospital_department_id', '=', 'hospital_departments.id')
                            ->join('additional_services', 'additional_services.hospital_program_id', '=', 'hospital_programs.id')
                            ->select('additional_services.*', 'hospitals.merchant_id as merchant_id')
                            ->where('hospitals.merchant_id', \Auth::guard('merchant')->user()->id)
                            ->get();

        $hospital = \App\Hospital::where('merchant_id', \Auth::guard('merchant')->user()->id)->first();


        return view('merchant/service/index')->with('services', $services)
                                            ->with('hospital', $hospital)
                                            ->with('page_title', 'Additional Service| merchant Center MyWorldHealth.Com');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hospital = \App\Hospital::where('merchant_id', \Auth::guard('merchant')->user()->id)->first();
        $departments = \App\HospitalDepartment::where('hospital_id', $hospital->id)->orderBy('name')->get();

        return view('merchant/service/create')->with('hospital', $hospital)
                                              ->with('departments', $departments)
                                              ->with('page_title', 'Add Additional Service| merchant Center MyWorldHealth.Com');
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
                     'hospital_program_id'        => 'required',
                     'name'                       => 'required',
                     'price'                      => 'required',
                     'description'                => 'required',

             );

         $this->validate($request, $rules);

         $service = new AdditionalService;
         $service->hospital_program_id        = $request->get('hospital_program_id');
         $service->name                       = $request->get('name');
         $service->price                      = $request->get('price');
         $service->description                = $request->get('description');
         $service->save();

         $hospital_name = \Auth::guard('merchant')->user()->name;
         $program = \App\HospitalProgram::where('id', $service->hospital_program_id)->first();
         $department_name = \App\HospitalDepartment::where('id', $program->hospital_department_id)->value('name');

         $content = [
            'title'               => 'Partner has create New Additional Service',
            'hospital_name'       => $hospital_name,
            'department'          => $department_name,
            'program'             => $program->name,
            'service'             => $service->name,

         ];

        // $receiverAddress = $email_hospital;
         $receiverAddress = 'rully.arfan@gmail.com';

        Mail::to($receiverAddress)->send(new ServiceCreated($content));

        return redirect('merchant/additional-services');
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
        $hospital = \App\Hospital::where('merchant_id', \Auth::guard('merchant')->user()->id)->first();
        $departments = \App\HospitalDepartment::where('hospital_id', $hospital->id)->orderBy('name')->get();

        return view('merchant/service/edit')->with('service', $service)
                                           ->with('hospital', $hospital)
                                           ->with('departments', $departments)
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
              'hospital_program_id'        => 'required',
              'name'                       => 'required',
              'price'                      => 'required',
              'description'                => 'required',

           );

       $this->validate($request, $rules);

       $service = AdditionalService::find($id);
       $service->hospital_program_id        = $request->get('hospital_program_id');
       $service->name                       = $request->get('name');
       $service->price                      = $request->get('price');
       $service->description                = $request->get('description');
       $service->status                     = $request->get('status');
       $service->updated_at                 = Carbon::now();
       $service->save();


       $hospital_name = \Auth::guard('merchant')->user()->name;
       $program = \App\HospitalProgram::where('id', $service->hospital_program_id)->first();
       $department_name = \App\HospitalDepartment::where('id', $program->hospital_department_id)->value('name');

       $content = [
          'title'               => 'Partner has update a Additional Service',
          'hospital_name'       => $hospital_name,
          'department'          => $department_name,
          'program'             => $program->name,
          'service'             => $service->name,

       ];

      // $receiverAddress = $email_hospital;
       $receiverAddress = 'rully.arfan@gmail.com';

      Mail::to($receiverAddress)->send(new ServiceUpdated($content));


       return redirect('merchant/additional-services');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = AdditionalService::find($id);

        $hospital_name = \Auth::guard('merchant')->user()->name;
        $program = \App\HospitalProgram::where('id', $service->hospital_program_id)->first();
        $department_name = \App\HospitalDepartment::where('id', $program->hospital_department_id)->value('name');

        $content = [
           'title'               => 'Partner has deleted a Additional Service',
           'hospital_name'       => $hospital_name,
           'department'          => $department_name,
           'program'             => $program->name,
           'service'             => $service->name,

        ];

       // $receiverAddress = $email_hospital;
        $receiverAddress = 'rully.arfan@gmail.com';

        Mail::to($receiverAddress)->send(new ServiceDeleted($content));
        $service->delete();

        return redirect('merchant/additional-services');
    }
}
