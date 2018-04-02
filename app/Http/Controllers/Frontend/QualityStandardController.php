<?php

namespace App\Http\Controllers\Frontend;

use App\QualityStandard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QualityStandardController extends Controller
{
	public function index()
	{
		$data['quality'] = QualityStandard::all();
		return view('front.pages.quality_standard.index', $data);
	}
}
