<?php

namespace App\Http\Controllers\Frontend;
// First Category Modal
use App\FirstCategory;
use App\WhyBooking;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontController extends Controller
{
// Pages 
	public function beranda()
	{
		$data['why'] = WhyBooking::all();
		return view('front.pages.beranda.index', $data);
	}

	public function why_mwh()
	{
		$data['why'] = WhyBooking::all();
		return view('front.pages.why_mwh.index', $data);
	}
// Function
	public function search_result()
	{
		return view('front.pages.beranda.show');
	}

	public function detail()
	{
		return view('front.pages.beranda.detail');
	}
}
