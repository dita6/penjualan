<?php

namespace App\Http\Controllers;

use App\MBeliid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BeliController extends Controller
{
    public function formbeli()
    {
        $iduser2 = '001';
        $str_time = date('ymdHis');
        $nobuk = "BL" . "$iduser2" . "$str_time";

        $beliId = DB::table('beliid')->where('nobuk', $nobuk)->get();

        return view('welcomeform')
            ->with('isi', 'beli.formbeli')
            ->with('judul', 'Form Pembelian')
            ->with('nobuk', $nobuk)
            ->with('idpem', 0)
            ->with('idstok', 0)
            ->with('beliId', $beliId);
    }

    public function daftarpembelian()
    {
        $beliId = DB::table('belim')
            ->leftjoin('pemasok', 'pemasok.id', '=', 'belim.idpem')
            ->leftjoin('beliid', 'beliid.nobuk', '=', 'belim.nobukti')
            ->select('belim.*', 'pemasok.nama', 'pemasok.alamat', 'pemasok.telp', DB::raw('SUM(beliid.hrgjual * beliid.qty) as total'))
            ->groupBy('belim.nobukti')
            ->get();

        return view('welcomeform')
            ->with('isi', 'beli.daftarpembelian')
            ->with('judul', 'Form Pembelian')
            ->with('beliId', $beliId);
    }

    public function simpanpembelian(Request $request)
    {
        DB::beginTransaction();
        try {
            MBeliid::create($request->except('idpem'));
            $belim = [
                'nobukti' => $request->nobuk,
                'tgl' => $request->tanggal,
                'idpem' => $request->idpem,
                'ket' => $request->ket
            ];
            $belim = DB::table('belim')->insertGetId($belim);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
        return view('welcomeform')
            ->with('isi', 'beli.formbeli')
            ->with('judul', 'Form Pembelian')
            ->with('idpem', 0)
            ->with('nobuk', $request->nobuk)
            ->with('beliId', DB::table('beliid')->where('nobuk', $request->nobuk)->get());
    }

    public function hapuspembelian($nobukti)
    {
        DB::table('belim')->where('nobukti', $nobukti)->delete();
        DB::table('beliid')->where('nobuk', $nobukti)->delete();

        return back();
    }
}
