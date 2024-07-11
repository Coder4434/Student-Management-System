<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDersIdToOgrenciTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ogrenci', function (Blueprint $table) {
            // `ders_id` sütununu JSON türünde ekler
            $table->json('ders_id')->nullable()->after('sifre');
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
            // `ders_id` sütununu kaldırır
            $table->dropColumn('ders_id');
        });
    }
}

