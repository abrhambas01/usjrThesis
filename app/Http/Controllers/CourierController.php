<?php


/**
 * @created by : Abrham Bas
 * API is built for Mypharma project.
 */

namespace App\Http\Controllers;
use App\Core\Traits\RetrievesRecords;
use App\SeniorCitizen;
use App\CustomerParcelDelivery;
use Auth ; 
use DB ; 
use Carbon\Carbon ;
use App\Core\Queries\DeliveriesQueries ; 
use App\Core\Queries\ChartsQueries ; 
use Request  ;
use App\Parcel ; 
use App\User ;


class CourierController extends Controller {

  public function dashboard() {
    app('debugbar')->disable();
    // auth()->user()->courier->parcel->courier ;  
    // $deliveriesForToday = 
    return view('courier')->with('username',Auth::user()->name);
  }




  public function couriersHomePage(){
    app('debugbar')->disable();
    
    return view('courier.index');
  }

  public function home()
  {
    app('debugbar')->disable();
    return view('courier');
  }

  
  public function getTodaysDeliveries()
  {
    app('debugbar')->disable();
    return view('courier.index');
  }





  /*
  |-------------------------------------------------------------------------------
  | Get The parcels to be packed.. 
  |-------------------------------------------------------------------------------
  | URL:           api/v1/parcels/{courier}/to-deliver
  | Method:         GET
  | Description:    Gets the parcels to be delivered. then pack it then mark if check or do not check..
  | Parameters: NONE ..
  */
  public function getTodaysParcelsToPack()
  {
    // $parcels = $query->getParcelsForChecking($courier_id);
    $today = Carbon::today(); 

    $id = auth()->user()->courier->id ;  

    $customer_parcel = Parcel::with('owner')
    ->join('parcel_medicines','parcels.id','=','parcel_medicines.parcel_id')->where([ 
      ['courier_id','=',$id ],
      ['packed','=','0'],
      ['delivery_date','=',$today]])
    ->get()
    ->groupBy('parcel_id');

    return response()->json($customer_parcel) ;


  } 


  /*
  |-------------------------------------------------------------------------------
  | Marks the parcels to be packed as checked [ OFFICIAL API USED.]
  |-------------------------------------------------------------------------------
  | URL:            api/v1/parcels/markAsCheck/{id}
  | Method:         POST
  | Description:    Gets the parcels to be delivered. then pack it then mark if check or do not check..
  | Parameters:
  |   $id   -> ID of the user's authenticated..
  */

  public function updateParcelStatus($id)
  {
    $result = Parcel::find($id);

    if ($result->packed == 0 ) {
      $result->packed = 1;
    }
    else {
      $result->packed = 0 ;
    }
    $result->save() ; 
  }

   /*
  |-------------------------------------------------------------------------------
  | Marks the parcels to be packed as not yet packed 
  |-------------------------------------------------------------------------------
  | URL:            api/v1/parcels/markAsCheck/{id}
  | Method:         POST
  | Description:    Gets the parcels to be delivered. then pack it then mark if check or do not check..
  | Parameters:
  |   $id   -> ID of the user's authenticated..
  */
  public function markasUncheck($id)
  {
    $result = Parcel::find($id);
    $result->packed = '0' ;
    $result->save() ; 
  }



  public function deliveryAddresses(){


    $today = Carbon::today(); 

    $id = auth()->user()->courier->id ;  

      // ->join('parcel_medicines','parcels.id','=','parcel_medicines.parcel_id')
    $customer_parcel = DB::table('parcels')->join('seniorcitizens','seniorcitizens.id','=','parcels.seniorcitizen_id')  
    ->where([ 
      ['courier_id','=',$id],
      ['delivery_date','=',$today]])
    ->select("address as address","lat as lat","lng as lng","parcels.id as id")
    ->get();
    // ->groupBy('parcel_id');

    // ->select('owner.address as address','owner.lat as lat','owner.lng as lng')
    
    return response()->json($customer_parcel);
  }

  public function saveRoutes(Request $request)
  {
    // $parcels = $query->getParcelsForChecking($courier_id);


       return response()->json($request);
  } 






  public function getLocationOfTheSeniorCitizens(DeliveriesQueries $query)
  {   
    $ownersInformation = $query->getInformationOfTheSeniorCitizens();
    return response()->json($ownersInformation);

  }

  public function getCurrentUserInformation()
  {
    $userId = Auth::user()->id ;
    $usersInfo =  auth()->user()->info ;  
    return response()->json($usersInfo);
  } 



  public function retrieveParcels(DeliveriesQueries $query)
  {
    $parcels = $query->retrieveTodaysDeliveries();

    // return response()->json($parcels);

    return $parcels;

  } 

  public function getDeliveriesInformation(DeliveriesQueries $query){
    $owner = $query->getDeliveryOwnersAddress() ;
    return response()->json($owner);
    // return response()->json($parcels);
  } 

  public function changeState(Request $request, Parcel $parcel )
  {
    $result = Parcel::find($id) ; 
    $parcel->packed = $request->state ; 
    $parcel->save() ;
  }

  public function changeParcelStatus(Request $request)
  { 
    $parcel_id =  request('parcel_id');  

  }

  public function DeliveryCharts()
  {

    $id = auth()->user()->id ; 
    // $queryCount = DB::raw(count()) ; 

  }











}
