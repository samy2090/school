@extends('dashboard.layouts.master')

@section('css')

@endsection

@section('title', 'Teachers ')
@section('page_section')
	->	{{trans("page_header.teachers")}}
@endsection
@section('page_name')
	->	{{ trans('page_header.addTeacher') }} 
@endsection


@section('content')

					<!-- Collapsed atate -->
					<div class="card">
						<div class="card-header">
							<h5 class="mb-0">{{ trans('teachers.addTeacher') }}</h5>
						</div>

						<div class="card-body">
							<p class="mb-3">The accordion component has two main states: collapsed and expanded. The chevron icon at the end of the accordion indicates which state the accordion is in. The chevron points down to indicate collapsed and up to indicate expanded. Starting in a collapsed state gives the user a high level overview of the available information. Accordions begin by default in the collapsed state with all content panels closed.</p>

                        </div>
					</div>

					<!-- /collapsed state -->
@endsection



@section('js')

@endsection