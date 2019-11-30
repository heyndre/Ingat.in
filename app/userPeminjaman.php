<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userPeminjaman extends Model
{
    protected $primaryKey = 'id_peminjaman';
    protected $table = 'peminjaman';

    const CREATED_AT = 'created_at_pinjaman';

    function owner() {
        return $this->hasOne('App\User');
    }
    function stuff() {
        return $this->hasOne('App\userBarang');
    }
}
