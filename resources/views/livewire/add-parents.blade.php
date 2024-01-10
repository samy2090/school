<div>
    <!-- Enable all steps -->
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button"
                    class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-success' }}">1</a>
                <p>{{ trans('Parent_trans.Step1') }}</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button"
                    class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-success' }}">2</a>
                <p>{{ trans('Parent_trans.Step2') }}</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button"
                    class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-success' }}"
                    disabled="disabled">3</a>
                <p>{{ trans('Parent_trans.Step3') }}</p>
            </div>
        </div>
    </div>

    @include('livewire.addFather')
    @include('livewire.addMother')
    @include('livewire.confirmParents')
</div>
{{-- <form class="wizard-form steps-enable-all" action="#">
    <h6>{{ trans('addParents.fatherInfo') }}</h6>
    <fieldset>
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label">{{ trans('addParents.arName_father') }}</label>
                    <input type="text" class="form-control" placeholder="{{ trans('addParents.arName_father') }}" wire:model.blur='arName_father'>
                    @error('arName_father')
                        <div class="alert alert-danger">{{$message}} </div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label">{{ trans('addParents.enName_father') }}</label>
                    <input type="text" class="form-control" placeholder="{{ trans('addParents.enName_father') }}"  wire:model.blur='enName_father'>
                    @error('enName_father')
                        <div class="alert alert-danger">{{$message}} </div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-3">
                <div class="mb-3">
                    <label class="form-label">{{ trans('addParents.jobFather_ar') }}</label>
                    <input type="text" class="form-control" placeholder="{{ trans('addParents.jobFather_ar') }}" wire:model.blur='jobFather_ar'>
                    @error('jobFather_ar')
                        <div class="alert alert-danger">{{$message}} </div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-3">
                <div class="mb-3">
                    <label class="form-label">{{ trans('addParents.jobFather_en') }}</label>
                    <input type="text" class="form-control" placeholder="{{ trans('addParents.jobFather_en') }}" wire:model.blur='jobFather_en'>
                    @error('jobFather_en')
                        <div class="alert alert-danger">{{$message}} </div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-2">
                <div class="mb-3">
                    <label class="form-label">{{ trans('addParents.nationalID_father') }}</label>
                    <input type="text" class="form-control" placeholder="{{ trans('addParents.nationalID_father') }}" wire:model.blur='nationalID_father'>
                    @error('nationalID_father')
                        <div class="alert alert-danger">{{$message}} </div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-2">
                <div class="mb-3">
                    <label class="form-label">{{ trans('addParents.passport_father') }}</label>
                    <input type="text" class="form-control" placeholder="{{ trans('addParents.passport_father') }}" wire:model.blur='passport_father'>
                    @error('passport_father')
                        <div class="alert alert-danger">{{$message}} </div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-2">
                <div class="mb-3">
                    <label class="form-label">{{ trans('addParents.phoneFather') }}</label>
                    <input type="text" class="form-control" placeholder="{{ trans('addParents.phoneFather') }}" wire:model.blur='phoneFather'>
                    @error('phoneFather')
                        <div class="alert alert-danger">{{$message}} </div>
                    @enderror
                </div>
            </div>

            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label">{{ trans('addParents.nationality_father') }}</label>
                    <select name="nationality_father"  wire:model.blur='nationality_father' class="form-select">
                        @foreach ($nationalities as $nationalitie )
                            <option value="{{$nationalitie->id}}">{{$nationalitie->name}}</option>
                        @endforeach
                    </select>
                    @error('nationality_father')
                        <div class="alert alert-danger">{{$message}} </div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-3">
                <div class="mb-3">
                    <label class="form-label">{{ trans('addParents.bloodFather') }}</label>
                    <select name="bloodFather" wire:model.blur='bloodFather' class="form-select">
                        @foreach ($bloods as $blood)
                            <option value="{{$blood->id}}">{{$blood->name}}</option>
                        @endforeach
                    </select>
                    @error('bloodFather')
                        <div class="alert alert-danger">{{$message}} </div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-3">
                <div class="mb-3">
                    <label class="form-label">{{ trans('addParents.religionFather') }}</label>
                    <select name="religionFather" wire:model.blur='religionFather' class="form-select">
                        @foreach ($religions as $religion)
                            <option value="{{$religion->id}}">{{$religion->name}}</option>
                        @endforeach
                    </select>
                    @error('religionFather')
                        <div class="alert alert-danger">{{$message}} </div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-12">
                <div class="mb-3">
                    <label class="form-label">{{ trans('addParents.addressFather') }}</label>
                    <textarea rows="3" cols="3" class="form-control" placeholder="{{ trans('addParents.addressFather') }}" wire:model.blur='addressFather'></textarea>
                    @error('addressFather')
                        <div class="alert alert-danger">{{$message}} </div>
                    @enderror
                </div>
            </div>
        </div>
    </fieldset>

    <h6>{{ trans('addParents.matherInfo') }}</h6>
    <fieldset>
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label">{{ trans('addParents.arName_mother') }}</label>
                    <input type="text" class="form-control" placeholder="{{ trans('addParents.arName_mother') }}" name="arName_mother" wire:model.blur='arName_mother'>
                    @error('arName_mother')
                        <div class="alert alert-danger">{{$message}} </div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label">{{ trans('addParents.enName_mother') }}</label>
                    <input type="text" class="form-control" placeholder="{{ trans('addParents.enName_mother') }}" name="enName_mother" wire:model.blur='enName_mother'>
                    @error('enName_mother')
                        <div class="alert alert-danger">{{$message}} </div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-3">
                <div class="mb-3">
                    <label class="form-label">{{ trans('addParents.jobMother_ar') }}</label>
                    <input type="text" class="form-control" placeholder="{{ trans('addParents.jobMother_ar') }}" name="jobMother_ar" wire:model.blur='jobMother_ar'>
                    @error('jobMother_ar')
                        <div class="alert alert-danger">{{$message}} </div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-3">
                <div class="mb-3">
                    <label class="form-label">{{ trans('addParents.jobMother_en') }}</label>
                    <input type="text" class="form-control" placeholder="{{ trans('addParents.jobMother_en') }}" name="jobMother_en" wire:model.blur='jobMother_en'>
                    @error('jobMother_en')
                        <div class="alert alert-danger">{{$message}} </div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-2">
                <div class="mb-3">
                    <label class="form-label">{{ trans('addParents.nationalID_mother') }}</label>
                    <input type="text" class="form-control" placeholder="{{ trans('addParents.nationalID_mother') }}" name="nationalID_mother" wire:model.blur='nationalID_mother'>
                    @error('nationalID_mother')
                        <div class="alert alert-danger">{{$message}} </div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-2">
                <div class="mb-3">
                    <label class="form-label">{{ trans('addParents.passport_mother') }}</label>
                    <input type="text" class="form-control" placeholder="{{ trans('addParents.passport_mother') }}" name="passport_mother" wire:model.blur='passport_mother'>
                    @error('passport_mother')
                        <div class="alert alert-danger">{{$message}} </div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-2">
                <div class="mb-3">
                    <label class="form-label">{{ trans('addParents.phoneMother') }}</label>
                    <input type="text" class="form-control" placeholder="{{ trans('addParents.phoneMother') }}" name="phoneMother" wire:model.blur='phoneMother'>
                    @error('phoneMother')
                        <div class="alert alert-danger">{{$message}} </div>
                    @enderror
                </div>
            </div>

            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label">{{ trans('addParents.nationality_mother') }}</label>
                    <select name="nationality_mother" wire:model.blur='nationality_mother' class="form-select" >
                        @foreach ($nationalities as $nationalitie )
                            <option value="{{$nationalitie->id}}">{{$nationalitie->name}}</option>
                        @endforeach
                    </select>
                    @error('nationality_mother')
                        <div class="alert alert-danger">{{$message}} </div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-3">
                <div class="mb-3">
                    <label class="form-label">{{ trans('addParents.bloodMother') }}</label>
                    <select name="bloodMother" wire:model.blur='bloodMother' class="form-select">
                        @foreach ($bloods as $blood)
                            <option value="{{$blood->id}}">{{$blood->name}}</option>
                        @endforeach
                    </select>
                    @error('bloodMother')
                        <div class="alert alert-danger">{{$message}} </div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-3">
                <div class="mb-3">
                    <label class="form-label">{{ trans('addParents.religionMother') }}</label>
                    <select name="religionMother" wire:model.blur='religionMother' class="form-select">
                        @foreach ($religions as $religion)
                            <option value="{{$religion->id}}">{{$religion->name}}</option>
                        @endforeach
                    </select>
                    @error('religionMother')
                        <div class="alert alert-danger">{{$message}} </div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-12">
                <div class="mb-3">
                    <label class="form-label">{{ trans('addParents.addressMother') }}</label>
                    <textarea rows="3" cols="3" class="form-control" placeholder="{{ trans('addParents.addressMother') }}" wire:model.blur='addressMother'></textarea>
                    @error('addressMother')
                        <div class="alert alert-danger">{{$message}} </div>
                    @enderror
                </div>
            </div>
        </div>
    </fieldset>


    <h6>{{ trans('addParents.confirm') }}</h6>
    <fieldset>
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label">{{ trans('addParents.email') }}</label>
                    <input type="text" class="form-control" placeholder="{{ trans('addParents.email') }}" name="email" wire:model.blur='email'>
                    @error('email')
                        <div class="alert alert-danger">{{$message}} </div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label">{{ trans('addParents.password') }}</label>
                    <input type="password" class="form-control" placeholder="{{ trans('addParents.password') }}" name="password" wire:model.blur='password'>
                    @error('password')
                        <div class="alert alert-danger">{{$message}} </div>
                    @enderror
                </div>
            </div>
        </div>


    </fieldset>
</form> --}}



