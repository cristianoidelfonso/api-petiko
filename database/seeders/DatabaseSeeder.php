<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if(Storage::exists('produtos')){
            Storage::deleteDirectory('produtos');
        }
        Storage::makeDirectory('produtos');

        $this->call([
            UserSeeder::class,
            ProdutoSeeder::class,
        ]);
    }
}
