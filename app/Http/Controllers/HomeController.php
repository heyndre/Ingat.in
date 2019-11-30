<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth' => 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userID = Auth::user()->id;
        $match = ['confirmed' => false, 'pemilik_id' => $userID];
        $data = DB::table('peminjaman')
        ->join('barang', 'peminjaman.barang_id', '=', 'barang.id_barang')
        ->join('users', 'peminjaman.id_pemilik', '=', 'users.id')
        ->join('category', 'category.id', '=', 'barang.category')
        ->where($match)
        ->orderBy('barang_id')
        ->get();

        $match = ['id_pemilik' => $userID];
        $data2 = DB::table('peminjaman')
        ->join('barang', 'peminjaman.barang_id', '=', 'barang.id_barang')
        ->join('users', 'peminjaman.id_pemilik', '=', 'users.id')
        ->join('category', 'category.id', '=', 'barang.category')
        ->where($match)
        ->orderBy('barang_id')
        ->get();

        $match = ['peminjam_id' => $userID];
        $data3 = DB::table('peminjaman')
        ->join('barang', 'peminjaman.barang_id', '=', 'barang.id_barang')
        ->join('users', 'peminjaman.id_pemilik', '=', 'users.id')
        ->join('category', 'category.id', '=', 'barang.category')
        ->where($match)
        ->orderBy('barang_id')
        ->get();

        $match = [];
        $data4 = DB::table('barang')
        ->get();

        $match = ['pemilik_id' => $userID];
        $data5 = DB::table('barang')
        ->where($match)
        ->get();
        // dd($admin);
        
        return view('home', ['data' => $data, 'data2' => $data2, 'data3' => $data3, 'data4' => $data4, 'data5' => $data5]);
    }
}
