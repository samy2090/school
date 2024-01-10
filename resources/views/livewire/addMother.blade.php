@if ($currentStep == 2)
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
        <div class="col-lg-12">
            <div class="mb-3">
                <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button" wire:click="backStep">
                    {{trans('Parent_trans.Back')}}
                </button>

                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="button"
                        wire:click="nextStep">{{trans('Parent_trans.Next')}}</button>
            </div>
        </div>
    </div>
@endif