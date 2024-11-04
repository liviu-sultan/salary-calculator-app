<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaxBandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tax_bands')->insert([
            [
                'name' => 'Band A',
                'annual_salary_range_min' => 0,
                'annual_salary_range_max' => 5000,
                'rate' => 0,
            ],
            [
                'name' => 'Band B',
                'annual_salary_range_min' => 5000,
                'annual_salary_range_max' => 20000,
                'rate' => 20,
            ],
            [
                'name' => 'Band C',
                'annual_salary_range_min' => 20000,
                'annual_salary_range_max' => null, // No max limit for this band
                'rate' => 40,
            ],
        ]);
    }
}
