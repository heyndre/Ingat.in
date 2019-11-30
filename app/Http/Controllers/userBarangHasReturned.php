<?php

namespace App\Http\Controllers;
use App\userBarang;
use App\userPeminjaman;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class userBarangHasReturned extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userID = Auth::user()->id;
        $match = ['id_pemilik' => $userID, 'waktu_kembali' => null];
        $tran = DB::table('barang')
        ->crossjoin('peminjaman', 'peminjaman.barang_id', '=', 'barang.id_barang')
        ->where($match)
        ->get();

        $stuff = userBarang::select('id_barang')->where('id_pemilik', $userID);
        $data = userPeminjaman::wherein('id_pemilik', $stuff)->where('id_pemilik',$userID)->whereNotNull('waktu_kembali')->get();
        
        return view('card.barangsaya_kembali', ['barang' => $tran]);
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
        //
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
