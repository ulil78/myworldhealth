<?php

namespace App\Http\Controllers\Backend;

use App\ThridCategory;
use Carbon\Carbon;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ThridCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ThridCategory::orderBy('name')->get();
        return view('backend/thrid-category/index')->with('categories', $categories)
                                                    ->with('page_title', 'Thrid Catgories | Admin Center - MyWorldHealth.Com');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $firsts = \App\FirstCategory::orderBy('name')->get();
        return view('backend/thrid-category/create')->with('firsts', $firsts)
                                                     ->with('page_title', 'Add Thrid Catgories | Admin Center - MyWorldHealth.Com');

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
        //
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
        //
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
=======
     public function store(Request $request)
     {
         $rules = array(
                    'name'                  => 'required',
                    'second_category_id'     => 'required',
                    'description'           => 'required'


            );

        $this->validate($request, $rules);

        $category                       = new ThridCategory;
        $category->name                 = $request->get('name');
        $category->second_category_id    = $request->get('second_category_id');
        $category->slug                 = str_slug($request->get('name'), '-');
        $category->description          = $request->get('description');
        $category->save();

        return redirect('admin/thrid-categories');
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
         $category = ThridCategory::find($id);
         $firsts = \App\FirstCategory::orderBy('name')->get();
         return view('backend/thrid-category/edit')->with('firsts', $firsts)
                                                    ->with('category', $category)
                                                    ->with('page_title', 'Edit Thrid Category| Admin Center - MyWorldHealth.Com');
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
                  'name'                  => 'required',
                  'second_category_id'     => 'required',
                  'description'           => 'required'

          );

          $this->validate($request, $rules);




          $category                       = ThridCategory::find($id);
          $category->second_category_id    = $request->get('second_category_id');
          $category->name                 = $request->get('name');
          $category->slug                 = str_slug($request->get('name'), '-');
          $category->description          = $request->get('description');
          $category->status               = $request->get('status');
          $category->updated_at           = Carbon::now();
          $category->save();

          return redirect('admin/thrid-categories');
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
         $category = ThridCategory::find($id);
         $category->delete();

         return redirect('admin/thrid-categories');
     }

}
