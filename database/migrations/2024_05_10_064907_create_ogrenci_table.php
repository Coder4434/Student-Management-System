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
        Schema::create('ogrenci', function (Blueprint $table) {
            $table->id();
            $table->integer('ogrNo')->unique();
            $table->string('adSoyad');
            $table->string("sinif");
            $table->string("bolum");
            $table->float("GNO");
            $table->string('Kayıt Tarihi');
            $table->text("Dersler")->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ogrenci');
    }
};
