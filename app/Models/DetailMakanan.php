<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailMakanan extends Model
{
    protected $table = 'detail_makanan';
    protected $fillable = ['makanan_id','detail'];

    public function makanan()
    {
        return $this->belongsTo(Makanan::class, 'makanan_id', 'id');
    }
}
