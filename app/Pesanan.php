<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $table = 'Pesanan';
    protected $fillable = ['pembayaran','id_status','id_user','id_list_harga','delivery','pickup','delivery_location','pickup_location'];
    protected $primaryKey = 'id_pesanan';
}
