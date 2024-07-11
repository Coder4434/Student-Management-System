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
        Schema::create('table_sinav_takvimi', function (Blueprint $table) {
            $table->id();
            $table->string('ders_kodu');
            $table->string('ders_adi');
            $table->string("sinav_yeri");
            $table->string("sinav_tarihi");
            $table->enum("sinav_donemi",["vize","final"]);
            $table->timestamps();

            $table->foreign("ders_kodu")->references("ders_kodu")->on("ders_programi");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_sinav_takvimi');
    }
};
