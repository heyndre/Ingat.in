<?php

namespace App\Http\Controllers;

use App\categoryModel;
use Illuminate\Http\Request;
use Auth;
use App\userBarang;
use Illuminate\Support\Facades\DB;
use Image;

class barang extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userID = Auth::user()->id;
        $data = userBarang::where('pemilik_id',$userID)->get();
        $item = DB::table('barang')
            ->join('category', 'category.id', '=', 'barang.category')
            ->get();

        return view('card.barang_list', ['barang' => $item]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kat = categoryModel::all();
        return view('barang.tambah', ['kat' => $kat]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

          $user = Auth::user()->id;
          $hotel = new userBarang();
          $hotel->nama_barang = $request->input('namaBarang');
          $hotel->deskripsi = $request->input('deskripsiBarang');
          $hotel->category = $request->input('kategoriBarang');
          $hotel->pemilik_id = $user;

          //Save image
          if ($request->hasfile('gambarBarang')) {
            $image = $request->file('gambarBarang');
            $filename = time() . $image->getClientOriginalName();
            $location = 'barang/'.$filename;
            Image::make($image)->resize(480, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($location);
            // Image::make($image)->save($location);

            $hotel->image = $filename;
          }
          // dd($hotel);

          try {
            $hotel->save();
          } catch (Exception $e) {
            report($e);
            return false;
          }

          return redirect(route('user_barang.index'));
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
        $match = ['id_barang' => $id];
        $tran = DB::table('peminjaman')
        ->join('barang', 'peminjaman.barang_id', '=', 'barang.id_barang')
        ->join('users', 'users.id', '=', 'peminjaman.peminjam_id')
        ->join('category', 'category.id', '=', 'barang.category')
        ->where($match)
        ->get();
        $trx = DB::table('users')
        ->join('peminjaman', 'users.id', '=', 'peminjaman.peminjam_id')
        ->where('id_pemilik', '=', $userID)
        ->get();
        // dd($tran);
        // $stuff = userBarang::select('id')->where('pemilik_id', $userID);
        // $data = userPeminjaman::wherein('pemilik_id', $stuff)->where('pemilik_id',$userID)->whereNull('waktu_kembali')->get();
        
        return view('barang.detail', ['item' => $tran, 'usage' => $trx]);
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
