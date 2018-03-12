<?php

namespace App\Http\Controllers\Backend;
use App\QualityStandard;
use Carbon\Carbon;
use Session;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QualityStandardController extends Controller
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
        $quality = QualityStandard::find($id);
        return view('backend/quality/edit')->with('quality', $quality)
                                         ->with('$page_title', 'Quality Standard | Admin Center MyWorldHealth.Com');
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

         $quality = QualityStandard::find($id);
         $quality->title          = $request->get('title');
         $quality->description    = $request->get('description');
         if (strlen($request->file('picture')) > 0 ){
            $upload_path =  'images/general/';
            $filename = date('ymdhis') . '_' . $request->file('picture')->getClientOriginalName();
            $request->file('picture')->move('images/general/', $filename);

            $quality->path                    = $upload_path;
            $quality->filename                = $filename;


        }
         $quality->updated_at         = Carbon::now();
         $quality->save();

         Session::flash('message','Update Successfuly');

         return redirect('admin/quality-standards/1/edit');

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
