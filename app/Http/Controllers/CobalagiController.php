<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CobalagiController extends Controller
{
	return view('belajar.viewlogin');
}

    public function menuc(Request $r){
	//dd('INI DARI CONTROLLER');

    	$userx=$r->user;
    	$passx=$r->pass;

		return view('belajar.viewlogin')
		->with('username',$userx)
		->with('password',$passx)
		;

    }
}