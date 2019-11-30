<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userBarang extends Model
{
    protected $primaryKey = 'id_barang';
    protected $table = 'barang';
    protected $guarded = [];

    function owner() {
        return $this->belongsTo('App\User');
    }
    function borrow() {
        return $this->belongsTo('App\userPeminjaman');
    }

    function cat() {
        return $this->belongsTo('App\categoryModel', 'category');
    }
}
