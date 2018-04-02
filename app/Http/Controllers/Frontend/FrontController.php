<?php

namespace App\Http\Controllers\Frontend;
// First Category Modal
use App\FirstCategory;
use App\WhyBooking;
use App\Partner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontController extends Controller
{
// Pages 
	public function beranda()
	{
		$data['why'] = WhyBooking::all();
		$data['partner'] = Partner::where('status', 'true')->get();
		return view('front.pages.beranda.index', $data);
	}

	public function why_mwh()
	{
		$data['why'] = WhyBooking::all();
		return view('front.pages.why_mwh.index', $data);
	}
// Function
	public function show_category($id)
	{
        $data['category'] = SecondCategory::find($id);
		return view('front.pages.beranda.show_category', $data);
	}

	public function search_result()
	{
		return view('front.pages.beranda.show');
	}

	public function detail()
	{
		return view('front.pages.beranda.detail');
	}
}
