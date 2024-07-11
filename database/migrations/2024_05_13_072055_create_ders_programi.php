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
        Schema::create('ders_programi', function (Blueprint $table) {
            $table->id();
            $table->string("ders_kodu")->unique();
            $table->string("ders_adi");
            $table->string("ders_kredisi");
            $table->string("ders_Ogretmen");
            $table->enum("zorunlu_secmeli",["Zorunlu","Secmeli"])->nullable();
            $table->string("ders_AKTS")->nullable();
            $table->string("ders_Saati")->nullable();
            $table->string("ders_sinif")->nullable();
            $table->string("donem")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ders_programi');
    }
};
