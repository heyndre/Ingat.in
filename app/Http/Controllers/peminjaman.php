<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\userBarang;
use App\categoryModel;
use App\userPeminjaman;
use Illuminate\Support\Facades\DB;

class peminjaman extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userID = Auth::user()->id;
        $data = DB::table('peminjaman')
        ->join('barang', 'peminjaman.barang_id', '=', 'barang.id_barang')
        ->join('users', 'peminjaman.id_pemilik', '=', 'users.id')
        ->join('category', 'category.id', '=', 'barang.category')
        ->where('confirmed', 'true')
        ->orderBy('barang_id')
        ->get();
        // dd($data);
        return view('pinjam.pengajuan_kesaya', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $test = userPeminjaman::select('barang_id')->whereNotNull('waktu_kembali');
        $mine = userBarang::select('id_barang')->where('pemilik_id', Auth::user()->id);
        $item = DB::table('barang')
        ->join('category', 'category.id', '=', 'barang.category')
        ->join('users', 'barang.pemilik_id', '=', 'users.id')
        ->whereNotIn('id_barang', $test, 'and')
        ->whereNotIn('id_barang', $mine)->get();
        // dd($item);
        return view ('pinjam.list', ['barang' => $item]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $kat = new userPeminjaman();
          $kat->id_pemilik = $request->input('owner');
          $kat->peminjam_id = $request->input('proposer');
          $kat->barang_id = $request->input('barang');
  
          try {
            $kat->save();
          } catch (Exception $e) {
            report($e);
            return false;
          }
  
        return redirect(route('user_peminjaman.index'));
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
        $stuff = DB::table('barang')
        ->join('category', 'category.id', '=', 'barang.category')
        ->join('users', 'users.id', '=', 'barang.pemilik_id')
        ->where('id_barang', $id)->get();
        $tran = DB::table('peminjaman')
        ->join('barang', 'peminjaman.barang_id', '=', 'barang.id_barang')
        ->join('users', 'users.id', '=', 'peminjaman.peminjam_id')
        ->where('id_barang', $id)->get();
        // dd($stuff);
        return view ('pinjam.detail', ['item' => $stuff, 'usage' => $tran]);
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
        $kat = userPeminjaman::findOrFail($id);
        $kat->confirmed = $request->input('confirm');

        try {
          $kat->save();
        } catch (Exception $e) {
          report($e);
          return false;
        }
        Session::flash('alert-success', 'Pengajuan berhasil disetujui');
      return redirect(route('user_peminjaman.index'));
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
