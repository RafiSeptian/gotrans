<?php

use App\Major;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $majors = [
            'Pujasera',
            'Dawuan',
            'Tanjung Siang',
            'Soklat',
            'Cipendeuy'
        ];

        foreach ($majors as $major) {
            Major::create([
                'name' => $major
            ]);
        }
    }
}
