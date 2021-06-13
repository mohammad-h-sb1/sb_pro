<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rate_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');
            $table->string('material_quality');//کفیت مواد
            $table->string('sewingـquality');//کیفیت دوخت
            $table->string('clothـdesign'); //کیفت طراحی
            $table->string('clothing');//فرم لباس
            $table->string('worth_buying');//ارزش خرید لباس

            $table->timestamps();
        });

        //این مایگریشن برای کیفیت جنس میباشد فقط
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rate_products');
    }
}
