<?php

namespace App\Http\Controllers\Frontend;
// First Category Modal
use App\FirstCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontController extends Controller
{
	public function beranda()
	{
		return view('front.pages.beranda.index');
	}

	public function search_result()
	{
		return view('front.pages.beranda.show');
	}

	public function detail()
	{
		return view('front.pages.beranda.detail');
	}

	public function booked()
	{
		return view('front.pages.beranda.booked');
	}

	public function getbooked()
	{
		return view('front.pages.beranda.getbooked');
	}

	public function processbooked()
	{
		return view('front.pages.beranda.processbooked');
	}
}
