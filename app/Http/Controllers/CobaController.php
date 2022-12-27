<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CobaController extends Controller
{
    public function menu2(){
	//dd('INI DARI CONTROLLER');

    	$namasaya='DITA';
    	$nim ='180402062';
		return view('belajar.menu2')
		->with('nama',$namasaya)
		->with('nim',$nim)
		;

    }

     public function menu3(Request $r){
	//dd('INI DARI CONTROLLER');

    	$userx=$r->user;
    	$passx=$r->pass;
    	
		return view('belajar.viewlogin')
		->with('username',$userx)
		->with('password',$passx)
		;

    }


}
