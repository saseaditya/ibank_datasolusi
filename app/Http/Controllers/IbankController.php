<?php

namespace App\Http\Controllers;

use DB;
use Input;
use Redirect;
use Session;
use File;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use DataTables;
use HelperData;
use App\PDFGenerate;
use Dompdf\Dompdf;
use PDF;

class IbankController extends Controller
{
    //
    public function viewMasterNasabah(Request $request, $id = null)
    {
        $viewPage = "app.dashboard.index";
        $page	= ["Home","Dashboard"];

        $data = DB::table('ibank_nasabah')->where('cif',$id)->first();

        $dataPinjaman = DB::table('ibank_pinjaman')->where('cif',$id)->get();
        $dataDeposito = DB::table('ibank_deposito')->where('cif',$id)->get();
        $dataTabungan = DB::table('ibank_tabungan')->where('cif',$id)->get();


        return view($viewPage,array(
            'pageNow' 	 	=> $page,
            'data' 	 	    => $data,
            'dataPinjaman'  => $dataPinjaman,
            'dataDeposito'  => $dataDeposito,
            'dataTabungan'  => $dataTabungan,
            'menuActive' 	=> "dasbor"
        ));
    }

    public function UpdatePinNasabah(Request $request, $id = null)
    {
        $countPinUpdate = DB::table('ibank_nasabah')->select('pin_ganti')->where('cif',$id)->first();

        $txtOldPin = @$_POST['txtOldPin'];
        $txtNewPin = @$_POST['txtNewPin'];

        $getOldPin = DB::table('ibank_nasabah')->where('cif',$id)->where('pin',$txtOldPin)->first();

        if ($getOldPin == null ) {
            echo "Failed";
            return;
        }

        $dataUpdate = [
            "pin" => $txtNewPin,
            "pin_ganti" => $countPinUpdate->pin_ganti + 1
        ];

        $prosesUpdate = DB::table('ibank_nasabah');
        $prosesUpdate = $prosesUpdate->where('cif',$id)->update($dataUpdate);
        $msg = "Update ";

        if($prosesUpdate){
            echo "Success";
        }else{
            echo "Failed";
        }

//        if($prosesUpdate){
//            return redirect()->back()->with('message', $msg.'Berhasil')->with('message_status', 'success');
//        }else{
//            return redirect()->back()->with('message', $msg.'Gagal')->with('message_status', 'danger');
//        }
    }
}
