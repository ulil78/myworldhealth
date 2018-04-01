<?php

namespace App\Http\Controllers\Merchant;

use Illuminate\Http\Request;

use DB;
use Mapper;

use App\Http\Controllers\Controller;

class MerchantController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:merchant');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $tahun = date('Y');
      $tgl_awal = $tahun. '-01-01';
      $tgl_akhir = $tahun. '-12-31';
      $t_awal = date('Y-m-d', strtotime($tgl_awal));
      $t_akhir = date('Y-m-d', strtotime($tgl_akhir));

      $order_ytd = \DB::table('hospitals')
                          ->join('hospital_departments', 'hospital_departments.hospital_id', '=', 'hospitals.id')
                          ->join('hospital_programs', 'hospital_programs.hospital_department_id', '=', 'hospital_departments.id')
                          ->join('invoices', 'invoices.hospital_program_id', '=', 'hospital_programs.id')
                          ->select(DB::raw('count(invoices.id) as invoice_count', 'invoices.created_at as created_at', 'hospitals.merchant_id as merchant_id'))
                          ->wherebetween('invoices.created_at', [$t_awal, $t_akhir])
                          ->where('hospitals.merchant_id', \Auth::guard('merchant')->user()->id)
                          ->first();

      // $order_ytd = \DB::table('invoices')->wherebetween('created_at', [$t_awal, $t_akhir])->count();

      $rev_ytd = DB::table('hospitals')
                          ->join('hospital_departments', 'hospital_departments.hospital_id', '=', 'hospitals.id')
                          ->join('hospital_programs', 'hospital_programs.hospital_department_id', '=', 'hospital_departments.id')
                          ->join('invoices', 'invoices.hospital_program_id', '=', 'hospital_programs.id')
                          ->select(DB::raw('sum(invoices.total_amount) as total_amount', 'invoices.created_at as created_at', 'hospitals.merchant_id as merchant_id'))
                          ->wherebetween('invoices.created_at', [$t_awal, $t_akhir])
                          ->where('hospitals.merchant_id', \Auth::guard('merchant')->user()->id)
                          ->first();

      Mapper::map(-8.409518, 115.188916, ['center' => false, 'marker' => true]);
      
      $loc_users = DB::table('hospitals')
                          ->join('hospital_departments', 'hospital_departments.hospital_id', '=', 'hospitals.id')
                          ->join('hospital_programs', 'hospital_programs.hospital_department_id', '=', 'hospital_departments.id')
                          ->join('invoices', 'invoices.hospital_program_id', '=', 'hospital_programs.id')
                          ->join('users', 'users.id', '=', 'invoices.user_id')
                          ->join('cities', 'cities.id', '=', 'users.city_id')
                          ->select('cities.latitude as latitude', 'cities.longitude as longitude', 'hospitals.merchant_id as merchant_id')
                          ->where('hospitals.merchant_id',\Auth::guard('merchant')->user()->id)
                          ->get();

      foreach($loc_users as $loc_user)
      {
          Mapper::marker($loc_user->latitude, $loc_user->longitude);
      }

      return view('merchant/dashboard')->with('order_ytd', $order_ytd)
                                       ->with('rev_ytd', $rev_ytd);

    }
}
