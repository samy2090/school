<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\Nationalitie;
use App\Models\BloodType;
use App\Models\Religion;
use App\Models\StdParent;


class AddParents extends Component
{
    public
    ######### fatehr information #############
    $arName_father, $enName_father, $jobFather_ar, $jobFather_en,
    $nationalID_father, $passport_father, $phoneFather, $nationality_father,
    $bloodFather, $religionFather, $addressFather,

    ########## mother information #################
    $arName_mother, $enName_mother, $jobMother_ar, $jobMother_en, 
    $nationalID_mother, $passport_mother, $phoneMother, $nationality_mother,
    $bloodMother, $religionMother, $addressMother, $email, $password;


    // public function updated ($propertyName){
    //     $this->validateOnly( $propertyName, [
    //         'arName_father'=> 'required',
    //     ]);
    // }

    public function rules()
    {
        return [
            'arName_father' => 'required',
            'enName_father' => 'required',
            'jobFather_ar' => 'required',
            'jobFather_en' => 'required',
            'nationalID_father' => 'required',
            'passport_father' => 'required',
            'phoneFather' => 'required',
            'nationality_father' => 'required',
            'bloodFather' => 'required',
            'religionFather' => 'required',
            'addressFather' => 'required',
        ];
    }

    public function updated($property) {
        $this->validateOnly($property);
    }




    
    public function render()
    {
        return view('livewire.add-parents' , [
            'nationalities'=> Nationalitie::all(),
            'bloods'=> BloodType::all(),
            'religions'=> Religion::all()
        ]);


    }


    
}
