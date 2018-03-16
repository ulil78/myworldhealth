<?php

namespace App\Http\Controllers\BAckend;
use App\Discount;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discounts = Discount::orderBy('id', 'desc')->get();
        return view('backend/discount/index')->with('discounts', $discounts)
                                            ->with('page_title', 'Discount | Admin Center - MyWorldHealth.Com');
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
          return view('backend/discount/create')->with('page_title', 'Add Discount | Admin Center - MyWorldHealth.Com');
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
                  'name'                        => 'required',
                  'discount'                    => 'required',
                  'start_date'                  => 'required',
                  'end_date'                    => 'required',
                  'description'                 => 'required'
          );

          $this->validate($request, $rules);

          $start      = $request->get('start_date');
          $start_date = date('Y-m-d', strtotime($start));

          $end        = $request->get('end_date');
          $end_date   = date('Y-m-d', strtotime($end));

          $discount = new Discount;
          $discount->name                 = $request->get('name');
          $discount->discount             = $request->get('discount');
          $discount->start_date           = $start_date;
          $discount->end_date             = $end_date;
          $discount->description          = $request->get('description');
          $discount->save();

          return redirect('admin/discounts');

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
          $discount  = Discount::find($id);
          return view('backend/discount/edit')->with('discount', $discount)
                                             ->with('page_title', 'Edit Discount | Admin Center - MyWorldHealth.Com');
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
                'name'                        => 'required',
                'discount'                    => 'required',
                'start_date'                  => 'required',
                'end_date'                    => 'required',
                'description'                 => 'required'
        );

        $this->validate($request, $rules);

        $start      = $request->get('start_date');
        $start_date = date('Y-m-d', strtotime($start));

        $end        = $request->get('end_date');
        $end_date   = date('Y-m-d', strtotime($end));

        $discount = Discount::find($id);
        $discount->name                 = $request->get('name');
        $discount->discount             = $request->get('discount');
        $discount->start_date           = $start_date;
        $discount->end_date             = $end_date;
        $discount->description          = $request->get('description');
        $discount->updated_at           = Carbon::now();
        $discount->status               = $request->get('status');
        $discount->save();

        return redirect('admin/discounts');


    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $discount = Discount::find($id);
        $discount->delete();

        return redirect('admin/discounts');
    }
}
