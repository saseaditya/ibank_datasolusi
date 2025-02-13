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
use DateTime;

class IbankController extends Controller
{
    //
    public function viewMasterNasabah(Request $request, $id = null)
    {
        $viewPage = "app.dashboard.index";
        $page	= ["Home","Dashboard"];


        $data = DB::table('ibank_nasabah')->where('cif',session("cif"))->first();

        $dataPinjaman = DB::table('ibank_pinjaman')->where('cif',session("cif"))->get();
        $dataDeposito = DB::table('ibank_deposito')->where('cif',session("cif"))->get();
        $dataTabungan = DB::table('ibank_tabungan')->where('cif',session("cif"))->get();

        foreach ($dataDeposito as $tmp) {
            $tglBuka = DateTime::createFromFormat('d/m/Y', $tmp->tgl_buka);
            $tglValuta = DateTime::createFromFormat('d/m/Y', $tmp->tgl_valuta);
            $tglJT = DateTime::createFromFormat('d/m/Y', $tmp->tgl_jth_tempo);

            $tmp->tgl_buka = $tglBuka->format('d M Y');
            $tmp->tgl_valuta = $tglValuta->format('d M Y');
            $tmp->tgl_jth_tempo = $tglJT->format('d M Y');
        }


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
        $countPinUpdate = DB::table('ibank_nasabah')->select('pin_ganti')->where('cif',session("cif"))->first();

        $txtOldPin = @$_POST['txtOldPin'];
        $txtNewPin = @$_POST['txtNewPin'];

        $getOldPin = DB::table('ibank_nasabah')->where('cif',session("cif"))->where('pin',$txtOldPin)->first();

        if ($getOldPin == null ) {
            echo "Failed";
            return;
        }

        $dataUpdate = [
            "pin" => $txtNewPin,
            "pin_ganti" => $countPinUpdate->pin_ganti + 1
        ];

        $prosesUpdate = DB::table('ibank_nasabah');
        $prosesUpdate = $prosesUpdate->where('cif',session("cif"))->update($dataUpdate);
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

    public function GetTrxPinjamanByRekening(Request $request)
    {
        $norek = @$_GET['norek'];
        $dataPinjaman = DB::table('ibank_pinjaman_trx')->where('norekening',$norek)->get();

        return response()->json($dataPinjaman);
    }

    public function GetTrxDepositoByRekening(Request $request)
    {
        $norek = @$_GET['norek'];
        $dataDeposito = DB::table('ibank_deposito_trx')->where('norekening',$norek)->get();

        return response()->json($dataDeposito);
    }

    public function GetTrxTabunganByRekening(Request $request)
    {
        $norek = @$_GET['norek'];
        $dataTabungan = DB::table('ibank_tabungan_trx')->where('norekening',$norek)->get();

        return response()->json($dataTabungan);
    }
}
