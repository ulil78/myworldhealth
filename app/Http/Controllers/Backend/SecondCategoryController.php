<?php

namespace App\Http\Controllers\Backend;
use App\SecondCategory;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SecondCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = SecondCategory::orderBy('name')->get();
        return view('backend/second-category/index')->with('categories', $categories)
                                                    ->with('page_title', 'Second Catgories | Admin Center - MyWorldHealth.Com');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $firsts = \App\FirstCategory::orderBy('name')->get();
        return view('backend/second-category/create')->with('firsts', $firsts)
                                                     ->with('page_title', 'Add Second Catgories | Admin Center - MyWorldHealth.Com');
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
                    'name'                  => 'required',
                    'first_category_id'     => 'required',
                    'description'           => 'required'


            );

        $this->validate($request, $rules);

        $category                       = new SecondCategory;
        $category->name                 = $request->get('name');
        $category->first_category_id    = $request->get('first_category_id');
        $category->slug                 = str_slug($request->get('name'), '-');
        $category->description          = $request->get('description');
        $category->save();

        return redirect('admin/second-categories');
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
         $category = SecondCategory::find($id);
         $firsts = \App\FirstCategory::orderBy('name')->get();
         return view('backend/second-category/edit')->with('firsts', $firsts)
                                                    ->with('category', $category)
                                                    ->with('page_title', 'Edit Second Category| Admin Center - MyWorldHealth.Com');
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
                  'first_category_id'     => 'required',
                  'description'           => 'required'

          );

          $this->validate($request, $rules);




          $category                       = SecondCategory::find($id);
          $category->first_category_id    = $request->get('first_category_id');
          $category->name                 = $request->get('name');
          $category->slug                 = str_slug($request->get('name'), '-');
          $category->description          = $request->get('description');
          $category->status               = $request->get('status');
          $category->updated_at           = Carbon::now();
          $category->save();

          return redirect('admin/second-categories');
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
         $category = SecondCategory::find($id);
         $category->delete();

         return redirect('admin/second-categories');
     }
}
