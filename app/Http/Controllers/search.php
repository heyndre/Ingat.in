<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class search extends Controller
{
    public function engine(Request $request)
	{
		// menangkap parameter pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table barang sesuai pencarian data
		$data = DB::table('barang')
        ->where('nama_barang','like',"%".$cari."%")
        ->join('users', 'users.id', '=', 'barang.pemilik_id')
		->paginate();
        // dd($data);
    		// mengirim data pencarian ke view index
		return view('search.result',['data' => $data]);
 
	}
}
