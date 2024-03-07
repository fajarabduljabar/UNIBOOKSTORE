<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penerbit;
use Illuminate\Support\Carbon;

class Buku extends Model
{
    use HasFactory;

    protected $table = "buku";
    public $timestamps = false;
    public function penerbite()
    {
        return $this->belongsTo(Penerbit::class, 'penerbit_id', 'id');
    }

}
