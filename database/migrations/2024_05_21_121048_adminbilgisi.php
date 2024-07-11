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
        Schema::create('adminbilgisi', function (Blueprint $table) {
            $table->id();
            $table->string("numara")->unique()->default($this->generateRandomNumber());
            $table->string("bolum");
            $table->string("isim");
            $table->string("soyad");
            $table->string("fakulte");
            $table->string("danısmansınıf");
            $table->string("sifre");
            $table->timestamps();
        });
    }

    protected function generateRandomNumber()
    {
        return str_pad(mt_rand(10000, 99999), 5, '0', STR_PAD_LEFT);
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adminbilgisi');
    }
};
