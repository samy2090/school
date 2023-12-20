<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\BloodType;


class BloodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        /*
        ###########                 notice that you shoud add this two lines in any seeder                     ######################################
                                    use Illuminate\Support\Facades\DB;   in the top of seeder file
                                    use App\Models\..............;        the model namespace 
                                    and use function json_encode() if you add an array  its some time needed and sometime donot 
        */

         DB::table('blood_types')->truncate(); // truncate() for reset the table and begins from 1 for id it so it better from  delete()
        $bloodTypes = ['A+','A-','B+','B-','AB+','AB-','O+','O-' ];
        foreach($bloodTypes as $bloodType){
            BloodType::create(['name'=>$bloodType]);
        }

    }
}
