<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStreetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('streets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->unique()->comment('编码');
            $table->string('name')->default('')->comment('名称');
            $table->string('area_code')->index()->comment('县级编码');
            $table->string('city_code')->index()->comment('地级编码');
            $table->string('province_code')->index()->comment('省级编码');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('streets');
    }
}
