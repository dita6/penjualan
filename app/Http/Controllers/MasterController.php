<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\DB; //gunanya agar bisa menggunakn class DB
use App\Models\Mpelanggan; //kalo pake model, harus pake ini
use App\Models\Mpemasok; //kalo pake model, harus pake ini
use App\Models\Mbelim; //kalo pake model, harus pake ini
use App\Models\Mbelid; //kalo pake model, harus pake ini

class MasterController extends Controller
{
    public function daftarpelanggan(){
    	$data=DB::table('pelanggan')
		->select('*')
		->get();//semua data
		// ->first data yg pertama

		//dd($data); //gunanya menampilkan data dlm bentuk array

    	return view('welcometabel')
    	->with('isi','master.pelanggan')
    	->with('judul',"MASTER DATA PELANGGAN")
    	->with('vardata',$data)
    	;
    }

    public function formpelanggan(){
    	return view('welcomeform')
    	->with('isi','master.formpelanggan')
    	->with('judul','FORM TAMBAH PELANGGAN')
    	;
    }

    public function simpanpelanggan(Request $re){
    	//menangkap apa yg diisi di form
    	//$nama = $re->nama;
    	//$alamat = $re->alamat;
    	//$telp = $re->telp;
    	//$namapimpinan = $re->namapimpinan;
    	//$namaadmin = $re->namaadmin;

    	//menyimpan apa yg diisi di form ke db
    		//1. simpan ke db bisa gunakan model
    	$data = new Mpelanggan; //kita buat objek data dari class
    	$data -> kode = $re->kode; 
    	$data -> nama = $re->nama; //sebelah kiri harus sama dgn yg database, sebelah kanan harus sama dgn name di form
    	$data -> alamat = $re->alamat;
    	$data -> telp = $re ->notelp;
    	$data -> namapimpinan = $re ->namapimpinan;
    	$data -> namaadmin = $re ->namaadmin;
    	$data -> save();

    	return redirect('pelanggan') //setelah save, dia akan kembali ke dftar pelanggan
    	->with('pesan', 'Sukses input data');		
    }

    public function hapusdatapelanggan(Request $r){
    	$id = $r ->id;
    	//langkah hapus ke database
    	DB::table('pelanggan')
		->where('id',$id)
		->delete();

		return redirect ('pelanggan')->with('success','Delete Data'); //dengan redirect ini dia akan kembali lagi ke controller pelanggan
    }

    public function editdatapelanggan(Request $a){

    	$id= $a->ids; //ids datang dari routing di web.php
    	$cari = DB::table('pelanggan')
    	->where('id',$id) // sama dengan ->where('id','>='),$id)
    	->first()
    	;
    	//dd('$cari');

    	//buat ekseskusi utk update
    	//1. kirim data ke form utk update
    	//2. 

    	return view('welcomeform')
    	->with('datapel',$cari)
    	->with('isi','master.formpelangganedit')
    	->with('judul','FORM EDIT PELANGGAN')
    	;
    	return redirect('pelanggan') //setelah save, dia akan kembali ke dftar pelanggan
    	->with('pesan', 'Sukses input data');		
    }

    public function simpanpelangganedit(Request $b){
		$kode = $b->kode;
		$nama = $b->nama;
		$alamat = $b->alamat;
		$telp = $b->telp;
		$namapimpinan = $b->namapimpinan;
		$namaadmin = $b->namaadmin;
		$id= $b->id;
		//dd($nama);
		//proses edit ke database
		$sql = array(
				'kode'=>$kode,
				'nama'=>$nama,
				'alamat'=>$alamat,
				'telp'=>$telp,
				'namapimpinan'=>$namapimpinan,
				'namaadmin'=>$namaadmin
		);
		DB::table('pelanggan')
			->where('id',$id)
			->update($sql);

			return redirect('pelanggan') //setelah save, dia akan kembali ke dftar pelanggan
	    	->with('pesan', 'Sukses input data');		
	}


//=================================================================


    public function daftarpemasok(){
    	$data=DB::table('pemasok')
		->select('*')
		->get();

    	return view('welcometabel')
    	->with('isi','master.pemasok')
    	->with('judul',"MASTER DATA PEMASOK")
    	->with('vardata',$data)  //ini query nyaa
    	;
    }

    public function formpemasok(){
    	return view('welcomeform')
    	->with('isi','master.formpemasok')
    	->with('judul','FORM TAMBAH PEMASOK')
    	;
    }

    public function simpanpemasok(Request $pe){
    	
    	$data = new Mpemasok; //kita buat objek data dari class
    	$data -> kode = $pe->kode; 
    	$data -> nama = $pe->nama; //sebelah kiri harus sama dgn yg database, sebelah kanan harus sama dgn name di form
    	$data -> alamat = $pe->alamat;
    	$data -> telp = $pe ->notelp;
    	$data -> namapimpinan = $pe ->namapimpinan;
    	$data -> namaadmin = $pe ->namaadmin;
    	$data -> save();

    	return redirect('pemasok') //setelah save, dia akan kembali ke dftar pelanggan
    	->with('pesan', 'Sukses input data');		
    }

    public function hapusdatapemasok(Request $r){
    	$id = $r ->id;
    	//langkah hapus ke database
    	DB::table('pemasok')
		->where('id',$id)
		->delete();

		return redirect ('pemasok')->with('success','Delete Data'); //dengan redirect ini dia akan kembali lagi ke controller pelanggan
	}

	public function editdatapemasok(Request $x){

    	$id= $x->ids; //ids datang dari routing di web.php
    	$cari = DB::table('pemasok')
    	->where('id',$id) // sama dengan ->where('id','>='),$id)
    	->first()
    	;
    	//dd('$cari');

    	//buat ekseskusi utk update
    	//1. kirim data ke form utk update
    	//2. 

    	return view('welcomeform')
    	->with('datape',$cari)
    	->with('isi','master.formpemasokedit')
    	->with('judul','FORM EDIT PEMASOK')
    	;
    	return redirect('pemasok') //setelah save, dia akan kembali ke dftar pelanggan
    	->with('pesan', 'Sukses input data');		
    }

	public function simpanpemasokedit(Request $y){
		$kode = $y->kode;
		$nama = $y->nama;
		$alamat = $y->alamat;
		$telp = $y->telp;
		$namapimpinan = $y->namapimpinan;
		$namaadmin = $y->namaadmin;
		$id= $y->id;
		//dd($nama);
		//proses edit ke database
		$sql = array(
				'kode'=>$kode,
				'nama'=>$nama,
				'alamat'=>$alamat,
				'telp'=>$telp,
				'namapimpinan'=>$namapimpinan,
				'namaadmin'=>$namaadmin
		);
		DB::table('pemasok')
			->where('id',$id)
			->update($sql);

			return redirect('pemasok') //setelah save, dia akan kembali ke dftar pelanggan
	    	->with('pesan', 'Sukses input data');		
	}


    //===========================================================================


    public function daftarbelim(){
        $data=DB::table('belim')
        ->select('*')
        ->get();

        return view('welcometabel')
        ->with('isi','master.belim')
        ->with('judul',"DATA BELI MASTER")
        ->with('vardata',$data)  //ini query nyaa
        ;
    }

    public function formbelim(){
        return view('welcomeform')
        ->with('isi','master.formbelim')
        ->with('judul','FORM TAMBAH BELI MASTER')
        ;
    }

    public function simpanbelim(Request $pe){
        
        $data = new Mbelim; 
        $data -> nobukti = $pe->nobukti; 
        $data -> tgl = $pe->tgl;
        $data -> idpemasok = $pe ->idpemasok;
        $data -> ket = $pe ->ket;
        $data -> save();

        return redirect('belim') 
        ->with('pesan', 'Sukses input data');       
    }

    public function hapusdatabelim(Request $r){
        $id = $r ->id;
        //langkah hapus ke database
        DB::table('belim')
        ->where('id',$id)
        ->delete();

        return redirect ('belim')->with('success','Delete Data'); 
    }

    public function editdatabelim(Request $x){

        $id= $x->ids; //ids datang dari routing di web.php
        $cari = DB::table('belim')
        ->where('id',$id) 
        ->first()
        ;
     

        return view('welcomeform')
        ->with('databelim',$cari)
        ->with('isi','master.formbelimedit')
        ->with('judul','FORM EDIT BELI MASTER')
        ;
        return redirect('belim') //setelah save, dia akan kembali ke dftar pelanggan
        ->with('pesan', 'Sukses input data');       
    }

    public function simpanbelimedit(Request $y){
        $nobukti = $y->nobukti;
        $tgl = $y->tgl;
        $idpemasok = $y->idpemasok;
        $ket = $y->ket;
        $id= $y->id;
        
        $sql = array(
                'nobukti'=>$nobukti,
                'tgl'=>$tgl,
                'idpemasok'=>$idpemasok,
                'ket'=>$ket,
        );
        DB::table('belim')
            ->where('id',$id)
            ->update($sql);

            return redirect('belim') //setelah save, dia akan kembali ke dftar pelanggan
            ->with('pesan', 'Sukses input data');       
    }


//===========================================================================


    public function daftarbelid(){
        $data=DB::table('belid')
        ->select('*')
        ->get();

        return view('welcometabel')
        ->with('isi','master.belid')
        ->with('judul',"MASTER DATA BELI DETAIL")
        ->with('vardata',$data)  //ini query nyaa
        ;
    }

    

    public function simpanbelid(Request $pe){
        
        $data = new Mbelid; 
        $data -> nobukti = $pe->nobukti; 
        $data -> idstok = $pe->idstok;
        $data -> qty = $pe ->qty;
        $data -> hargabeli = $pe ->hargabeli;
        $data -> subtotal = $pe ->subtotal;
        $data -> ket = $pe ->ket;
        $data -> save();

        return redirect('belid') 
        ->with('pesan', 'Sukses input data');       
    }

    public function hapusdatabelid(Request $r){
        $id = $r ->id;
        //langkah hapus ke database
        DB::table('belid')
        ->where('id',$id)
        ->delete();

        return redirect ('belid')->with('success','Delete Data'); 
    }

    public function editdatabelid(Request $x){

        $id= $x->ids; //ids datang dari routing di web.php
        $cari = DB::table('belid')
        ->where('id',$id) 
        ->first()
        ;
     

        return view('welcomeform')
        ->with('databelid',$cari)
        ->with('isi','master.formbelid')
        ->with('judul','FORM EDIT DOKTER')
        ;
        return redirect('belid') //setelah save, dia akan kembali ke dftar pelanggan
        ->with('pesan', 'Sukses input data');       
    }

    public function simpanbelidedit(Request $y){
        $nobukti = $y->nobukti;
        $idstok = $y->idstok;
        $qty = $y->qty;
        $hargabeli = $y->hargabeli;
        $subtotal = $y->subtotal;
        $ket = $y->ket;
        $id= $y->id;
        
        $sql = array(
                'nama_dokter'=>$nama_dokter,
                'poli'=>$poli,
                'alamat'=>$alamat,
                'no_telp'=>$no_telp,
        );
        DB::table('dokter')
            ->where('id',$id)
            ->update($sql);

            return redirect('dokter') //setelah save, dia akan kembali ke dftar pelanggan
            ->with('pesan', 'Sukses input data');       
    }

//===========================================================================

	

    

}    
