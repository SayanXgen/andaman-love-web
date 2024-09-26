<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ShipMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\FerrySchedul;
use App\Models\FerryLocation;
use App\Models\FerrySchedulePrice;
use Illuminate\Support\Facades\Http; 
use Session;
 
class FerrybookingController extends Controller
{
    public function ferry_booking(){
        $ferry_locations = FerryLocation::where('status','Y')->get();
        return view('home.index',compact('ferry_locations'));
    }


   public function ferry_booking_search(Request $request){
    
    if (!$request->has(['form_location', 'to_location', 'date'])) {
        abort(404);
    }

    $ferry_locations = FerryLocation::all(); // Fetch locations from the database

        Session::forget('trip_data');
        Session::forget('ferry_list');
        Session::forget('booking_data');
        Session::forget('booking_id');
        Session::forget('trip3_booking_id');
        Session::forget('trip2_booking_id');
        Session::forget('trip_type');

        $data['ferry_locations'] = DB::table('ferry_locations')->where('status','Y')->get();

        $fromLocation = $request->form_location ;
        $toLocation = $request->to_location;
        $trip_type = $request->input('trip_type');
        $date = date('Y-m-d', strtotime( str_replace('/', '-',  $request->input('date'))));
        $dateCarbon=date('Y-m-d', strtotime($date));

        $no_of_passenger = $request->input('passenger');
        $infant = $request->input('infant');
    
        $oneHourAgo = Carbon::now()->subHour();
        $adminShipSchedules = FerrySchedul::with([
                    'ferryPrices' => function ($query) {
                        $query->orderBy('price', 'asc');
                    },
                    'fromLocation',
                    'toLocation',
                    'ship',
                    'ship.images',
                    'ferryPrices.class'
                ])
                ->where('from_location', $fromLocation)
                ->where('to_location', $toLocation)
                ->where('status', 'Y')
                ->where('from_date', '<=', $date)
                ->where('to_date', '>=', $date)
                ->when($date && $date == now()->format('Y-m-d'), function ($query) use ($oneHourAgo) {
                    return $query->where('departure_time', '>=', $oneHourAgo);
                })
                ->orderBy('departure_time')
                ->get()->toArray();

        
        // print_r($adminShipSchedules);die;


        if($adminShipSchedules){
            foreach($adminShipSchedules as $key=>$val){
                $adminShipSchedules[$key]['ship_name'] = 'Admin';
            }
        }
    
        $fromLocationTitle = FerryLocation::where('id',  $fromLocation)->first();
        $toLocationTitle = FerryLocation::where('id', $toLocation)->first();
    
        $data['route_titles'] = [
            'from_location' => $fromLocationTitle->title,
            'to_location' => $toLocationTitle->title,
        ];

      
        // ==================================== from api data  for single Trip========================================================
        $fromN='';
        $toN='';

        if($fromLocation==1){
            $fromN='Port Blair';
        } elseif($fromLocation==2){
            $fromN='Swaraj Dweep';
        } elseif($fromLocation==3){
            $fromN='Shaheed Dweep';
        }

        if($toLocation==1){
            $toN='Port Blair';
        } elseif($toLocation==2){
            $toN='Swaraj Dweep';
        } elseif($toLocation==3){
            $toN='Shaheed Dweep';
        }

        $data2 = array(
            'date' => date('d-m-Y', strtotime($date)),
            'from' => $fromN,
            'to' =>  $toN,
        );
 
        $ship = ShipMaster::with('images')->where('id', 2)->get();
        $ship_image= $ship[0]['image'];

        $result2 = $this->nautikaApiCall('getTripData', $data2);

        $nautikaData = $result2->data;


        if(!empty( $nautikaData)){
            foreach($nautikaData as $key=>$val){
                $nautikaData[$key] = (array) $val;
                $nautikaData[$key]['ship_name'] = 'Nautika';
                $nautikaData[$key]['ship_image'] = $ship_image;
                $nautikaData[$key]['ship'] = $ship;
                $nautikaData[$key]['departure_time'] = str_pad($val->dTime->hour, 2, '0', STR_PAD_LEFT)  . ':' . $val->dTime->minute . ':00';
                $nautikaData[$key]['arrival_time'] = str_pad($val->aTime->hour, 2, '0', STR_PAD_LEFT)  . ':' . $val->aTime->minute . ':00';
                $nautikaData[$key]['b_class_seat_availibility'] = 0;
                $nautikaData[$key]['p_class_seat_availibility'] = 0;
                foreach($val->bClass as $key1=>$val1){
                    if($val1->isBooked==0 && $val1->isBlocked==0) {
                        $nautikaData[$key]['b_class_seat_availibility']++;
                    }
                }
                foreach($val->pClass as $key1=>$val1){
                    if($val1->isBooked==0 && $val1->isBlocked==0) {
                        $nautikaData[$key]['p_class_seat_availibility']++;
                    }
                }
            }
        }

        $data3 = array("data"=> array(
            "trip_type"=>"single_trip",
                "from_location" => $fromLocation,
                "travel_date" => date('Y-m-d', strtotime($date)),
                "no_of_passenger" => $no_of_passenger,
                "to_location" => $toLocation,
        ));
    
        $result = $this->makApiCall('schedule_search', $data3);

        // $ship=DB::table('ship_master')->select('image')->where('id', 1)->first();
        // $ship_image= $ship->image;
        
        $ship = ShipMaster::with('images')->where('id', 1)->get();
        $ship_image= $ship[0]['image'];

        $makData=[];
        if(!empty($result) && !empty($result->data)){
            $makFerry = $result->data;
            foreach($makFerry as $key=>$val){
                $makData[$val->id]['id'] =  $val->id;
                $makData[$val->id]['departure_time'] =  $val->departure_time;
                $makData[$val->id]['ship_name'] =  'Makruzz';
                $makData[$val->id]['ship_image'] = $ship_image;
                $makData[$val->id]['ship'] = $ship;
                $makData[$val->id]['ship_class'][] =  $val;
            }
        }

        if(!empty($nautikaData)){
            $allSchedule = array_merge($makData, $nautikaData);
        }else{
            $allSchedule = $makData;
        }

        $allSchedule3 = array_merge($allSchedule, $adminShipSchedules);

        $collection = collect($allSchedule3);
        // Sort the collection by 'time' column
        $sorted = $collection->sortBy(function ($item) {
            return strtotime($item['departure_time']);
        });

        $sortedArray = $sorted->values()->all();
        
        $data['apiScheduleData'] = $sortedArray; 

        // print_r($data['apiScheduleData']);die('test');




        // ********************************** for round 2 Trip ********************************************
        if($trip_type >= 2){
            $round1_from_location = $request->round1_from_location ;
            $round1_to_location = $request->input('round1_to_location') ;
            $date = date('Y-m-d', strtotime($request->input('round1_date'))) ;
            
            $oneHourAgo = Carbon::now()->subHour();
            $adminShipSchedules2 = FerrySchedul::with([
                        'ferryPrices' => function ($query) {
                            $query->orderBy('price', 'asc');
                        },
                        'fromLocation',
                        'toLocation',
                        'ship',
                        'ship.images',
                        'ferryPrices.class'
                    ])
                    ->where('from_location', $round1_from_location)
                    ->where('to_location', $round1_to_location)
                    ->where('status', 'Y')
                    ->where('from_date', '<=', $date)
                    ->where('to_date', '>=', $date)
                    ->when($date && $date == now()->format('Y-m-d'), function ($query) use ($oneHourAgo) {
                        return $query->where('departure_time', '>=', $oneHourAgo);
                    })
                    ->orderBy('departure_time')
                    ->get()->toArray();
            
                    

            if($adminShipSchedules2){
                foreach($adminShipSchedules2 as $key=>$val){
                    $adminShipSchedules2[$key]['ship_name'] = 'Admin';
                }
            }

            $round_1_from_location_title = FerryLocation::where('id',  $round1_from_location)->first();
            $round_1_to_location_title = FerryLocation::where('id', $round1_to_location)->first();

            $data['round1_route_titles'] = [
                'from_location' => $round_1_from_location_title->title ,
                'to_location' => $round_1_to_location_title->title ,
            ];    
            
            $round1_from_location_title='';
            $round1_to_location_title='';

            if($round1_from_location==1){
                $round1_from_location_title='Port Blair';
            } elseif($round1_from_location==2){
                $round1_from_location_title='Swaraj Dweep';
            } elseif($round1_from_location==3){
                $round1_from_location_title='Shaheed Dweep';
            }

            if($round1_to_location==1){
                $round1_to_location_title='Port Blair';
            } elseif($round1_to_location==2){
                $round1_to_location_title='Swaraj Dweep';
            } elseif($round1_to_location==3){
                $round1_to_location_title='Shaheed Dweep';
            }

            $data4 = array(
                'date' => date('d-m-Y', strtotime($date)),
                'from' => $round1_from_location_title,
                'to' => $round1_to_location_title
            );

            $ship = ShipMaster::with('images')->where('id', 2)->get();
            $ship_image= $ship[0]['image'];

            $nautika_result = $this->nautikaApiCall('getTripData', $data4);
            
            $nautikaData2 = $nautika_result->data;

            if(!empty( $nautikaData2)){
                foreach($nautikaData2 as $key=>$val){
                    $nautikaData2[$key] = (array) $val;
                    $nautikaData2[$key]['ship_name'] = 'Nautika';
                    $nautikaData2[$key]['ship_image'] = $ship_image;
                    $nautikaData2[$key]['ship'] = $ship;
                    $nautikaData2[$key]['departure_time'] = str_pad($val->dTime->hour, 2, '0', STR_PAD_LEFT)  . ':' . $val->dTime->minute . ':00';
                    $nautikaData2[$key]['arrival_time'] = str_pad($val->aTime->hour, 2, '0', STR_PAD_LEFT)  . ':' . $val->aTime->minute . ':00';
                    $nautikaData2[$key]['b_class_seat_availibility'] = 0;
                    $nautikaData2[$key]['p_class_seat_availibility'] = 0;
                    foreach($val->bClass as $key1=>$val1){
                        if($val1->isBooked==0 && $val1->isBlocked==0) {
                            $nautikaData2[$key]['b_class_seat_availibility']++;
                        }
                    }
                    foreach($val->pClass as $key1=>$val1){
                        if($val1->isBooked==0 && $val1->isBlocked==0) {
                            $nautikaData2[$key]['p_class_seat_availibility']++;
                        }
                    }
                }
            }

            $data5 = array("data"=> array(
                "trip_type"=>"single_trip",
                    "from_location" => $round1_from_location,
                    "travel_date" => date('Y-m-d', strtotime($date)),
                    "no_of_passenger" => $no_of_passenger,
                    "to_location" => $round1_to_location,
                ));

            $makruzz_result = $this->makApiCall('schedule_search', $data5);

            // $ship=DB::table('ship_master')->select('image')->where('id', 1)->first();
            // $ship_image= $ship->image;
            
            $ship = ShipMaster::with('images')->where('id', 1)->get();
            $ship_image= $ship[0]['image'];

            $makData2=[];
            if(!empty($makruzz_result) && !empty($makruzz_result->data)){
                $makFerry = $makruzz_result->data;
                foreach($makFerry as $key=>$val){
                    $makData2[$val->id]['id'] =  $val->id;
                    $makData2[$val->id]['departure_time'] =  $val->departure_time;
                    $makData2[$val->id]['ship_name'] =  'Makruzz';
                    $makData2[$val->id]['ship_image'] = $ship_image;
                    $makData2[$val->id]['ship'] = $ship;
                    $makData2[$val->id]['ship_class'][] =  $val;
                }
            }

            if(!empty($nautikaData2)){
                $allSchedule = array_merge($makData2, $nautikaData2);
            }else{
                $allSchedule = $makData2;
            }

            $allSchedule3 = array_merge($allSchedule, $adminShipSchedules2);

            $collection = collect($allSchedule3);
            // Sort the collection by 'time' column
            $sorted = $collection->sortBy(function ($item) {
                return strtotime($item['departure_time']);
            });

            $sortedArray = $sorted->values()->all();
            
            $data['apiScheduleData2'] = $sortedArray; 

        }


        // ********************************** for round 3 Trip ********************************************

        if($trip_type == 3){
              
            $data['ferry_locations'] = DB::table('ferry_locations')
            ->where('status','Y')
            ->get();

            $round2_from_location = $request->round2_from_location ;
            $round2_to_location = $request->input('round2_to_location') ;

            $date = date('Y-m-d', strtotime($request->input('round2_date')));
            $no_of_passenger = $request->input('passenger');
            $infant = $request->input('infant');
        
            $oneHourAgo = Carbon::now()->subHour();
            $adminShipSchedules3 = FerrySchedul::with([
                        'ferryPrices' => function ($query) {
                            $query->orderBy('price', 'asc');
                        },
                        'fromLocation',
                        'toLocation',
                        'ship',
                        'ship.images',
                        'ferryPrices.class'
                    ])
                    ->where('from_location', $round2_from_location)
                    ->where('to_location', $round2_to_location)
                    ->where('status', 'Y')
                    ->where('from_date', '<=', $date)
                    ->where('to_date', '>=', $date)
                    ->when($date && $date == now()->format('Y-m-d'), function ($query) use ($oneHourAgo) {
                        return $query->where('departure_time', '>=', $oneHourAgo);
                    })
                    ->orderBy('departure_time')
                    ->get()->toArray();
            
                  
            if($adminShipSchedules3){
                foreach($adminShipSchedules3 as $key=>$val){
                    $adminShipSchedules3[$key]['ship_name'] = 'Admin';
                }
            }

            $round_2_from_location_title = FerryLocation::where('id',  $round2_from_location)->first();
            $round_2_to_location_title = FerryLocation::where('id', $round2_to_location)->first();
        
            $data['round2_route_titles'] = [
                'from_location' => $round_2_from_location_title->title,
                'to_location' => $round_2_to_location_title->title,
            ];  
            
            $round2_from_location_title='';
            $round2_to_location_title='';

            if($round2_from_location==1){
                $round2_from_location_title='Port Blair';
            } elseif($round2_from_location==2){
                $round2_from_location_title='Swaraj Dweep';
            } elseif($round2_from_location==3){
                $round2_from_location_title='Shaheed Dweep';
            }

            if($round2_to_location==1){
                $round2_to_location_title='Port Blair';
            } elseif($round2_to_location==2){
                $round2_to_location_title='Swaraj Dweep';
            } elseif($round2_to_location==3){
                $round2_to_location_title='Shaheed Dweep';
            }

            $data6 = array(
                'date' => date('d-m-Y', strtotime($date)),
                'from' => $round2_from_location_title,
                'to' => $round2_to_location_title
            );
 
            $ship = ShipMaster::with('images')->where('id', 2)->get();
            $ship_image= $ship[0]['image'];

            $nautika_result2 = $this->nautikaApiCall('getTripData', $data6);
            
            $nautikaData3 = $nautika_result2->data;

            if(!empty( $nautikaData3)){
                foreach($nautikaData3 as $key=>$val){
                    $nautikaData3[$key] = (array) $val;
                    $nautikaData3[$key]['ship_name'] = 'Nautika';
                    $nautikaData3[$key]['ship_image'] = $ship_image;
                    $nautikaData3[$key]['ship'] = $ship;
                    $nautikaData3[$key]['departure_time'] = str_pad($val->dTime->hour, 2, '0', STR_PAD_LEFT)  . ':' . $val->dTime->minute . ':00';
                    $nautikaData3[$key]['arrival_time'] = str_pad($val->aTime->hour, 2, '0', STR_PAD_LEFT)  . ':' . $val->aTime->minute . ':00';
                    $nautikaData3[$key]['b_class_seat_availibility'] = 0;
                    $nautikaData3[$key]['p_class_seat_availibility'] = 0;
                    foreach($val->bClass as $key1=>$val1){
                        if($val1->isBooked==0 && $val1->isBlocked==0) {
                            $nautikaData3[$key]['b_class_seat_availibility']++;
                        }
                    }
                    foreach($val->pClass as $key1=>$val1){
                        if($val1->isBooked==0 && $val1->isBlocked==0) {
                            $nautikaData3[$key]['p_class_seat_availibility']++;
                        }
                    }
                }
            }

            $data7 = array("data"=> array(
                "trip_type"=>"single_trip",
                "from_location" => $round2_from_location,
                "travel_date" => date('Y-m-d', strtotime($date)),
                "no_of_passenger" => $no_of_passenger,
                "to_location" => $round2_to_location,
            ));
    
            $makruzz_result2 = $this->makApiCall('schedule_search', $data7);
  
            // $ship=DB::table('ship_master')->select('image')->where('id', 1)->first();
            // $ship_image= $ship->image;
            
            $ship = ShipMaster::with('images')->where('id', 1)->get();
            $ship_image= $ship[0]['image'];

            $makData3=[];
            if(!empty($makruzz_result2) && !empty($makruzz_result2->data)){
                $makFerry = $makruzz_result2->data;
                foreach($makFerry as $key=>$val){
                    $makData3[$val->id]['id'] =  $val->id;
                    $makData3[$val->id]['departure_time'] =  $val->departure_time;
                    $makData3[$val->id]['ship_name'] =  'Makruzz';
                    $makData3[$val->id]['ship_image'] = $ship_image;
                    $makData3[$val->id]['ship'] = $ship;
                    $makData3[$val->id]['ship_class'][] =  $val;
                }
            }

            if(!empty($nautikaData3)){
                $allSchedule2 = array_merge($makData3, $nautikaData3);
            }else{
                $allSchedule2 = $makData3;
            }

            $allSchedule4 = array_merge($allSchedule2, $adminShipSchedules3);

            $collection = collect($allSchedule4);
            // Sort the collection by 'time' column
            $sorted = $collection->sortBy(function ($item) {
                return strtotime($item['departure_time']);
            });
    
            $sortedArray3 = $sorted->values()->all();
            
            $data['apiScheduleData3'] = $sortedArray3; 
    
        }

        $booking_data = array(
            'trip_type' => $trip_type,
            'form_location' => $request->form_location,
            'to_location' => $request->to_location,
            'date' => date('Y-m-d', strtotime($request->date)),
            'round1_from_location' => $request->round1_from_location,
            'round1_to_location' => $request->round1_to_location,
            'round1_date' => date('Y-m-d', strtotime($request->round1_date)),
            'round2_from_location' => $request->round2_from_location,
            'round2_to_location' => $request->round2_to_location,
            'round2_date' => date('Y-m-d', strtotime($request->round2_date)),
            'no_of_passenger' => $request->input('passenger'),
            'no_of_infant' => $request->input('infant')
        );

        Session::put('ferry_list', $data);
        Session::put('booking_data', $booking_data);

        //print_r($data);die;

        return view('booking.ferry.ferry-search', $data);
    }

    public function bookingDataStoreSession(Request $request)
    {
        $bookingScheduleDetails = Session::get('booking_data');
        $bookingScheduleDetails['schedule'][$request->trip] = array(
            'ship' => $request->ship,
            'scheduleId' => $request->scheduleId,
            'shipClass' => $request->shipClass
        );

        Session::put('booking_data', $bookingScheduleDetails);

        // print_r($bookingScheduleDetails);
        if($request->shipClass == 'pClass' || $request->shipClass == 'bClass'){
            $schedules = Session::get('ferry_list');
            
            if($request->trip == 1){
                $schedule = $schedules['apiScheduleData'];
            } else if($request->trip == 2){
                $schedule = $schedules['apiScheduleData2'];
            } else if($request->trip == 3){
                $schedule = $schedules['apiScheduleData3'];
            }


            if($request->shipClass == 'pClass'){
                foreach($schedule as $row){
                    if($row['id'] == $request->scheduleId){
                        $scheduleSeats = $row['pClass'];
                    }
                }
                $shipClass = 'luxury';
            } else if($request->shipClass == 'bClass'){
                foreach($schedule as $row){
                    if($row['id'] == $request->scheduleId){
                        $scheduleSeats = $row['bClass'];
                    }
                }
                $shipClass = 'royal';
            }

            echo json_encode(array('seats'=> $scheduleSeats, 'ship_class'=>$shipClass));
        } else {
            echo json_encode(array('status'=>'success'));
        }


    }

    public function bookingSeatDataStoreSession(Request $request)
    {
        $bookingScheduleDetails = Session::get('booking_data');
        $bookingScheduleDetails['schedule'][$request->trip]['tripSeatNo'] = $request->tripSeatNo;

        Session::put('booking_data', $bookingScheduleDetails);

        echo json_encode(array('status'=>'success', 'data'=> Session::get('booking_data')));

    }

    public function getNautikaLayout(Request $request)
    {
        $schedileId = $request->schedule_id;
        $shipClass = $request->ship_class;
    }

}


