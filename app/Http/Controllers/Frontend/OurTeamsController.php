<?php

namespace App\Http\Controllers\Frontend;

use App\OurTeam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OurTeamsController extends Controller
{
	public function index()
	{
		$data['ourteam'] = OurTeam::all();
		return view('front.pages.our_teams.index', $data);
	}
}
