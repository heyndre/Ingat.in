<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\User;

class historyBorrow extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trx = DB::table('peminjaman')
        ->join('barang', 'peminjaman.barang_id', '=', 'barang.id_barang')
        ->join('users', 'peminjaman.id_pemilik', '=', 'users.id')
        ->join('category', 'category.id', '=', 'barang.category')
        ->get();

        // $trx = userPeminjaman::join('barang', 'barang.id_barang', '=', 'peminjaman.barang_id')
        // ->join('category', 'category.id', '=', 'barang.category')
        // ->join('users', 'users.id', '=', 'barang.pemilik_id')
        // ->get();
        // dd($trx);

        $member = User::all();
        return view ('history.borrow', ['data' => $trx, 'data2' => $member]);
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
        $match = ['peminjam_id' => $id];
        $trx = DB::table('peminjaman')
        ->join('barang', 'peminjaman.barang_id', '=', 'barang.id_barang')
        ->join('users', 'peminjaman.id_pemilik', '=', 'users.id')
        ->join('category', 'category.id', '=', 'barang.category')
        ->where($match)
        ->get();

        // $trx = userPeminjaman::join('barang', 'barang.id_barang', '=', 'peminjaman.barang_id')
        // ->join('category', 'category.id', '=', 'barang.category')
        // ->join('users', 'users.id', '=', 'barang.pemilik_id')
        // ->get();
        // dd($trx);

        $member = User::all();
        return view ('history.borrow', ['data' => $trx, 'data2' => $member]);
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
