<?php

namespace App\Http\Controllers\Merchant;

use Illuminate\Http\Request;

use DB;
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

      return view('merchant/dashboard');

    }
}
