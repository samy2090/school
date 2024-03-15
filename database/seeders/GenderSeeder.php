<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Gender;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('genders')->delete();
        $genders = [
            ['ar'=>'ذكر','en'=>'male'],
            ['ar'=>'انثي','en'=>'female']
        ];
        foreach ($genders as $gender){
            Gender::create(['name'=>$gender]);
        }
    }
}
