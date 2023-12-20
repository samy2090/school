@extends('dashboard.layouts.master')

@section('css')

@endsection

@section('title', 'new ')
@section('page_section')
	->	{{trans("page_header.grades")}}
@endsection
@section('page_name')
	->	{{ trans('page_header.grades_list') }} 
@endsection


@section('content')

					<!-- Collapsed atate -->
					<div class="card">
						<div class="card-header">
							<h5 class="mb-0">Collapsed state</h5>
						</div>

						<div class="card-body">
							<p class="mb-3">The accordion component has two main states: collapsed and expanded. The chevron icon at the end of the accordion indicates which state the accordion is in. The chevron points down to indicate collapsed and up to indicate expanded. Starting in a collapsed state gives the user a high level overview of the available information. Accordions begin by default in the collapsed state with all content panels closed.</p>

							<div class="fw-bold border-bottom pb-2 mb-3">Example</div>

							<div class="accordion" id="accordion_collapsed">
								<div class="accordion-item">
									<h2 class="accordion-header">
										<button class="accordion-button fw-semibold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsed_item1">
											Accordion Item #1
										</button>
									</h2>
									<div id="collapsed_item1" class="accordion-collapse collapse" data-bs-parent="#accordion_collapsed">
										<div class="accordion-body">
											<span class="fw-semibold">This is the first item's accordion body.</span> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
										</div>
									</div>
								</div>

								<div class="accordion-item">
									<h2 class="accordion-header">
										<button class="accordion-button fw-semibold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsed_item2">
											Accordion Item #2
										</button>
									</h2>
									<div id="collapsed_item2" class="accordion-collapse collapse" data-bs-parent="#accordion_collapsed">
										<div class="accordion-body">
											<span class="fw-semibold">This is the second item's accordion body.</span> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
										</div>
									</div>
								</div>

								<div class="accordion-item">
									<h2 class="accordion-header">
										<button class="accordion-button fw-semibold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsed_item3">
											Accordion Item #3
										</button>
									</h2>
									<div id="collapsed_item3" class="accordion-collapse collapse" data-bs-parent="#accordion_collapsed">
										<div class="accordion-body">
											<span class="fw-semibold">This is the third item's accordion body.</span> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- /collapsed state -->
@endsection



@section('js')

@endsection