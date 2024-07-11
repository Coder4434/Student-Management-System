<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('not_girisi', function (Blueprint $table) {
            $table->id();
            $table->integer('ogrNo');
            $table->string("ders_kodu");
            $table->string("ders_adi");
            $table->integer("donem");
            $table->string('sinav_dönemi');
            $table->integer("sinav_not");
            $table->timestamps();

            $table->foreign('ogrNo')->references('ogrNo')->on("ogrenci");
            $table->foreign("ders_kodu")->references("ders_kodu")->on("ders_programi");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('not_girisi');
    }
};
