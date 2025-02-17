<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use DB;
use Input;
use Redirect;
use Session;
use Alert;
use HelperData;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{

    public function viewLogin()
    {
        if(session("cif")){
            if(session("ktp") && session('pin_ganti') == 0){
                return view("app.update_pin");
            } else if (session("ktp") && session('pin_ganti') != 0) {
                return redirect('/dashboard');
            }
        }else{
            return view("app.login");
        }
    }

    public function viewUpdatePin()
    {
        if(session("cif")){
            if(session("ktp") && session('pin_ganti') == 0){
                return view("app.update_pin");
            } else if (session("ktp") && session('pin_ganti') != 0) {
                return redirect('/dashboard');
            }
        }else{
            return view("app.login");
        }
    }

    public function prosesLogin(Request $request)
    {
        $ktp = @$_GET['ktp'];
        $pin = @$_GET['pin'];

        $cekUsers = DB::table('ibank_nasabah as in')
            ->where('in.ktp', $ktp)
            ->where('in.pin', $pin)
            ->get();

        if(count($cekUsers) > 0) {
            foreach($cekUsers as $users)
            {
                session()->put('cif',$users->cif);
                session()->put('ktp',$users->ktp);
                session()->put('fullname',$users->nama);
                session()->put('pin_ganti',$users->pin_ganti);
                $data = array("cif"=>$users->cif, "ktp" => $users->ktp, "fullname"=>$users->nama, "pin_ganti"=>$users->pin_ganti);
                return response()->json($data);
            }
        } else {
            echo "Failed";
        }
    }

    public function CheckUser(Request $request)
    {
        $ktp = @$_GET['ktp'];

        $Users = DB::table('ibank_nasabah as in')
            ->where('in.ktp', $ktp)
            ->first();

        if($Users == null) {
            return "user not found";
        }

        return response()->json($Users);
    }

    public function RequestPINByWhatsApp(Request $request)
    {
        return "success";
//        $ktp = @$_GET['ktp'];
//
//        $Users = DB::table('ibank_nasabah as in')
//            ->where('in.ktp', $ktp)
//            ->first();
//
//        $hp = "081249971861";
//        $hp = $Users->hp;
//        $url = "http://36.95.139.41/chat-api/public/datasolusi/sendwa/6281343890809/".$hp."/".$Users->pin;
//
//        $response = Http::get($url);
//
//        try {
//            $response = Http::timeout(10)->get($url);
//
//            if ($response->failed()) {
//                throw new Exception("HTTP Request failed with status: " . $response->status());
//            }
//
//            $data = array("message"=>"success", "status_code"=>200, "data"=>$response->json());
//            return response()->json($data);
//        } catch (Exception $e) {
//            return response()->json(['error send WA : ' => $e->getMessage()], 500);
//        }
    }

    public function prosesLogout()
    {

        if(session('cif')) {
            session()->forget('cif');
//            session()->forget('ktp');
//            session()->forget('pin_ganti');
            return redirect('/');
        } else {
            echo 'Unknown Session';
            return redirect('/');
        }
    }
}
