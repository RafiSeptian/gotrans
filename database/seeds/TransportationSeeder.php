<?php

use Illuminate\Database\Seeder;
use App\Transportation;

class TransportationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trans = [
            'Angkot',
            'Elf',
            'Mini Bus'
        ];

        foreach ($trans as $content) {
            Transportation::create([
                'name' => $content
            ]);
        }
    }
}
