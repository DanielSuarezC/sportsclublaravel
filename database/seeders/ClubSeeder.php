<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Club;

class ClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Club::create([
            'name' => 'Club Ajedrez Montería',
            'responsible' => 'Pedro Pérez',
            'location' => 'Montería - Centro',
            'contact_info' => 'club@ajedrez.com'
        ]);
    }
}
