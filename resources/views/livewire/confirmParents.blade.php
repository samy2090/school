@if ($currentStep == 3)
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
        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label">{{ trans('addParents.attachments') }}</label>
                <input type="file" class="form-control" multiple wire:model='photos'>
                @error('photos')
                    <div class="alert alert-danger">{{$message}} </div>
                @enderror
            </div>
        </div>
    </div>
    <div  class="col-lg-6">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3 style="font-family: 'Cairo', sans-serif;">هل انت متاكد من حفظ البيانات ؟</h3><br>
                <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button"
                    wire:click="backStep">{{ trans('addParents.back') }}
                </button>
                @if ($updateMode)
                    <button class="btn btn-success btn-sm btn-lg pull-right" wire:click="submitUpdateForm"
                        type="button">{{ trans('addParents.finish') }}
                    </button>
                @else
                <button class="btn btn-success btn-sm btn-lg pull-right" wire:click="submitForm"
                    type="button">{{ trans('addParents.finish') }}
                </button>
                @endif

            </div>
        </div>
    </div>
@endif