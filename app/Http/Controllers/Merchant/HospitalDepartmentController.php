<?php

namespace App\Http\Controllers\Merchant;
use App\HospitalDepartment;
use Carbon\Carbon;
use App\Mail\DepartmentUpdated;
use App\Mail\DepartmentCreated;
use App\Mail\DepartmentDeleted;
use DB;
use Mail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HospitalDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $departments = DB::table('hospitals')
                            ->join('hospital_departments', 'hospital_departments.hospital_id', '=', 'hospitals.id')
                            ->select('hospital_departments.*', 'hospitals.merchant_id as merchant_id')
                            ->where('hospitals.merchant_id', \Auth::guard('merchant')->user()->id)
                            ->get();

        return view('merchant/department/index')->with('departments', $departments)
                                               ->with('page_title', 'Hospital Depatments | merchant Center MyWorldHealth.Com');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hospital = \App\Hospital::where('merchant_id', \Auth::guard('merchant')->user()->id)->first();
        return view('merchant/department/create')->with('hospital', $hospital)
                                                 ->with('page_title', 'Create Hospital Depatments | merchant Center MyWorldHealth.Com');

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
                    'name'          => 'required',
                    'description'   => 'required',
                    'doctor'        => 'required',
                    'doctor_title'  => 'required',
                    'picture'       => 'required'

             );

         $this->validate($request, $rules);

         $upload_path =  'images/department/';
         $filename = date('ymdhis') . '_' . $request->file('picture')->getClientOriginalName();
         $request->file('picture')->move('images/department/', $filename);

         $department = new HospitalDepartment;
         $department->hospital_id   = $request->get('hospital_id');
         $department->name          = $request->get('name');
         $department->description   = $request->get('description');
         $department->doctor        = $request->get('doctor');
         $department->doctor_title  = $request->get('doctor_title');
         $department->path          = $upload_path;
         $department->filename      = $filename;
         $department->save();

         $hospital_name = \Auth::guard('merchant')->user()->name;

         $content = [
            'title'               => 'Partner Create New Department',
            'hospital_name'       => $hospital_name,
            'department'          => $department->name,

         ];

        // $receiverAddress = $email_hospital;
         $receiverAddress = 'rully.arfan@gmail.com';

        Mail::to($receiverAddress)->send(new DepartmentCreated($content));

        return redirect('merchant/hospital-departments');
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
        $department = HospitalDepartment::find($id);
        $hospital = \App\Hospital::where('merchant_id', \Auth::guard('merchant')->user()->id)->first();
        return view('merchant/department/edit')->with('department', $department)
                                              ->with('hospital', $hospital)
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
                'name'          => 'required',
                'description'   => 'required',
                'doctor'        => 'required',
                'doctor_title'  => 'required'

           );

       $this->validate($request, $rules);

       $department = HospitalDepartment::find($id);
       $department->hospital_id   = $request->get('hospital_id');
       $department->name          = $request->get('name');
       $department->description   = $request->get('description');
       $department->doctor        = $request->get('doctor');
       $department->doctor_title  = $request->get('doctor_title');
       $department->status        = $request->get('status');
         if (strlen($request->file('picture')) > 0 ){
              $upload_path =  'images/department/';
              $filename = date('ymdhis') . '_' . $request->file('picture')->getClientOriginalName();
              $request->file('picture')->move('images/department/', $filename);

              $department->path         = $upload_path;
              $department->filename     = $filename;


          }
       $department->updated_at    = Carbon::now();
       $department->save();

       $hospital_name = \Auth::guard('merchant')->user()->name;

       $content = [
          'title'               => 'Partner Update Department',
          'hospital_name'       => $hospital_name,
          'department'          => $department->name,

       ];

      // $receiverAddress = $email_hospital;
       $receiverAddress = 'rully.arfan@gmail.com';

      Mail::to($receiverAddress)->send(new DepartmentUpdated($content));

       return redirect('merchant/hospital-departments');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = HospitalDepartment::find($id);


        $hospital_name = \Auth::guard('merchant')->user()->name;

        $content = [
           'title'               => 'Partner Delete Department',
           'hospital_name'       => $hospital_name,
           'department'          => $department->name,

        ];

        // $receiverAddress = $email_hospital;
        $receiverAddress = 'rully.arfan@gmail.com';

        Mail::to($receiverAddress)->send(new DepartmentDeleted($content));
        $department->delete();

        return redirect('merchant/hospital-departments');

    }
}
