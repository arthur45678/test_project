<?php

namespace Database\Seeders;

use App\Models\Disease;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiseaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $diseases = [
            'Flu',
            'Cold',
            'COVID-19',
            'Diabetes',
            'Hypertension',
            'Asthma'
        ];

        foreach ($diseases as $d) {
            Disease::create(['name' => $d]);
        }
    }
}
