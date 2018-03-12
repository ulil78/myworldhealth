<?php

namespace App\Http\Controllers\Backend;
use App\HowItWork;
use Carbon\Carbon;
use Session;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HowItWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        $work = HowItWork::find($id);
        return view('backend/how-it-work/edit')->with('work', $work)
                                         ->with('$page_title', 'How it Work | Admin Center MyWorldHealth.Com');
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
                 'title'        => 'required',
                 'description'  => 'required'
         );

         $this->validate($request, $rules);

         $work = HowItWork::find($id);
         $work->title          = $request->get('title');
         $work->description    = $request->get('description');
         if (strlen($request->file('picture')) > 0 ){
            $upload_path =  'images/general/';
            $filename = date('ymdhis') . '_' . $request->file('picture')->getClientOriginalName();
            $request->file('picture')->move('images/general/', $filename);

            $work->path                    = $upload_path;
            $work->filename                = $filename;


        }
         $work->updated_at         = Carbon::now();
         $work->save();

         Session::flash('message','Update Successfuly');

         return redirect('admin/how-it-works/1/edit');

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
