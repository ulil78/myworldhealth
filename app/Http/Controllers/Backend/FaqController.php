<?php

namespace App\Http\Controllers\Backend;
use App\Faq;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::all();
        return view('backend/faq/index')->with('faqs', $faqs)
                                        ->with('page_title', 'FAQ | Admin Center - MyWorldHealth.Com');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend/faq/create')->with('page_title', 'Add FAQ | Admin Center - MyWorldHealth.Com');
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
                     'question'                   => 'required',
                     'answer'            => 'required',
          );

         $this->validate($request, $rules);



         $faq = new Faq;
         $faq->question            = $request->get('question');
         $faq->answer              = $request->get('answer');
         $faq->save();

         return redirect('admin/faqs');

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
        $faq  = Faq::find($id);
        return view('backend/faq/edit')->with('faq', $faq)
                                        ->with('page_title', 'Edit FAQ | Admin Center - MyWorldHealth.Com');
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
            'question'          => 'required',
            'answer'            => 'required',

          );

         $this->validate($request, $rules);

         $faq = Faq::find($id);
         $faq->question             = $request->get('question');
         $faq->answer               = $request->get('answer');
         $faq->updated_at           = Carbon::now();
         $faq->status               = $request->get('status');
         $faq->save();

         return redirect('admin/faqs');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faq = Faq::find($id);
        $faq->delete();

        return redirect('admin/faqs');
    }
}
