<?php

namespace App\Http\Controllers\Frontend;
// First Category Modal
use App\FirstCategory;
use App\SecondCategory;
use App\WhyBooking;
use App\Partner;
use App\Review;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontController extends Controller
{
// Pages 
	public function beranda()
	{
		$data['why'] = WhyBooking::all();
		$data['partner'] = Partner::where('status', 'true')->get();
		$data['review'] = Review::with('users')->with('hospital')->where('status', 'true')->get();
		return view('front.pages.beranda.index', $data);
	}

	public function why_mwh()
	{
		$data['why'] = WhyBooking::all();
		return view('front.pages.why_mwh.index', $data);
	}
// Function
	public function show_category($slug)
	{
		// Second Category
        $category = SecondCategory::where('slug', $slug)->first();
        // Third Category 
        $third_category = \DB::table('first_categories')
					->join('second_categories', 'second_categories.first_category_id', '=', 'first_categories.id')
					->select('second_categories.id as second_category_id', 'first_categories.name as first_category_name')
					->where('second_categories.id', $category->id)
					->first();
	    // Hospital Program
        $hospital_program = \DB::table('hospital_programs')
					->join('hospital_departments', 'hospital_departments.id', '=', 'hospital_programs.hospital_department_id')
					->join('first_categories', 'first_categories.id', '=', 'hospital_programs.first_category_id')
					->join('second_categories', 'second_categories.id', '=', 'hospital_programs.second_category_id')
					->join('thrid_categories', 'thrid_categories.id', '=', 'hospital_programs.thrid_category_id')
					->select('hospital_programs.id as id',
							 'hospital_programs.name as name',
							 'hospital_programs.description as description',  
							 'hospital_programs.price as price',  
							 'hospital_programs.discount as discount',  
							 'hospital_departments.name as hospital_departments_name',
							 'first_categories.name as first_categories_name',
							 'second_categories.name as second_categories_name',
							 'thrid_categories.name as thrid_categories_name')
					->where([
					    ['hospital_programs.status', '=', 'true'],
					    ['second_categories.id', '=', $category->id],
					])->get();
					// dd($hospital_program);
		// Return View
		return view('front.pages.beranda.show_category')->with('category', $category)
														->with('third_category', $third_category)
														->with('hospital_program', $hospital_program);
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
