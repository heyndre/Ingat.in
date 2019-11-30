<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoryModel extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'category';

    function barang() {
        return $this->hasMany('App\userBarang', 'id');
    }
}
