<?php

namespace App\Http\Controllers;

use App\Mail\NotifyBorrowed;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MailNotifyBorrowed extends Controller
{
    public function NotifyBorrowed(Request $request)
    {
        $match = ['id_peminjaman' => $request->input('id_peminjaman')];
        $tran = DB::table('peminjaman')
        ->join('barang', 'peminjaman.barang_id', '=', 'barang.id_barang')
        ->join('users', 'users.id', '=', 'peminjaman.peminjam_id')
        ->join('category', 'category.id', '=', 'barang.category')
        ->where($match)
        ->first();
        // dd($tran);
        $bor = DB::table('peminjaman')
        ->select('name')
        ->join('users', 'users.id', '=', 'peminjaman.peminjam_id')
        ->where($match)
        ->first();
        // dd($bor);

        $mail = User::findOrFail($request->input('id_peminjam'));
        // dd($mail);
        Mail::to($mail)->send(new NotifyBorrowed(['tran' => $tran, 'bor' => $bor]));
        return back()->with('alert-success','Berhasil Kirim Email');
    }//
}
