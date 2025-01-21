<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $grades = [
            '1',
            '2',
            '3',
            '4',
            '5',
            '6'
        ];
         foreach ($grades as $grade) {
            Grade::create([
                'grade' => $grade
            ]);
        }
    }
}
