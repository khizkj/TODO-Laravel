<?php

namespace Database\Seeders;

use App\Models\todo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class todoseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        todo::factory()->count(200)->create();
    }
}
