<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Nationalitie;
use App\Models\BloodType;
use App\Models\Religion;
use App\Models\StdParent;
use App\Models\ParentAttach;


class AddParents extends Component
{
    use WithFileUploads;

    public
    ######### fatehr information #############
    $arName_father, $enName_father, $jobFather_ar, $jobFather_en,
    $nationalID_father, $passport_father, $phoneFather, $nationality_father,
    $bloodFather, $religionFather, $addressFather,

    ########## mother information #################
    $arName_mother, $enName_mother, $jobMother_ar, $jobMother_en, 
    $nationalID_mother, $passport_mother, $phoneMother, $nationality_mother,
    $bloodMother, $religionMother, $addressMother,
    ######### other information ###################
    $email, $password, $parent_id,
    $currentStep = 1, $showTable = true, $updateMode = false,
    $photos ;

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
            'email' => 'required | email',
        ];
    }

    public function updated($property) {
        $this->validateOnly($property);
    }
    
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
            'religions'=> Religion::all(),
            'parents'=> StdParent::all()
        ]);
    }

    public function submitForm()
    {

        $parents = new StdParent;
            $parents->Email = $this->email;
            $parents->Password = $this->password;
            $parents->nameFather = json_encode(['en' => $this->enName_father, 'ar' => $this->arName_father]);
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

        if(!empty($this->photos)){
            foreach($this->photos as $photo){
                $photo->storeAs($this->nationalID_father,$photo->getClientOriginalName(),$disk = 'parent_attachments');
                ParentAttach::create([
                    'file_name'=> $photo->getClientOriginalName(),
                    'parent_id'=> StdParent::latest()->first()->id,
                ]);
                    return $photo;
            }
        }
        $this->successMessage = trans('messages.success');
        $this->currentStep = 1;
        
    }

    public function showFormAdd(){
        $this->showTable = false;

    }

    public function showUpdateForm($id){
        $this->updateMode   = true;
        $this->showTable    = false;
        $this->parent_id    = $id; 
        $parent = StdParent::where('id',$this->parent_id)->first();
        ## father information 
        $this->email                = $parent->Email;
        $this->password             = $parent->Password;

        $this->arName_father        = $parent->getTranslation('nameFather','ar');
        $this->enName_father        = $parent->getTranslation('nameFather','en');
        $this->nationalID_father    = $parent->national_ID_Father;
        $this->passport_father      = $parent->passport_ID_Father;
        $this->phoneFather          = $parent->phoneFather;
        $this->jobFather_ar         = $parent->getTranslation('jobFather','ar');
        $this->jobFather_en         = $parent->getTranslation('jobFather','en');
        $this->nationality_father   = $parent->nationality_Father;
        $this->bloodFather          = $parent->bloodFather;
        $this->religionFather       = $parent->religionFather;
        $this->addressFather        = $parent->addressFather;
        ## mother information 
        $this->enName_mother        = $parent->getTranslation('nameMother','en');
        $this->arName_mother        = $parent->getTranslation('nameMother','ar');
        $this->nationalID_mother    = $parent->national_ID_Mother;
        $this->passport_mother      = $parent->passport_ID_Mother;
        $this->phoneMother          = $parent->phoneMother;
        $this->jobMother_en         = $parent->getTranslation('jobMother','en');
        $this->jobMother_ar         = $parent->getTranslation('jobMother','ar');
        $this->nationality_mother   = $parent->nationality_Mother;
        $this->bloodMother          = $parent->bloodMother;
        $this->religionMother       = $parent->religionMother;
        $this->addressMother        = $parent->addressMother;
    }

    public function submitUpdateForm(){
        $parent = StdParent::find($this->parent_id);
        $parent->update([
            'Email'                 => $this->email,
            'Password'              => $this->password,
            'nameFather'            => ['en' => $this->enName_father, 'ar' => $this->arName_father],
            'national_ID_Father'    => $this->nationalID_father,
            'passport_ID_Father'    => $this->passport_father,
            'phoneFather'           => $this->phoneFather,
            'jobFather'             => ['en' => $this->jobFather_en, 'ar' => $this->jobFather_ar],
            'nationality_Father'    => $this->nationality_father,
            'bloodFather'           => $this->bloodFather,
            'religionFather'        => $this->religionFather,
            'addressFather'         => $this->addressFather,

            // Mother_INPUTS
            'nameMother'            => ['en' => $this->enName_mother, 'ar' => $this->arName_mother],
            'national_ID_Mother'    => $this->nationalID_mother,
            'passport_ID_Mother'    => $this->passport_mother,
            'phoneMother'           => $this->phoneMother,
            'jobMother'             => ['en' => $this->jobMother_en, 'ar' => $this->jobMother_ar],
            'nationality_Mother'    => $this->nationality_mother,
            'bloodMother'           => $this->bloodMother,
            'religionMother'        => $this->religionMother,
            'addressMother'         => $this->addressMother,
        ]);
        $this->successMessage = trans('messages.success');
        return redirect(request()->header('Referer'));
    }

    
}
