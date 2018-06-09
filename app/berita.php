<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class berita extends Model
{
    protected $table='beritas';
    protected $fillable=['kategori_id','konten'];
    public $timestamps=true;

    public function Kategori()
	{
		return $this->belongsto('App\kategori','kategori_id');
	}
}
