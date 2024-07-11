<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('onay', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ogrid');
            $table->unsignedBigInteger('danismanid');
            $table->foreign('ogrid')->references('id')->on('ogrenci');
            $table->foreign('danismanid')->references('id')->on('adminbilgisi');
            $table->tinyInteger('ogronay')->default(0); // Default value set to 0
            $table->string('danismanonay')->default(0);
            $table->string('donem')->nullable();
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
        Schema::dropIfExists('onay');
    }
}
