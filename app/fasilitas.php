<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fasilitas extends Model
{
    protected $table='fasilitas';
    protected $fillable=['nama_fasilitas','keterangan'];
    public $timestamps=true;

        public function galleri()
	{
		return $this->hasMany('App\galleri','fasilitas_id');
	}
	public function Ekskul()
	{
		return $this->hasMany('App\ekskul','fasilitas_id');
	}

}
