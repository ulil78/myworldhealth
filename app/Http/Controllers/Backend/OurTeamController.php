<?php

namespace App\Http\Controllers\Backend;
use App\OurTeam;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OurTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = OurTeam::orderBy('name')->get();
        return view('backend/our-team/index')->with('teams', $teams)
                                              ->with('page_title', 'Our Teams | Admin Center - MyWorldHealth.Com');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/our-team/create')->with('page_title', 'Add Team | Admin Center - MyWorldHealth.Com');
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
                     'name'              => 'required',
                     'title'             => 'required',
                     'description'       => 'required',
                     'picture'           => 'required'
             );

         $this->validate($request, $rules);

          $upload_path =  'images/team/';
          $filename = date('ymdhis') . '_' . $request->file('picture')->getClientOriginalName();
          $request->file('picture')->move('images/team/', $filename);

         $team = new OurTeam;
         $team->name                 = $request->get('name');
         $team->title                = $request->get('title');
         $team->description          = $request->get('description');
         $team->path                 = $upload_path;
         $team->filename             = $filename;
         $team->save();

         return redirect('admin/our-teams');

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
        $team  = OurTeam::find($id);
        return view('backend/our-team/edit')->with('team', $team)
                                          ->with('page_title', 'Edit Team | Admin Center - MyWorldHealth.Com');
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
                  'name'              => 'required',
                  'title'             => 'required',
                  'description'       => 'required',
          );

         $this->validate($request, $rules);

         $team = OurTeam::find($id);
         $team->name                 = $request->get('name');
         $team->title                = $request->get('title');
         $team->description          = $request->get('description');
           if (strlen($request->file('picture')) > 0 ){
              $upload_path =  'images/team/';
              $filename = date('ymdhis') . '_' . $request->file('picture')->getClientOriginalName();
              $request->file('picture')->move('images/team/', $filename);

              $team->path                    = $upload_path;
              $team->filename                = $filename;


          }
         $team->updated_at           = Carbon::now();
         $team->status               = $request->get('status');
         $team->save();

         return redirect('admin/our-teams');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = OurTeam::find($id);
        $team->delete();

        return redirect('admin/our-teams');
    }
}
