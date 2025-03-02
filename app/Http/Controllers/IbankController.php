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
use Controllers;

class IbankController extends Controller
{
    public function viewHome(Request $request, $id = null)
    {
        $viewPage = "app.homev2";
        $page	= [""];

        $dataPinjaman = DB::table('ibank_pinjaman')->where('cif',session("cif"))->get();
        $dataDeposito = DB::table('ibank_deposito')->where('cif',session("cif"))->get();
        $dataTabungan = DB::table('ibank_tabungan')->where('cif',session("cif"))->get();

        $totalRek = count($dataDeposito) + count($dataTabungan) + count($dataPinjaman);

        return view($viewPage,array(
            'pageNow' 	 	=> $page,
            'totalRek' 	 	=> $totalRek,
            'menuActive' 	=> "home"
        ));
    }
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

    public function viewMasterPengajuanKredit(Request $request, $id = null)
    {
        $viewPage = "app.kredit.index";
        $page	= ["Home","Daftar Pengajuan Kredit"];


        $data = DB::table('app_pengajuan')->where('cif',session("cif"))->orderBy("waktu","desc")->get();

        foreach ($data as $tmp){
            $tmp->tanggal = date("d M Y", strtotime($tmp->tanggal));
        }

        $produk = DB::table('produk')->get();

        return view($viewPage,array(
            'pageNow' 	 	=> $page,
            'data' 	 	    => $data,
            'produk' 	 	=> $produk,
            'menuActive' 	=> "kredit"
        ));
    }

    public function CreatePengajuanKredit(Request $request, $id = null)
    {

        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        $produk = explode(',', $request->input('txtProduct'));

        $txtIdProduk = $produk[0];
        $txtNamaProduk = $produk[1];

        $txtJenis = $request->input('txtJK');
        $txtKet = $request->input('txtTP');
        $txtJJ = $request->input('txtJJ');
        $txtPlafond = $request->input('txtPlafond');

        $mapPengajuan = $latitude.",".$longitude;

        $data = [
            'cif' => session('cif'),
            'produk' => $txtIdProduk,
            'nama_produk' => $txtNamaProduk,
            'jenis' => $txtJenis,
            'keterangan' => $txtKet,
            'jenis_jaminan' => $txtJJ,
            'plafond' => $txtPlafond,
            'map_pengajuan' => $mapPengajuan,
//            'waktu' => date("Y-m-d h:i:s"),
        ];

        $prosesUpdate = DB::table('app_pengajuan')->insert($data);

        if($prosesUpdate){
            return redirect()->back()->with('message', 'Pengajuan Berhasil')->with('message_status', 'success');
        } else {
            return redirect()->back()->with('message', 'Pengajuan Gagal')->with('message_status', 'failed');
        }

    }

    public function truncate($text, $length = 20) {
        return strlen($text) > $length ? substr($text, 0, $length) . '...' : $text;
    }

    public function viewMasterFeedback(Request $request, $id = null)
    {
        $viewPage = "app.feedback.index";
        $page	= ["Home","Saran & Keluhan"];


        $data = DB::table('ibank_keluhan')->where('cif',session("cif"))->orderBy("waktu","desc")->get();
        $produk = DB::table('produk')->get();

        foreach ($data as $tmp){
            $tmp->isi = $this->truncate($tmp->isi, 20);
        }

        return view($viewPage,array(
            'pageNow' 	 	=> $page,
            'data' 	 	    => $data,
            'produk' 	 	=> $produk,
            'menuActive' 	=> "feedback"
        ));
    }

    public function CreateFeedback(Request $request, $id = null)
    {

        $data = [
            'cif' => session('cif'),
            'isi' => $request->input('txtDeskripsi')
        ];

        $prosesUpdate = DB::table('ibank_keluhan')->insert($data);

        if($prosesUpdate){
            return redirect()->back()->with('message', 'Berhasil kirim Saran / Keluhan')->with('message_status', 'success');
        } else {
            return redirect()->back()->with('message', 'Gagal')->with('message_status', 'failed');
        }
    }

    public function viewMasterVA(Request $request, $id = null)
    {
        $viewPage = "app.va.index";
        $page	= ["Home","List Virtual Account"];


        $data = DB::table('ibank_va')->where('cif',session("cif"))->first();

        return view($viewPage,array(
            'pageNow' 	 	=> $page,
            'data' 	 	    => $data,
            'menuActive' 	=> "va"
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

        foreach ($dataPinjaman as $tmp){
            $tmp->tanggal = date("d M Y", strtotime($tmp->tanggal));
            $tmp->realisasi = number_format($tmp->realisasi,0,",",".");
            $tmp->ang_pokok = number_format($tmp->ang_pokok,0,",",".");
            $tmp->sld_pokok = number_format($tmp->sld_pokok,0,",",".");
            $tmp->bunga = number_format($tmp->bunga,0,",",".");
            $tmp->denda = number_format($tmp->denda,0,",",".");
//            $tmp->tanggal = date("d M Y", strtotime($tmp->tanggal));
        }

        return response()->json($dataPinjaman);
    }

    public function GetTrxDepositoByRekening(Request $request)
    {
        $norek = @$_GET['norek'];
        $dataDeposito = DB::table('ibank_deposito_trx')->where('norekening',$norek)->get();

        foreach ($dataDeposito as $tmp){
            $tmp->tanggal = date("d M Y", strtotime($tmp->tanggal));
            $tmp->pokok = number_format($tmp->pokok,0,",",".");
            $tmp->bunga = number_format($tmp->bunga,0,",",".");
//            $tmp->tanggal = date("d M Y", strtotime($tmp->tanggal));
        }

        return response()->json($dataDeposito);
    }

    public function GetTrxTabunganByRekening(Request $request)
    {
        $norek = @$_GET['norek'];
        $dataTabungan = DB::table('ibank_tabungan_trx')->where('norekening',$norek)->get();

        foreach ($dataTabungan as $tmp){
            $tmp->tanggal = date("d M Y", strtotime($tmp->tanggal));
            $tmp->debet = number_format($tmp->debet,0,",",".");
            $tmp->kredit = number_format($tmp->kredit,0,",",".");
            $tmp->saldo = number_format($tmp->saldo,0,",",".");
//            $tmp->tanggal = date("d M Y", strtotime($tmp->tanggal));
        }

        return response()->json($dataTabungan);
    }
}
