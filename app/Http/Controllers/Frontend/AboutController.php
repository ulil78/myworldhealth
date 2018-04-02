<?php

namespace App\Http\Controllers\Frontend;
use App\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
	public function index()
	{
		$data['about'] = About::all();
		return view('front.pages.about.index', $data);
	}
}
