<?php

namespace App\Http\Controllers\Backend;
use App\FirstCategory;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FirstCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = FirstCategory::orderBy('name')->get();
        return view('backend/first-category/index')->with('categories', $categories)
                                                  ->with('page_title', 'First Catgories | Admin Center - MyWorldHealth.Com');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/first-category/create')->with('page_title', 'Add First Catgories | Admin Center - MyWorldHealth.Com');
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
                    'description'           => 'required'


            );

        $this->validate($request, $rules);

        $category                    = new FirstCategory;
        $category->name              = $request->get('name');
        $category->slug              = str_slug($request->get('name'), '-');
        $category->description       = $request->get('description');
        $category->save();

        return redirect('admin/first-categories');
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
         $category = FirstCategory::find($id);
         return view('backend/first-category/edit')->with('category', $category)
                                    ->with('page_title', 'Edit First Category| Admin Center - MyWorldHealth.Com');
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
                      'description'           => 'required'

              );

          $this->validate($request, $rules);




          $category                    = FirstCategory::find($id);
          $category->name              = $request->get('name');
          $category->slug              = str_slug($request->get('name'), '-');
          $category->description       = $request->get('description');
          $category->status            = $request->get('status');
          $category->updated_at        = Carbon::now();
          $category->save();

          return redirect('admin/first-categories');
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
         $category = FirstCategory::find($id);
         $category->delete();

         return redirect('admin/first-categories');
     }
}
