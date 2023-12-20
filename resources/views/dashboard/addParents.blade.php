@extends('dashboard.layouts.master')

@section('css')
@livewireStyles
<script src="{{asset('dashassets/js/jquery/jquery.min.js')}}"></script>
<script src="{{asset('dashassets/js/vendor/forms/wizards/steps.min.js')}}"></script>
<script src="{{asset('dashassets/demo/pages/form_wizard.js')}}"></script>
{{-- <script src="{{asset('dashassets/js/vendor/forms/validation/validate.min.js')}}"></script> --}}


@endsection

@section('title', 'Add New Parents ')
@section('page_section')
	->	{{trans("page_header.stdDetails")}}
@endsection
@section('page_name')
	->	{{ trans('page_header.add_stdParents') }} 
@endsection


@section('content')

					<!-- Collapsed atate -->
					<div class="card">
						<div class="card-header">
							<h5 class="mb-0">Collapsed state</h5>
						</div>

						<div class="card-body">
							<p class="mb-3">The accordion component has two main states: collapsed and expanded. The chevron icon at the end of the accordion indicates which state the accordion is in. The chevron points down to indicate collapsed and up to indicate expanded. Starting in a collapsed state gives the user a high level overview of the available information. Accordions begin by default in the collapsed state with all content panels closed.</p>

							@livewire('add-parents')
						</div>
					</div>

					<!-- /collapsed state -->
					@livewireScripts

@endsection



@section('js')

@endsection