<?php

namespace App\Http\Controllers;

use App\Models\BoatSchedule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
Use App\Models\Partners;
Use App\Models\Banners;
Use App\Models\Package_style_master;
Use App\Models\Activity_category;
use File;
use App\Models\FerryLocation;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request){
        
        // $all= Session::all();
        // echo "<pre>";
        // print_r($all);
        // die();
    

        $banners  = DB::table('banners')->where('status','0')->where('delete','0')->get();
        $ferry_locations = FerryLocation::where('status','Y')->get();
        $data = compact('banners','ferry_locations');
        return view('home.index')->with($data);
    }

    public function home_achievements()
    {
        $data = array();
        $response_data = Http::post(config('app.api_base') . 'achievementlist');
        $data = json_decode($response_data);
        //echo "<pre>";print_r($data);die;
        return view('home.home_achievements', compact('data'));
    }
    public function home_banners()
    {
        $data = array();
        $response_data = Http::post(config('app.api_base') . 'bannerlist');
        $data = json_decode($response_data);
        //echo "<pre>";print_r($data);die;
        return view('home.home_banners', compact('data'));
    }

    // public function login_check()
    // {
    //     $user = Auth::user();
        
    //     if($user == NULL){
    //         return json_encode(array('status'=> false));
    //     } else {
    //         return json_encode(array('status'=> true));
    //     }
    // }

    // public function get_login_otp(Request $request)
    // {
    //     $mobileNo = $request->mobileNo;

    //     $isExisteUser = DB::table('web_users')->where(['phone_no' => $mobileNo, 'status'=>0, 'delete'=>0])->first();
    //     // $otp = mt_rand(100000, 999999);
    //     $otp = 123456;
    //     if($isExisteUser){
    //         DB::table('web_users')->update(['otp'=>$otp, 'updated_at'=> date('Y-m-d H:i:s')]);
    //     } else {
    //         $userData = array(
    //             'phone_no' => $mobileNo,
    //             'otp' => $otp,
    //             'created_at' => date('Y-m-d H:i:s'),
    //             'status' => 0,
    //             'delete' => 0
    //         );
            
            
    //         DB::table('web_users')->insert($userData);
    //     }

    //     return json_encode(array('status'=> true));

    // }



    // public function login_by_otp(Request $request)
    // {
    //     $phone_no = $request->phone_no;
    //     $otp = $request->otp;

    //     $check = DB::table('web_users')->where(['phone_no' => $phone_no, 'otp'=>$otp, 'status'=>0, 'delete'=>0])->first();

    //     if($check){
    //         $sessionData = array(
    //             'id' => $check->id,
    //             'name' => $check->name,
    //             'phone_no' => $check->phone_no
    //         );
    //         Session::put('user', $sessionData);
    //        return json_encode(array("status" => true, 'message'=> 'Success')) ;
    //         // return response()->json(["status" => true, 'message'=> 'Success']);
    //     } else {
    //         return json_encode(array("status" => false, 'message'=> 'Invalid OTP!')) ;
            
    //     }
    // }


    public function user_register(request $request){
        $input=$request->all();
        $mobile_no= $input['mobile_no'];
        function generateOTP($length) {
            $otp = '';
            for ($i = 0; $i < $length; $i++) {
                $otp .= random_int(1, 9);
            }
            return $otp;
        }
        
        // Example usage
        //$otp = generateOTP(4);
        $otp =1234;

        $data['phone_no']= $mobile_no;
        $data['otp']=$otp;
        $web_users_data = DB::table('web_users')->where('phone_no', $mobile_no)->first();

        if ($web_users_data) {
            $user_id = $web_users_data->id;
            DB::table('web_users')->where('id', $user_id)->update($data);
        } else {
            $user_id = DB::table('web_users')->insertGetId($data);
        }
    
        $data2['user_id']=$user_id;
        $data2['otp']= $otp;
        $data2['success']=1;

        return json_encode($data2);

    }

    public function verify_otp(Request $request)
    {
        $mobile_no = $request->input('mobile_no');
        $enteredOTP = $request->input('enteredOTP');
    
        $user = DB::table('web_users')->where('phone_no', $mobile_no)->first();

        if ($user && $user->otp == $enteredOTP) {
            $otp= $user->otp;
            $user_id= $user->id;
            Session::put('user_id', $user_id );
            Session::put('mobile_no', $mobile_no );
            // OTP is correct
            return response()->json(['success' => 'OTP verified successfully.', 'user_id' => Session::get('user_id')]);
        } else {
            return response()->json(['error' => 'Invalid OTP or mobile number.'], 200);
        }
    }


    public function login_check(Request $request)
    {

        $credentials = $request->only('email', 'password');
        // $wh_qry = ['email' => $credentials['email']];
        // // echo $credentials['password'];
        // // dd($wh_qry);
        // $userdata = User::where($wh_qry)->first();

        // dd(Auth::attempt($credentials));
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            // dd($user);
            session([
                'user_name' => $user->name, 
                'user_email' => $user->email
            ]);
            return response()->json(['status' => 'success',  'message' => 'Authenticated successfully'], 200);
        } else {
            return response()->json(['status' => 'error',  'error' => 'Invalid Credentials'], 200);
        }
    }



    public function about(){
        return view('static-page.about');
    }

    public function terms_and_conditions(){
        return view('static-page.term-and-conditions');
    }

    public function privacy_policy(){
        return view('static-page.privacy-policy');
    }
    public function cancellation_refund(){
        return view('static-page.cancellation-refund');
    }

    Public function logout(Request $request)
    {
       
        
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['status' => 'success',  'Logout_message' => 'Logout successfully'], 200);
    }
}
