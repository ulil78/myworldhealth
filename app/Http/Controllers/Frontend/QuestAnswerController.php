<?php

namespace App\Http\Controllers\Frontend;

use App\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestAnswerController extends Controller
{
	public function index()
	{
		$data['faq'] = Faq::all();
		return view('front.pages.question_answer.index', $data);
	}
}
