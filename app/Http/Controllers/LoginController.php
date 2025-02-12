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

class LoginController extends Controller
{

    public function viewLogin()
    {
        if(!session('cif')){
            return view("app.login");
        }else{
            return redirect()->route('viewDashboard');
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
                $data = array("cif"=>$users->cif, "ktp" => $users->ktp, "fullname"=>$users->nama);
                return response()->json($data);
            }
        } else {
            echo "Failed";
        }
    }

    public function RequestPINByWhatsApp(Request $request)
    {
        $ktp = @$_GET['ktp'];

        $Users = DB::table('ibank_nasabah as in')
            ->where('in.ktp', $ktp)
            ->first();

        $hp = "081249971861";
//        $hp = $Users->hp;
        $url = "http://36.95.139.41/chat-api/public/datasolusi/sendwa/6281343890809/".$hp."/".$Users->pin;

        $response = Http::post($url);

        return $response->json();
    }

    public function prosesLogout()
    {

        if(session('cif')) {
            session()->forget('cif');
            return redirect('/login');
        } else {
            echo 'Unknown Session';
            return redirect('/login');
        }
    }
}
