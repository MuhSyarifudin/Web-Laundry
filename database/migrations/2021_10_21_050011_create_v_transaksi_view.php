<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\QueryException;

class CreateVTransaksiView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE VIEW IF NOT EXISTS v_transaksi as
         select pesanan.id_pesanan,
         layanan.nama_layanan,
         layanan.harga_kiloan,
         layanan.harga_satuan,
         pesanan.pickup,
         pesanan.delivery,
         pesanan.pickup_location,
         pesanan.delivery_location,
         pesanan.pembayaran,
         pesanan.id_status as status,
         users.name,
         pesanan.created_at
          from pesanan left join users on pesanan.id_user = users.id
           left join layanan on pesanan.id_list_harga = layanan.id;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('v_transaksi');
    }
}
