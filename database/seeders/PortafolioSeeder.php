<?php

namespace Database\Seeders;

use App\Models\Portafolio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortafolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Portafolio::factory(10)->create();
        
    }
}
