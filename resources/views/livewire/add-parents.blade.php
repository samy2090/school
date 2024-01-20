<div>
    @if ($showTable)
        @include('livewire.parentList')
    @else
        <div>
            <!-- Enable all steps -->
            <div class="stepwizard">
                <div class="stepwizard-row setup-panel">
                    <div class="stepwizard-step">
                        <a href="#step-1" type="button"
                            class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-success' }}">1</a>
                        <p>{{ trans('addParents.fatherInfo') }}</p>
                    </div>
                    <div class="stepwizard-step">
                        <a href="#step-2" type="button"
                            class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-success' }}">2</a>
                        <p>{{ trans('addParents.matherInfo') }}</p>
                    </div>
                    <div class="stepwizard-step">
                        <a href="#step-3" type="button"
                            class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-success' }}"
                            disabled="disabled">3</a>
                        <p>{{ trans('addParents.confirm') }}</p>
                    </div>
                </div>
            </div>

            @include('livewire.addFather')
            @include('livewire.addMother')
            @include('livewire.confirmParents')
        </div>

    @endif
</div>