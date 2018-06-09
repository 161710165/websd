<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
    protected $table='gurus';
    protected $fillable=['nama_guru','profil_guru','nip','jabatan'];
    public $timestamps=true;

    public function Ekskul()
	{
		return $this->hasOne('App\ekskul','guru_id');
	}

}
