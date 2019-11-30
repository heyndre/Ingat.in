<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class userMeminjam extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $match = ['peminjam_id' => Auth::user()->id, 'waktu_kembali' => null];
        $trx = DB::table('peminjaman')
        ->join('barang', 'peminjaman.barang_id', '=', 'barang.id_barang')
        ->join('users', 'peminjaman.id_pemilik', '=', 'users.id')
        ->join('category', 'category.id', '=', 'barang.category')
        ->where($match)
        ->get();

        $trs = DB::table('peminjaman')
        ->select('id_pemilik')
        ->where($match);

        $trn = DB::table('users')
        ->whereNotIn('id', $trs)
        ->get();

        $type = 'Barang Belum Dikembalikan';

        // dd($trx);

        return view ('peminjaman.list', ['data' => $trx, 'type' => $type, 'data2' => $trn]);
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
