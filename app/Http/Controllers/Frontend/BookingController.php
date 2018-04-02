<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
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
