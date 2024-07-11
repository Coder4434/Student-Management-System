<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSifreToOgrenciTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ogrenci', function (Blueprint $table) {
            $table->string('sifre')->nullable(); // sifre sütununu ekliyoruz

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ogrenci', function (Blueprint $table) {
            $table->dropColumn('sifre'); // geri alma işlemi için sifre sütununu kaldırıyoruz
        });
    }
}
