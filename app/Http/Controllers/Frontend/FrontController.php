<?php

namespace App\Http\Controllers\Frontend;
// First Category Modal
use App\AdditionalService;
use App\FirstCategory;
use App\SecondCategory;
use App\WhyBooking;
use App\Partner;
use App\Hospital;
use App\HospitalImage;
use App\Review;
use App\User;
use Session;
use Auth;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class FrontController extends Controller
{
// Pages 
	public function beranda()
	{
		$data['why'] = WhyBooking::all();
		$data['partner'] = Partner::where('status', 'true')->get();
		// $data['review'] = Review::with('users')
		//                         ->with('hospital')->where('status', 'true')
  //                               ->limit(4)
  //                               ->get();
        $data['hospital'] = HospitalImage::with('hospital')->where('status', 'true')
        							  ->orderBy('id', 'desc')
        							  ->take(4)
        							  ->get();

		return view('front.pages.beranda.index', $data);
	}

	public function why_mwh()
	{
		$data['why'] = WhyBooking::all();
		return view('front.pages.why_mwh.index', $data);
	}

	public function show_hospital($slug)
	{   // Hospital Program First
        $hospital_detail = Hospital::with('images')
							->where([
							    ['status', '=', 'true'],
							    ['slug', '=', $slug],
							])->first();
		// dd($hospital_detail);
		return view('front.pages.beranda.show_hospital')->with('hospital_detail', $hospital_detail);
	}
// Function Show
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
		if($third_category) {
		    // Hospital Program
	        $hospital_program = \DB::table('hospitals')
			->join('hospital_departments', 'hospitals.id', '=', 'hospital_departments.hospital_id')
			->join('hospital_programs', 'hospital_departments.id', '=', 'hospital_programs.hospital_department_id')
			->join('thrid_categories', 'hospital_programs.thrid_category_id', '=', 'thrid_categories.id')
			->join('cities', 'cities.id', '=', 'hospitals.city_id')
			->join('countries', 'countries.id', '=', 'cities.country_id')
			->select(// Hospital
					 'hospitals.id as id',
					 'hospitals.name as name',
				 	 'hospitals.slug as hospitals_slug',
					 'hospitals.address as address',
					 'hospitals.description as description',
					 'hospitals.phone as phone',
					 // Category 3
					 'thrid_categories.name as thrid_categories_name',
					 'thrid_categories.slug as thrid_categories_slug',
					 // Program
					 'hospital_programs.id as hospital_programs_id',
					 'hospital_programs.name as hospital_programs_name',
					 'hospital_programs.description as hospital_programs_description',
					 'hospital_programs.slug as hospital_programs_slug',
					 'hospital_programs.price as hospital_programs_price',
					 // Dept
					 'hospital_departments.name as hospital_departments_name',
					 // 'hospital_departments.description as hospital_departments_description ',
					 // City & Country
					 'cities.name as cities_name',
					 'countries.name as countries_name')
			->where([
			    ['hospital_programs.status', '=', 'true'],
			    ['hospital_programs.thrid_category_id', '=', $third_category->thrid_categories_id],
			])
			->get();
			// dd($hospital_program);
			// Return View
			return view('front.pages.beranda.show_category')->with('category', $category)
															->with('third_category', $third_category)
															->with('hospital_program', $hospital_program);
		}else{
			// Return View
			return view('front.pages.beranda.components.error.error_show_category');
		}
	}
// Function Detail
	public function show_detail_category($id)
	{
	    // Hospital Program First
        $hospital_detail = \DB::table('hospitals')
		->join('hospital_departments', 'hospitals.id', '=', 'hospital_departments.hospital_id')
		->join('hospital_programs', 'hospital_departments.id', '=', 'hospital_programs.hospital_department_id')
		->join('first_categories', 'hospital_programs.first_category_id', '=', 'first_categories.id')
		->join('second_categories', 'hospital_programs.second_category_id', '=', 'second_categories.id')
		->join('thrid_categories', 'hospital_programs.thrid_category_id', '=', 'thrid_categories.id')
		->join('cities', 'cities.id', '=', 'hospitals.city_id')
		->join('countries', 'countries.id', '=', 'cities.country_id')
		->select(// Hospital
				 'hospitals.id as id',
				 'hospitals.name as name',
				 'hospitals.address as address',
				 'hospitals.description as description',
				 'hospitals.phone as phone',
				 'hospitals.pic as pic',
				 // Category
				 'first_categories.name as first_categories_name',
				 'second_categories.name as second_categories_name',
				 'second_categories.slug as second_categories_slug',
				 'thrid_categories.id as thrid_categories_id',
				 'thrid_categories.name as thrid_categories_name',
				 'thrid_categories.slug as thrid_categories_slug',
				 // Hospital Image
				 // Program
				 'hospital_programs.id as hospital_programs_id',
				 'hospital_programs.name as hospital_programs_name',
				 'hospital_programs.slug as hospital_programs_slug',
				 'hospital_programs.price as hospital_programs_price',
				 'hospital_programs.duration as hospital_programs_duration',
				 'hospital_programs.description as hospital_programs_description',
				 // Dept
				 'hospital_departments.name as hospital_departments_name',
				 // 'hospital_departments.description as hospital_departments_description ',
				 // City & Country
				 'cities.name as cities_name',
				 'countries.name as countries_name')
		->where([
		    ['hospital_programs.status', '=', 'true'],
		    ['hospital_programs.id', '=', $id],
		])
		->first();
	    // Additional Service
	    // 
	    // Hospital Program All
        $hospital_program_all = \DB::table('hospitals')
		->join('hospital_departments', 'hospitals.id', '=', 'hospital_departments.hospital_id')
		->join('hospital_programs', 'hospital_departments.id', '=', 'hospital_programs.hospital_department_id')
		->join('first_categories', 'hospital_programs.first_category_id', '=', 'first_categories.id')
		->join('second_categories', 'hospital_programs.second_category_id', '=', 'second_categories.id')
		->join('thrid_categories', 'hospital_programs.thrid_category_id', '=', 'thrid_categories.id')
		->join('cities', 'cities.id', '=', 'hospitals.city_id')
		->join('countries', 'countries.id', '=', 'cities.country_id')
		->select(// Hospital
				 'hospitals.id as id',
				 'hospitals.slug as slug',
				 'hospitals.name as name',
				 'hospitals.address as address',
				 // Program
				 'hospital_programs.id as hospital_programs_id',
				 'hospital_programs.name as hospital_programs_name',
				 'hospital_programs.price as hospital_programs_price',
				 // Category
				 'thrid_categories.slug as thrid_categories_slug',
				 // Dept
				 'hospital_departments.name as hospital_departments_name',
				 // 'hospital_departments.description as hospital_departments_description ',
				 // City & Country
				 'cities.name as cities_name',
				 'countries.name as countries_name')
		->where([
		    ['hospital_programs.status', '=', 'true'],
			['hospital_programs.thrid_category_id', '=', $hospital_detail->thrid_categories_id],
		])
		->get();
		// Return View
		return view('front.pages.beranda.show_detail_category')
		->with('hospital_detail', $hospital_detail)
		->with('hospital_program_all', $hospital_program_all);
	}
// BUG -----------------------------------------
	public function search_result(Request $request)
	{
        $this->validate(request(), [
            'search'   => 'required|string',
        ]);
        $category = $request->get('category');
        $search = $request->get('search');
        // dd($category);
        if($category == 'service'){
        	$query = DB::table('hospitals')
					->join('hospital_departments', 'hospitals.id', '=', 'hospital_departments.hospital_id')
					->join('hospital_programs', 'hospital_departments.id', '=', 'hospital_programs.hospital_department_id')
					->join('first_categories', 'hospital_programs.first_category_id', '=', 'first_categories.id')
					->join('second_categories', 'hospital_programs.second_category_id', '=', 'second_categories.id')
					->join('thrid_categories', 'hospital_programs.thrid_category_id', '=', 'thrid_categories.id')
					->join('cities', 'cities.id', '=', 'hospitals.city_id')
					->join('countries', 'countries.id', '=', 'cities.country_id')
					->select(// Hospital
							 'hospitals.id as id',
							 'hospitals.name as name',
							 'hospitals.address as address',
							 // Program
							 'hospital_programs.id as hospital_programs_id',
							 'hospital_programs.name as hospital_programs_name',
							 'hospital_programs.description as hospital_programs_description',
							 'hospital_programs.price as hospital_programs_price',
							 // Dept
							 'hospital_departments.name as hospital_departments_name',
							 // 'hospital_departments.description as hospital_departments_description ',
							 // Category
				 			 'second_categories.name as second_categories_name',
				 			 'second_categories.description as second_categories_description',
							 // City & Country
							 'cities.name as cities_name',
							 'countries.name as countries_name')
					->where([
					    ['hospital_programs.status', '=', 'true'],
					    ['hospital_programs.name', 'like', $search.'%'],					   
					])
					->get();
					// Set session
					$request->session()->put('search_result', $search);
					// Get session
					$result = $request->session()->get('search_result');
			return view('front.pages.beranda.show_result')
			->with('query', $query)
			->with('search_result', $result);
        }elseif($category == 'hospital'){
        	$query = DB::table('hospitals')
					->join('hospital_departments', 'hospitals.id', '=', 'hospital_departments.hospital_id')
					->join('hospital_programs', 'hospital_departments.id', '=', 'hospital_programs.hospital_department_id')
					->join('first_categories', 'hospital_programs.first_category_id', '=', 'first_categories.id')
					->join('second_categories', 'hospital_programs.second_category_id', '=', 'second_categories.id')
					->join('thrid_categories', 'hospital_programs.thrid_category_id', '=', 'thrid_categories.id')
					->join('cities', 'cities.id', '=', 'hospitals.city_id')
					->join('countries', 'countries.id', '=', 'cities.country_id')
					->select(// Hospital
							 'hospitals.id as id',
							 'hospitals.name as name',
							 'hospitals.address as address',
							 // Program
							 'hospital_programs.id as hospital_programs_id',
							 'hospital_programs.name as hospital_programs_name',
							 'hospital_programs.description as hospital_programs_description',
							 'hospital_programs.price as hospital_programs_price',
							 // Dept
							 'hospital_departments.name as hospital_departments_name',
							 // 'hospital_departments.description as hospital_departments_description ',
							 // Category
				 			 'second_categories.name as second_categories_name',
				 			 'second_categories.description as second_categories_description',
							 // City & Country
							 'cities.name as cities_name',
							 'countries.name as countries_name')
					->where([
					    ['hospital_programs.status', '=', 'true'],
					    ['hospitals.name',  'like', $search.'%' ],
					])
					->get();
					// Set session
					$request->session()->put('search_result', $search);
					// Get session
					$result = $request->session()->get('search_result');
			return view('front.pages.beranda.show_result')
			->with('query', $query)
			->with('search_result', $result);
        }elseif($category == 'city'){
        	$query = DB::table('hospitals')
					->join('hospital_departments', 'hospitals.id', '=', 'hospital_departments.hospital_id')
					->join('hospital_programs', 'hospital_departments.id', '=', 'hospital_programs.hospital_department_id')
					->join('first_categories', 'hospital_programs.first_category_id', '=', 'first_categories.id')
					->join('second_categories', 'hospital_programs.second_category_id', '=', 'second_categories.id')
					->join('thrid_categories', 'hospital_programs.thrid_category_id', '=', 'thrid_categories.id')
					->join('cities', 'cities.id', '=', 'hospitals.city_id')
					->join('countries', 'countries.id', '=', 'cities.country_id')
					->select(// Hospital
							 'hospitals.id as id',
							 'hospitals.name as name',
							 'hospitals.address as address',
							 // Program
							 'hospital_programs.id as hospital_programs_id',
							 'hospital_programs.name as hospital_programs_name',
							 'hospital_programs.description as hospital_programs_description',
							 'hospital_programs.price as hospital_programs_price',
							 // Dept
							 'hospital_departments.name as hospital_departments_name',
							 // 'hospital_departments.description as hospital_departments_description ',
							 // Category
				 			 'second_categories.name as second_categories_name',
				 			 'second_categories.description as second_categories_description',
							 // City & Country
							 'cities.name as cities_name',
							 'countries.name as countries_name')
					->where([
					    ['hospital_programs.status', '=', 'true'],
					    ['cities.name', 'like', $search.'%'],
					 ])
					->get();
					// Set session
					$request->session()->put('search_result', $search);
					// Get session
					$result = $request->session()->get('search_result');
			return view('front.pages.beranda.show_result')
			->with('query', $query)
			->with('search_result', $result);
        }else{
        	$query = DB::table('hospitals')
					->join('hospital_departments', 'hospitals.id', '=', 'hospital_departments.hospital_id')
					->join('hospital_programs', 'hospital_departments.id', '=', 'hospital_programs.hospital_department_id')
					->join('first_categories', 'hospital_programs.first_category_id', '=', 'first_categories.id')
					->join('second_categories', 'hospital_programs.second_category_id', '=', 'second_categories.id')
					->join('thrid_categories', 'hospital_programs.thrid_category_id', '=', 'thrid_categories.id')
					->join('cities', 'cities.id', '=', 'hospitals.city_id')
					->join('countries', 'countries.id', '=', 'cities.country_id')
					->select(// Hospital
							 'hospitals.id as id',
							 'hospitals.name as name',
							 'hospitals.address as address',
							 // Program
							 'hospital_programs.id as hospital_programs_id',
							 'hospital_programs.name as hospital_programs_name',
							 'hospital_programs.description as hospital_programs_description',
							 'hospital_programs.price as hospital_programs_price',
							 // Dept
							 'hospital_departments.name as hospital_departments_name',
							 // 'hospital_departments.description as hospital_departments_description ',
							 // Category
				 			 'second_categories.name as second_categories_name',
				 			 'second_categories.description as second_categories_description',
							 // City & Country
							 'cities.name as cities_name',
							 'countries.name as countries_name')
					->where([
					    ['hospital_programs.status', '=', 'true'],	    
					])
					->orWhere('cities.name', 'like', $search.'%')
					->orWhere('hospitals.name', 'like', $search.'%')
					->get();
					// Set session
					$request->session()->put('search_result', $search);
					// Get session
					$result = $request->session()->get('search_result');
			return view('front.pages.beranda.show_result')
			->with('query', $query)
			->with('search_result', $result);
        }
	}
	public function search_filter(Request $request)
	{
        // $this->validate(request(), [
        //     'search_city'   => 'required',
        //     'search_country'   => 'required',
        // ]);
        $search_city = $request->get('search_city');
        $search_country = $request->get('search_country');
    	$query = DB::table('hospitals')
				->join('hospital_departments', 'hospitals.id', '=', 'hospital_departments.hospital_id')
				->join('hospital_programs', 'hospital_departments.id', '=', 'hospital_programs.hospital_department_id')
				->join('first_categories', 'hospital_programs.first_category_id', '=', 'first_categories.id')
				->join('second_categories', 'hospital_programs.second_category_id', '=', 'second_categories.id')
				->join('thrid_categories', 'hospital_programs.thrid_category_id', '=', 'thrid_categories.id')
				->join('cities', 'cities.id', '=', 'hospitals.city_id')
				->join('countries', 'countries.id', '=', 'cities.country_id')
				->select(// Hospital
						 'hospitals.id as id',
						 'hospitals.name as name',
						 'hospitals.address as address',
						 // Program
						 'hospital_programs.id as hospital_programs_id',
						 'hospital_programs.name as hospital_programs_name',
						 'hospital_programs.description as hospital_programs_description',
						 'hospital_programs.price as hospital_programs_price',
						 // Dept
						 'hospital_departments.name as hospital_departments_name',
						 // 'hospital_departments.description as hospital_departments_description ',
						 // Category
			 			 'second_categories.name as second_categories_name',
			 			 'second_categories.description as second_categories_description',
						 // City & Country
						 'cities.name as cities_name',
						 'countries.name as countries_name')
				->where([
				    ['hospital_programs.status', '=', 'true'],		    
				])
				->orWhere('cities.name', 'like', $search_city.'%')
				->orWhere('countries.name', 'like', $search_country.'%')
				->get();
				$request->session()->flush();
				// Set session
				$request->session()->put('search_city', $search_city);
				$request->session()->put('search_country', $search_country);
				// Get session
				$search_city = $request->session()->get('search_city');
				$search_country = $request->session()->get('search_country');
		return view('front.pages.beranda.show_filter_result')
		->with('search_city', $search_city)
		->with('search_country', $search_country)
		->with('query', $query);
	}

	public function process_booked(Request $request)
	{
        $this->validate(request(), [
            'start_date'   => 'required|date',
            'interpreter_qty'   => 'required',
            'translation_med_document_qty'   => 'required',
            'transfer_arrival_id'   => 'required',
            'transfer_arrival_type_id'   => 'required',
            'transfer_return_id'   => 'required',
            'transfer_return_type_id'   => 'required',
        ]);

      	$input = Input::all();
        // Session
        \Session::pull('data', $input);
		dd($input);
        $user = User::where('email', Auth::user()->email)->first();
        // dd($user);
        if(count($user) > 0){ // Cek
		    // Hospital Program
	        $hospital_detail = \DB::table('hospitals')
			->join('hospital_departments', 'hospitals.id', '=', 'hospital_departments.hospital_id')
			->join('hospital_programs', 'hospital_departments.id', '=', 'hospital_programs.hospital_department_id')
			->join('first_categories', 'hospital_programs.first_category_id', '=', 'first_categories.id')
			->join('second_categories', 'hospital_programs.second_category_id', '=', 'second_categories.id')
			->join('thrid_categories', 'hospital_programs.thrid_category_id', '=', 'thrid_categories.id')
			->join('cities', 'cities.id', '=', 'hospitals.city_id')
			->join('countries', 'countries.id', '=', 'cities.country_id')
			->select(// Hospital
					 'hospitals.id as id',
					 'hospitals.name as name',
					 'hospitals.address as address',
					 'hospitals.description as description',
					 'hospitals.phone as phone',
					 'hospitals.pic as pic',
					 'first_categories.name as first_categories_name',
					 'second_categories.name as second_categories_name',
					 'second_categories.slug as second_categories_slug',
					 'thrid_categories.name as thrid_categories_name',
					 // Hospital Image
					 // Program
					 'hospital_programs.id as hospital_programs_id',
					 'hospital_programs.name as hospital_programs_name',
					 'hospital_programs.price as hospital_programs_price',
					 // Dept
					 'hospital_departments.name as hospital_departments_name',
					 // 'hospital_departments.description as hospital_departments_description ',
					 // City & Country
					 'cities.name as cities_name',
					 'countries.name as countries_name')
			->where([
			    ['hospital_programs.id', '=', $hospital_program_id],
			    ['hospital_programs.status', '=', 'true'],
			])
			->first();
			return view('front.pages.beranda.show_booked')
			->with('hospital_detail', $hospital_detail);
        }
        else {
        	return redirect()->route('beranda')->with('alert','Email not registered!');
        }
	}

	public function process_detail_booked(Request $request)
	{

	}
}
