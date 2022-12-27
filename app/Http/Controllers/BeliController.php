<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\DB; //gunanya agar bisa menggunakn class DB
use App\Models\Mpelanggan; //kalo pake model, harus pake ini
use App\Models\Mpemasok; //kalo pake model, harus pake ini
use App\Models\Mbeli; //kalo pake model, harus pake ini
use App\Models\Mbelid; //kalo pake model, harus pake ini

class BeliController extends Controller
{

	 public function formbeli(){
	 	//ambil
	 	//$iduser2=sprintf("%")

	 	$iduser2 = '001';
	 	$str_time = date('ymdHis');

	 	$nobukti = "BL"."$iduser2"."$str_time"; //data user yg login,tahun bulan tanggal jam menit detik


    	return view('welcomeform')
    	->with('isi','master.formpembelian')
    	->with('judul','FORM TAMBAH PEMBELIAN')
    	->with('nobukti',$nobukti)
    	->with('idpem',0)
    	->with('idper',0)
    	;
	}

	public function daftarpembelian(){
    	 $data=DB::table('belim')
                     ->leftjoin('belid', 'belid.nobukti', '=', 'belim.nobukti') 
                     ->leftjoin('pemasok', 'pemasok.id', '=', 'belim.idpemasok') 
                     ->select('pemasok.nama','belim.*', DB::RAW('SUM(belid.qty*belid.hargabeli) as total'))
                     ->groupby('belim.nobukti')
                      -> get();
    	return view('welcometabel')
    	->with('isi','master.pembelian')
    	->with('judul',"MASTER DATA PEMBELIAN")
    	->with('vardata',$data)  //ini query nyaa
    	;
    }

    public function simpanbeli(Request $pe){

        $nobukti = $pe->nobukti; 
        $idpemasok = $pe->idpemasok;
        $tgl = $pe ->tgl;
        $idstok = $pe ->idstok;
        $qty = $pe ->qty;
        $hargabeli = $pe ->hargabeli;
        $ket = $pe ->ket;

        $master=array(
        				'nobukti'=>$nobukti,
        				'idpemasok'=>$idpemasok,
        				'tgl'=>$tgl,
        				'ket'=>$ket

        			);
        $detail=array(
        				'nobukti'=>$nobukti,
        				'idstok'=>$idstok,
        				'qty'=>$qty,
        				'hargabeli'=>$hargabeli,
        				'ket'=>$ket
        				
       				 );

        DB::beginTransaction();
        try{
            DB::table('belim')
                    ->where('nobukti',$nobukti)
                    ->delete();

            DB::table('belim')->insertgetId($master);

            DB::table('belid')->insertgetId($detail);
            
            DB::commit();

        } catch(Exception $e){
            DB::rollback();

        }



      return view('welcomeform')
        ->with('isi','master.formpembelian')
        ->with('judul','FORM TAMBAH PEMBELIAN')
        ->with('idpem',$idpemasok)
        ->with('idper',0)
        ->with('nobukti', $nobukti)
        ->with('idpemasok', $idpemasok)
        ->with('tgl', $tgl)
        ->with('ket', $ket)
        
     
    	;       
    }

    public function hapusdatabeli(Request $r){

      $id = $r ->id;
        //langkah hapus ke database
       $datacari=DB::table('belid')
        ->where('id',$id)
        ->first();
        if($datacari!=null){
            $nobukti=$datacari->nobukti;
           } else{
                $nobukti='';
            }

         $datacari=DB::table('belim')
        ->where('nobukti',$nobukti)
        ->first();
        if($datacari!=null){
            $idpemasok=$datacari->idpemasok;
            $ket=$datacari->ket;
            $tgl=$datacari->tgl;
           } else{
                $idpemasok='';
                $ket='';
                $tgl=''
                ;
            }

        DB::table('belid')
        ->where('id',$id)
        ->delete();
        
        return view('welcomeform')
        ->with('isi','master.formpembelian')
        ->with('judul','FORM TAMBAH PEMBELIAN')
        ->with('idpem',0)
        ->with('idper',0)
        ->with('nobukti', $nobukti)
        ->with('idpemasok', $idpemasok)
        ->with('ket', $ket)
        ->with('tgl', $tgl)
        ; 
    }

    public function editdatabeli(Request $a){

        $nobukti= $a->nobuk; 
        $cari = DB::table('belim')
        ->where('nobukti',$nobukti) 
        ->first()
        ;
        if($cari!=null){
            $idpemasok=$cari->idpemasok;
            $ket=$cari->ket;
            $tgl=$cari->tgl;
           } else{
                $idpemasok='';
                $ket='';
                $tgl=''
                ;
            }



        $cari=DB::table('belid')
        ->where('nobukti',$nobukti)
        ->first();
        if($cari!=null){
            $nobukti=$cari->nobukti;
           } else{
                $nobukti='';
            }

        return view('welcomeform')
        ->with('databeli',$cari)
        ->with('isi','master.formbelid')
        ->with('judul','FORM EDIT PEMBELIAN')
        ->with('idpem',$idpemasok)
        ->with('idper',0)
        ->with('nobukti', $nobukti)

        
        ;
         
    }

    public function daftarpelanggan(){
        $data=DB::table('belid')
        ->select('*')
        ->get();//semua data
        // ->first data yg pertama

        //dd($data); //gunanya menampilkan data dlm bentuk array

        return view('welcometabel')
        ->with('isi','master.cetakpembelian')
        ->with('judul',"CETAK DATA PEMBELIAN")
        ->with('vardata',$data)
        ;
    }











}