<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Religion;
use Illuminate\Support\Facades\DB;



class ReligionSeeder extends Seeder
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
        


        
        DB::table('religions')->truncate();
        $religions = [
            [
                'en'=> 'Muslim',
                'ar'=> 'مسلم'
            ],
            [
                'en'=> 'Christian',
                'ar'=> 'مسيحي'
            ],
            [
                'en'=> 'Other',
                'ar'=> 'غيرذلك'
            ],
        ];
        foreach($religions as $religion){
            Religion::create(['name'=>json_encode($religion)]);
        }
    }
}
