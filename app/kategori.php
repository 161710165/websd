<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    protected $table='kategoris';
    protected $fillable=['judul'];
    public $timestamps=true;

    public function Berita()
	{
		return $this->hasMany('App\berita','kategori_id');
	}
}
