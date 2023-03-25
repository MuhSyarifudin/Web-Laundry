<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;
    protected $table = 'layanan';
    protected $fillable = ['nama_layanan','harga_kiloan','harga_satuan'];
    public $timestamps = false;
}
