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
    $bloodMother, $religionMother, $addressMother, $email, $password,
    $currentStep = 1;


    // public function updated ($propertyName){
    //     $this->validateOnly( $propertyName, [
    //         'arName_father'=> 'required',
    //     ]);
    // }

    // public function rules()
    // {
    //     return [
    //         'arName_father' => 'required',
    //         'enName_father' => 'required',
    //         'jobFather_ar' => 'required',
    //         'jobFather_en' => 'required',
    //         'nationalID_father' => 'required',
    //         'passport_father' => 'required',
    //         'phoneFather' => 'required',
    //         'nationality_father' => 'required',
    //         'bloodFather' => 'required',
    //         'religionFather' => 'required',
    //         'addressFather' => 'required',
    //         'email' => 'required | email',
    //     ];
    // }

    // public function updated($property) {
    //     $this->validateOnly($property);
    // }
    
    public function nextStep()
    {
        $this->currentStep++ ;
    }
    public function backStep()
    {
        $this->currentStep-- ;
    }

    public function render()
    {
        return view('livewire.add-parents' , [
            'nationalities'=> Nationalitie::all(),
            'bloods'=> BloodType::all(),
            'religions'=> Religion::all()
        ]);
    }

    public function submitForm()
    {

        $parents = new StdParent;
            $parents->Email = $this->email;
            $parents->Password = $this->password;
            $parents->nameFather = json_encode(['en' => $this->arName_father, 'ar' => $this->arName_father]);
            $parents->national_ID_Father = $this->nationalID_father;
            $parents->passport_ID_Father = $this->passport_father;
            $parents->phoneFather = $this->phoneFather;
            $parents->jobFather = json_encode(['en' => $this->jobFather_en, 'ar' => $this->jobFather_ar]);
            $parents->nationality_Father = $this->nationality_father;
            $parents->bloodFather = $this->bloodFather;
            $parents->religionFather = $this->religionFather;
            $parents->addressFather = $this->addressFather;

            // Mother_INPUTS
            $parents->nameMother = json_encode(['en' => $this->enName_mother, 'ar' => $this->arName_mother]);
            $parents->national_ID_Mother = $this->nationalID_mother;
            $parents->passport_ID_Mother = $this->passport_mother;
            $parents->phoneMother = $this->phoneMother;
            $parents->jobMother = json_encode (['en' => $this->jobMother_en, 'ar' => $this->jobMother_ar]);
            $parents->nationality_Mother = $this->nationality_mother;
            $parents->bloodMother = $this->bloodMother;
            $parents->religionMother = $this->religionMother;
            $parents->addressMother = $this->addressMother;
        $parents->save();
        
    }


    
}
