<?php

namespace Database\Seeders;

use App\Models\DersListesi;
use App\Models\NotGirisiModel;
use App\Models\OgrenciModel;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         //User::factory(10)->create();


            User::factory()->create([
                 'name' => 'admin',
                 'email' => 'admin@example.com',
                 'password'=>'123123',
                  'status' =>1,

             ]);




        //DersListesi::factory(10)->create();
        OgrenciModel::factory(50)->create();
        //NotGirisiModel::factory(50)->create();
    }
}
