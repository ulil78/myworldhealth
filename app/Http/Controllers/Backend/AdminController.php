<?php
namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;

use DB;
use Mapper;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total_transaction = DB::table('invoices')
                              ->select(DB::raw('sum(total_amount) as total_amount', 'status'))
                              ->whereIn('status',['finish', 'confirm'] )
                              ->first();

        $total_order = DB::table('invoices')
                              ->select(DB::raw('count(*) as count_order', 'status'))
                              ->whereIn('status',['finish', 'confirm'] )
                              ->first();

        $total_user = \App\User::count();

        $total_merchant = \App\Merchant::count();

        $top_programs = DB::table('hospital_programs')
                          ->join('invoices', 'invoices.hospital_program_id', '=', 'hospital_programs.id')
                          ->select('hospital_programs.name as program_name',
                                   'hospital_programs.slug as slug_name',
                                   'hospital_programs.id as program_id',
                                   'invoices.id as invoice_id',
                                   DB::raw('count(*) as count_invoice'),
                                   DB::raw('sum(invoices.total_amount) as stotal_amount')
                          )->groupby('hospital_programs.id')
                          ->orderBy('count_invoice', 'desc')
                          ->take(6)
                          ->get();

      $top_program_amounts = DB::table('hospital_programs')
                                  ->join('invoices', 'invoices.hospital_program_id', '=', 'hospital_programs.id')
                                  ->select('hospital_programs.name as program_name',
                                           'hospital_programs.slug as slug_name',
                                           'hospital_programs.id as program_id',
                                           'invoices.id as invoice_id',
                                           DB::raw('count(*) as count_invoice'),
                                           DB::raw('sum(invoices.total_amount) as stotal_amount')
                                  )->groupby('hospital_programs.id')
                                  ->orderBy('total_amount', 'desc')
                                  ->take(6)
                                  ->get();

        $new_orders = \App\Invoice::where('status', 'new')->orderBy('id', 'desc')->get();

       $tahun = date('Y');
  	   $tgl_awal = $tahun. '-01-01';
  	   $tgl_akhir = $tahun. '-12-31';
  	   $t_awal = date('Y-m-d', strtotime($tgl_awal));
  	   $t_akhir = date('Y-m-d', strtotime($tgl_akhir));

       $order_ytd = \DB::table('invoices')->wherebetween('created_at', [$t_awal, $t_akhir])->count();

       $rev_ytd = \DB::table('invoices')->select(DB::raw('sum(total_amount) as sum_amount'))
       									->wherebetween('created_at', [$t_awal, $t_akhir])
       									->value('sum_amount');


        // Mapper::map(-6.175110, 106.865039);
        // Mapper::map(-7.257472, 112.752088);


        Mapper::map(-8.409518, 115.188916, ['center' => false, 'marker' => true]);
        $loc_partners = DB::table('cities')
                            ->join('hospitals', 'hospitals.city_id', '=', 'cities.id')
                            ->select('cities.latitude as latitude', 'cities.longitude as longitude')
                            ->get();
        foreach($loc_partners as $loc_partner)
        {
            Mapper::marker($loc_partner->latitude, $loc_partner->longitude);
        }




        Mapper::map(-8.409518, 115.188916, ['center' => false, 'marker' => true]);
        $loc_users = DB::table('cities')
                            ->join('users', 'users.city_id', '=', 'cities.id')
                            ->select('cities.latitude as latitude', 'cities.longitude as longitude')
                            ->get();

        foreach($loc_users as $loc_user)
        {
            Mapper::marker($loc_user->latitude, $loc_user->longitude);
        }



        return view('backend/dashboard')->with('total_transaction', $total_transaction)
                                        ->with('total_order', $total_order)
                                        ->with('total_merchant', $total_merchant)
                                        ->with('top_program_amounts', $top_program_amounts)
                                        ->with('top_programs', $top_programs)
                                        ->with('new_orders', $new_orders)
                                        ->with('order_ytd', $order_ytd)
                                        ->with('rev_ytd', $rev_ytd)
                                        ->with('total_user', $total_user);

    }


}
