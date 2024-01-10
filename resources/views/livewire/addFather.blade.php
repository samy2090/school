@if ($currentStep == 1 )
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
        <div class="col-lg-12">
            <div class="mb-3">
                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right col-lg-2" wire:click="nextStep"
                type="button">{{trans('Parent_trans.Next')}}
                </button>
            </div>
        </div>
    </div>
    
@endif

