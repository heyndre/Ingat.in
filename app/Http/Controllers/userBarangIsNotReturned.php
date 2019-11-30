<?php

namespace App\Http\Controllers;
use App\userPeminjaman;
use App\userBarang;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class userBarangIsNotReturned extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userID = Auth::user()->id;
        $match = ['waktu_kembali' => null, 'id_pemilik' => $userID];
        $tran = DB::table('peminjaman')
        ->join('barang', 'peminjaman.barang_id', '=', 'barang.id_barang')
        ->join('users', 'users.id', '=', 'peminjaman.peminjam_id')
        ->join('category', 'category.id', '=', 'barang.category')
        ->where($match)
        ->get();
        // dd($tran);
        // $stuff = userBarang::select('id')->where('pemilik_id', $userID);
        // $data = userPeminjaman::wherein('pemilik_id', $stuff)->where('pemilik_id',$userID)->whereNull('waktu_kembali')->get();
        
        return view('card.barangsaya_dipinjam', ['barang' => $tran]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userID = Auth::user()->id;
        $match = ['id_peminjaman' => $id];
        $tran = DB::table('peminjaman')
        ->join('barang', 'peminjaman.barang_id', '=', 'barang.id_barang')
        ->join('users', 'users.id', '=', 'peminjaman.peminjam_id')
        ->join('category', 'category.id', '=', 'barang.category')
        ->where($match)
        ->get();
        $trx = DB::table('user')
        ->select('nama')
        ->join('users', 'users.id', '=', 'peminjaman.peminjam_id')
        ->where('id_pemilik', '=', $userID)
        ->get();
        // dd($tran);
        // $stuff = userBarang::select('id')->where('pemilik_id', $userID);
        // $data = userPeminjaman::wherein('pemilik_id', $stuff)->where('pemilik_id',$userID)->whereNull('waktu_kembali')->get();
        
        return view('pinjam.masih_dipinjam', ['barang' => $tran, 'peminjam' => $trx]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
