<?php

namespace App\Http\Controllers\Merchant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportMerchantController extends Controller
{
    public function getIndexTransaction()
    {
        return view('merchant/report-transaction/index')->with('page_title', 'Report Transaction | Merchant Center MyWorldHealth.Com');
    }
}
