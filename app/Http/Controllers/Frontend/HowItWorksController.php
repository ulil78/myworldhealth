<?php

namespace App\Http\Controllers\Frontend;

use App\HowItWork;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HowItWorksController extends Controller
{
	public function index()
	{
		$data['howitwork'] = HowItWork::all();
		return view('front.pages.how_it_work.index', $data);
	}
}
