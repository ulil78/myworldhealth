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
		$data['review'] = Review::with('users')
		                        ->with('hospital')->where('status', 'true')
                                ->limit(3)
                                ->get();
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
        $third_category = \DB::table('thrid_categories')
					->join('second_categories', 'second_categories.id', '=', 'thrid_categories.second_category_id')
					->select('thrid_categories.id as thrid_categories_id', 'thrid_categories.name as thrid_categories_name')
					->where('second_categories.id', $category->id)
					->first();
					 // dd($third_category);
	    // Hospital Program
        $hospital_program = \DB::table('hospitals')
					->join('cities', 'cities.id', '=', 'hospitals.city_id')
					->join('countries', 'countries.id', '=', 'cities.country_id')
					->join('reviews', 'hospitals.id', '=', 'reviews.hospital_id')
					->join('hospital_departments', 'hospitals.id', '=', 'hospital_departments.hospital_id')
					->join('hospital_programs', 'hospital_departments.id', '=', 'hospital_programs.hospital_department_id')
					->join('first_categories', 'first_categories.id', '=', 'hospital_programs.first_category_id')
					->join('second_categories', 'second_categories.id', '=', 'hospital_programs.second_category_id')
					->join('thrid_categories', 'thrid_categories.id', '=', 'hospital_programs.thrid_category_id')
					->select(// Hospital
							 'hospitals.id as id',
							 'hospitals.name as name',
							 'hospitals.address as address',
							 'hospitals.phone as phone',
							 // Hospital Departments
							 'hospital_departments.name as hospital_departments_name',
							 'hospital_departments.description as hospital_departments_description',
							 'cities.name as cities_name',
							 'countries.name as countries_name',
							 'reviews.star as reviews_star')
					->where([
					    ['hospital_programs.status', '=', 'true'],
					    ['thrid_categories.id', '=', $third_category->id],
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
        $hospital_program = \DB::table('hospitals')
					->join('hospital_departments', 'hospitals.id', '=', 'hospital_departments.hospital_id')
					->join('hospital_programs', 'hospital_departments.id', '=', 'hospital_programs.hospital_department_id')
					->join('first_categories', 'first_categories.id', '=', 'hospital_programs.first_category_id')
					->join('second_categories', 'second_categories.id', '=', 'hospital_programs.second_category_id')
					->join('thrid_categories', 'thrid_categories.id', '=', 'hospital_programs.thrid_category_id')
					->select(// Hospital
							 'hospitals.id as id',
							 'hospitals.name as name',
							 'hospitals.address as address',
							 'hospitals.phone as phone',
							 // Hospital Departments
							 'hospital_departments.name as hospital_departments_name',
							 'hospital_departments.description as hospital_departments_description',
							 // Hospital Program
							 'hospital_programs.description as description',  
							 'hospital_programs.price as price',  
							 'hospital_programs.discount as discount',  
							 'hospital_departments.name as hospital_departments_name')
					->where([
					    ['hospital_programs.status', '=', 'true'],
					    ['thrid_categories.id', '=', $third_category->thrid_categories_id],
					])->get();
		return view('front.pages.beranda.detail');
	}
}
