<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCentralShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //این دیتابس برای فروشگاه مرکزی یک برند هست
    public function up()
    {
        Schema::create('central_shops', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('central_address');
            $table->string('central_phone');
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('central_shops');
    }
}
