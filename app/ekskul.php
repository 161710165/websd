<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ekskul extends Model
{
    protected $table='ekskuls';
    protected $fillable=['nama_ekskul','guru_id','fasilitas_id'];
    public $timestamps=true;

        public function Guru()
	{
		return $this->belongsto('App\guru','guru_id');
	}
	public function Fasilitas()
	{
		return $this->belongsto('App\fasilitas','fasilitas_id');
	}
}
