<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Event::create([
            'club_id' => 1,
            'name' => 'Torneo de Apertura',
            'description' => 'Primer torneo oficial del año.',
            'start_time' => now()->addDays(5),
            'duration' => 180,
            'location' => 'Sede Central',
            'type' => 'torneo',
            'visibility' => 'publico'
        ]);
    }
}
