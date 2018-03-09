<?php

namespace App\Http\Controllers\Backend;
use App\HospitalDepartment;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
      /**
       * Display a listing of the resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function index()
      {
          $departments = HospitalDepartment::orderBy('name')->get();
          return view('backend/department/index')->with('departments', $departments)
                                                 ->with('page_title', 'Hospital Depatments | Admin Center MyWorldHealth.Com');
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
          $department = HospitalDepartment::find($id);
          return view('backend/department/edit')->with('department', $department)
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

         $department = HospitalDepartment::find($id);
         $department->status          = $request->get('status');
         $department->notices         = $request->get('notices');
         $department->updated_at      = Carbon::now();
         $department->save();

         return redirect('admin/hospital-departments');


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
