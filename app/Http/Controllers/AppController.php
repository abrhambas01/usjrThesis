<?php

namespace App\Http\Controllers;

use App\Parcel ; 

use Illuminate\Http\Request;

use Auth ; 

use App\User ; 

use App\Role ; 

use DB ;

use App\Order ; 

use App\SeniorCitizenMedicine ; 

use App\UserInformation ; 

class AppController extends Controller
{

	public function __construct(){
		$this->middleware('auth')->only(['dashboard','contactAdmin']);
	}

	public function socialworkers(){
		return User::with('info')->get();	 
	}


	public function getRoles(){
		return Role::select('id','name')->exceptadmin()->get() ; 
	}


	public function mapping()
	{
		return view('tsp_directions.directions') ;
	}



	public function parcelStatus()
	{
		return Parcel::with('deliveryStatus')->get();
	}

	public function seniorCitizenNumbersForDeliveryTomorrow()
	{

	}

	public function adminProfilePhoto($id)
	{
		dd($id);
	}

	public function userProfile($id)
	{	
		$user = User::with('info')->findOrFail($id);
		return view('account.show_profile',compact('user'));
	}



	public function submitProfile($id, Request $request)
	{	

		// Get the Users Id..

		// Upload the photo to the server..  

		// Override the 

		// dd($request->all());

		// $this->getUploadedFile($)


	}


	public function testQueries(User $user){
		// $user = User::with(['role','barangay'])


		//one to one..
		$users = $user->has('info')
		->with('info')
		->where('name','like','E%')
		->get();

		// with many..

		$users_information = $user->with(['info','barangay','role'])->get();

		return $users_information->reverse()->toArray();

		// return view('pages.db_queries',compact('users_information'));

	}


	public function contactAdmin(){
		return view('contact._admin');
	}


	public function users(){
		return User::with('info')->get();	 
	}

	

	public function barangays()
	{
		$districts = DB::table('barangays')->get();  
		return response()->json($districts);
	}


	public function getDosages()
	{
		$districts = Dosage::all();  
		return $districts ;
	}




	public function autoComplete(){
		return view('geo-position'); 
	}


	public function postMessage(Request $request) {
		$this->validate($request,[ 
			'user_id' => 'required|min:3' ,
			'title' => 'required|min:3',
			'message ' => 'required' , 
		])  ; 

		$feedback = Feedback::create(['user_id' => auth()->id , 
			'title' => $request->title, 
			'feedback_body' => $request->body
		]);

		$feedback->save() ; 

	}

	public function checkseniorcitizenid(Request $request) {
		$id = $request->get('id') ; 
		$count = DB::table('senior_citizens_rosters')->where('id',$id)->count() ; 
		return response($count) ;  
	}

	/**
	 * Save users information .
	 */
	public function saveUsersInfo(Request $request,UserInformation $userInfo){
		if($request->user_id !== Auth::user()->id) {
			return response()->json('Unauthorized', 401);
		}

		$this->validate($request,[
			'user_id' => 'required|numeric',
			'first_name' => 'required|alpha',
			'middle_name' => 'required|alpha',
			'last_name' => 'required|alpha',
			// 'picture' => 'required|mimes:jpeg,bmp,png,gif' ,
			'work_address' => 'required',
			'mobile_phone' => 'required',
			'postal_code' => 'required' , 
			'street_name' => 'required', 
		]);

		$user = Auth::user()->info()->update([
			'first_name' => request('first_name'),
			'middle_name' => request('middle_name'),
			'last_name'=> request("last_name"),
			'house_number' =>  request("house_number"),
			'mobile_phone' => request("mobile_phone"),
			'postal_code' => request("postal_code"),
			'work_address' => request("work_address"),
			'company' => request("company"),
			'alternate_email' => request("alternate_email"),
		]);

		return response()->json($user);
	}



	public function main() 
	{
		return view('layouts.app2');
	} 



}
