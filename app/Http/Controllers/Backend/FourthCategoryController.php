<?php

namespace App\Http\Controllers\Backend;

use App\FourthCategory;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FourthCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = FourthCategory::orderBy('name')->get();
        return view('backend/fourth-category/index')->with('categories', $categories)
                                                    ->with('page_title', 'Fourth Catgories | Admin Center - MyWorldHealth.Com');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $firsts = \App\FirstCategory::orderBy('name')->get();
        return view('backend/fourth-category/create')->with('firsts', $firsts)
                                                     ->with('page_title', 'Add Fourth Catgories | Admin Center - MyWorldHealth.Com');
    }

     public function store(Request $request)
     {
         $rules = array(
                    'name'                  => 'required',
                    'thrid_category_id'     => 'required',
                    'description'           => 'required'


            );

        $this->validate($request, $rules);

        $category                       = new FourthCategory;
        $category->name                 = $request->get('name');
        $category->thrid_category_id    = $request->get('thrid_category_id');
        $category->slug                 = str_slug($request->get('name'), '-');
        $category->description          = $request->get('description');
        $category->save();

        return redirect('admin/fourth-categories');
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
         $category = FourthCategory::find($id);
         $firsts = \App\FirstCategory::orderBy('name')->get();
         return view('backend/fourth-category/edit')->with('firsts', $firsts)
                                                    ->with('category', $category)
                                                    ->with('page_title', 'Edit Fourth Category| Admin Center - MyWorldHealth.Com');
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
                  'thrid_category_id'     => 'required',
                  'description'           => 'required'

          );

          $this->validate($request, $rules);




          $category                       = FourthCategory::find($id);
          $category->thrid_category_id    = $request->get('thrid_category_id');
          $category->name                 = $request->get('name');
          $category->slug                 = str_slug($request->get('name'), '-');
          $category->description          = $request->get('description');
          $category->status               = $request->get('status');
          $category->updated_at           = Carbon::now();
          $category->save();

          return redirect('admin/fourth-categories');
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
         $category = FourthCategory::find($id);
         $category->delete();

         return redirect('admin/fourth-categories');
     }
}
