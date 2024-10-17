<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Makanan extends Model
{
  protected $table = 'makanan';
  protected $fillable = ['gambar','nama_makanan'];
    public function detail()
    {
        return $this->hasOne(DetailMakanan::class, 'makanan_id', 'id');
    }
}
