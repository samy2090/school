@extends('dashboard.layouts.master')

@section('css')
	<script src="{{asset("dashassets/js/jquery/jquery.min.js")}}"></script>
	<script src="{{asset("dashassets/js/vendor/ui/moment/moment.min.js")}}"></script>
	<script src="{{asset("dashassets/js/vendor/pickers/daterangepicker.js")}}"></script>
	<script src="{{asset("dashassets/js/vendor/pickers/datepicker.min.js")}}"></script>

	<script src="{{asset("dashassets/js/app.js")}}"></script>
	<script src="{{asset("dashassets/demo/pages/picker_date.js")}}"></script>
	
	<style>
		.daterangepicker,
		.datepicker {
			z-index: 1060 !important; /* Adjust this value as needed */
			position: absolute;

		}
	</style>
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
						@if ($errors->any())
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
						@endif
						<div class="card-body">
                            <div>
								<button type="button" class="btn btn-outline-success my-1 me-2" data-bs-toggle="modal" data-bs-target="#modal_centered"> add new meeting  <i class="ph-plus ph-1x me-1"></i></button>
							</div>
							<div class="fw-bold border-bottom pb-2 mb-3">Online Meetings</div>

							<!-- Insert new online meeting modal  -->
							<div id="modal_centered" class="modal fade" tabindex="-1">
								<div class="modal-dialog modal-dialog-centered modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">add new online meeting</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
										</div>
										
										<form action="{{route('online_meetings.store')}}" method="POST">
											@csrf
											<div class="modal-body">
												{{-- <hr> --}}
												{{-- <h6 class="fw-semibold">Another paragraph</h6> --}}
												<div class="row">
													<div class="col-lg-4">
														<label class="col-form-label">المرجلة الدراسية </label>
														<div class="">
															<select class="form-select" name="grade_id">
																<option value="opt1" style="display:none">{{ trans('students.selectOption') }}</option>
																@foreach ($grades as $grade)
																	<option value="{{$grade['id']}}">{{$grade['name']}}</option>
																@endforeach
															</select>
														</div>
													</div>
													<div class="col-lg-4">
														<label class="col-form-label">الصف الدراسي</label>
														<div class="">
															<select class="form-select" name="classroom_id">
																<option value="opt1" style="display:none">{{ trans('students.selectOption') }}</option>
																{{-- @foreach ($bloods as $blood)
																	<option value="{{$blood['id']}}">{{$blood['name']}}</option>
																@endforeach --}}
															</select>
														</div>
													</div>
													<div class="col-lg-4">
														<label class="col-form-label">الفصل</label>
														<div class="">
															<select class="form-select" name="section_id">
																<option value="opt1" style="display:none">{{ trans('students.selectOption') }}</option>
																{{-- @foreach ($bloods as $blood)
																	<option value="{{$blood['id']}}">{{$blood['name']}}</option>
																@endforeach --}}
															</select>
														</div>
													</div>
													<div class="col-lg-4">
														<label class="col-form-label">عنوان الحصة </label>
														<div class="">
															<input type="text" class="form-control" placeholder="title" name="topic" >
														</div>
													</div>
													<div class="col-lg-4">
														<label class="col-form-label"><i class="ph-calendar"></i>تاريخ الحصة</label>
														<div class="">
															<input type="text" class="form-control datepicker-basic" placeholder="Pick a date" name="start_at"> 
														</div>
													</div>
													<div class="col-lg-4">
														<label class="col-form-label">مدة الحصة</label>
														<div class="">
															<input type="number" class="form-control" placeholder="duration" name="duration"> 
														</div>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-link" data-bs-dismiss="modal">{{ trans('grades.close') }}</button>
												<button type="submit" class="btn btn-success ">{{ trans('grades.save') }}</button>
											</div>
										</form>
									</div>
								</div>
							</div>
							<!-- end Insert new onlin meeting modal  -->

                            <div class="table-responsive">
								<table class="table table-hover" style=" text-align: center">
									<thead>
										<tr>
											<th>#</th>
											<th>المرحلة </th>
											<th>الصف الدراسي </th>
											<th>القسم </th>
											<th>عنوان الحصة </th>
											<th>رابط بدأ الحصة </th>
											<th>رابط الانضمام للحصة </th>
											<th>options </th>
										</tr>
									</thead>
									<tbody >
										<?php $i = 0 ;?>
										@foreach ($meetings as $meeting) 
											<?php $i++; ?>
											<tr>
												<td>{{ $i}} </td>
												<td>{{$meeting->grade->name}}</td>
												<td>{{$meeting->classroom->name}}</td>
												<td>{{$meeting->section->name_section}}</td>
												<td>{{$meeting->topic}}</td>
												<td> <a href="{{$meeting->start_url}}" target="_blank" rel="noopener noreferrer"> ابدأ الان</a></td>
												<td> <button class="btn btn-outline-primary btn-icon copy-link" data-link="{{ $meeting->join_url }}">Copy Link <i class="ph-link"></i></button></td>
												<td> 
													<button type="button" class="btn btn-outline-danger rounded-pill p-1" title="{{ trans('grades.delete') }}" data-bs-toggle="modal" data-bs-target="#modal_delete{{$meeting->id}}">
														<i class="ph-trash ph-1x "></i>
													</button>	
												</td>
											</tr>
											
											<!-- start delete modal -->
											<div id="modal_delete{{$meeting->id}}" class="modal fade" tabindex="-1">
												<div class="modal-dialog">
													<form action="{{route('online_meetings.destroy',$meeting->id)}}" method="POST">
														@csrf
														@method('DELETE')
														<div class="modal-content">
															<div class="modal-header bg-danger text-white border-0">
																<h6 class="modal-title">{{ trans('grades.delete') }}</h6>
																<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
															</div>

															<div class="modal-body">
																<input type="hidden" value="{{$meeting->id}}" name="id">
																<h6 class="fw-semibold">{{ trans('grades.delete_sure') }}</h6>
																<p>{{ $meeting->name }}</p>
															</div>

															<div class="modal-footer">
																<button type="button" class="btn btn-link" data-bs-dismiss="modal">{{ trans('grades.close') }}</button>
																<button type="submit" class="btn btn-danger">{{ trans('grades.delete') }}</button>
															</div>
														</div>
													</form>
												</div>
											</div>
											<!-- end delete modal -->
										@endforeach
									</tbody>
								</table>
							</div>
							
						</div>
					</div>
					<!-- /collapsed state -->

					<!-- /collapsed state -->
					<script>
						document.addEventListener('DOMContentLoaded', function () {
							var gradeElements = document.querySelectorAll('select[name="grade_id"]');
							var classElements = document.querySelectorAll('select[name="classroom_id"]');
				
							gradeElements.forEach(function(gradeElement, index) {
								gradeElement.addEventListener('change', function () {
									var Grade_id = this.value;
									if (Grade_id) {
										var xhr = new XMLHttpRequest();
										xhr.open("GET", "{{ URL::to('/dashboard/classrooms/getGrade') }}/" + Grade_id, true);
										xhr.onload = function () {
											if (xhr.readyState === 4 && xhr.status === 200) {
												var data = JSON.parse(xhr.responseText);
												var classDropdown = classElements[index];
												classDropdown.innerHTML = '';
												for (var key in data) {
													var option = document.createElement('option');
													option.value = key;
													option.text = data[key];
													classDropdown.add(option);
												}
											} else {
												console.log('AJAX load did not work');
											}
										};
										xhr.send();
									} else {
										console.log('AJAX load did not work');
									}
								});
							});
						});
					</script>
					<script>
						document.addEventListener('DOMContentLoaded', function () {
							var classElements = document.querySelectorAll('select[name="classroom_id"]');
							var sectionElements = document.querySelectorAll('select[name="section_id"]');
				
							classElements.forEach(function(classElement, index) {
								classElement.addEventListener('change', function () {
									var classroom_id = this.value;
									if (classroom_id) {
										var xhr = new XMLHttpRequest();
										xhr.open("GET", "{{ URL::to('/dashboard/getsection') }}/" + classroom_id, true);
										xhr.onload = function () {
											if (xhr.readyState === 4 && xhr.status === 200) {
												var data = JSON.parse(xhr.responseText);
												var sectionDropdown = sectionElements[index];
												sectionDropdown.innerHTML = '';
												for (var key in data) {
													var option = document.createElement('option');
													option.value = key;
													option.text = data[key];
													sectionDropdown.add(option);
												}
											} else {
												console.log('AJAX load did not work');
											}
										};
										xhr.send();
									} else {
										console.log('AJAX load did not work');
									}
								});
							});
						});
					</script>

					<script>	/* this code for copy the link in clipboard  */
						document.addEventListener("DOMContentLoaded", function() {
							// Attach click event listener to all buttons with the class "copy-link"
							document.querySelectorAll('.copy-link').forEach(button => {
								button.addEventListener('click', function() {
									const linkToCopy = this.getAttribute('data-link'); // Get the link from the data attribute
						
									// Copy the link to the clipboard using the Clipboard API
									navigator.clipboard.writeText(linkToCopy)
										.then(() => {
											alert("Link copied to clipboard!");
										})
										.catch(err => {
											console.error("Error copying link: ", err);
										});
								});
							});
						});
						</script>
@endsection



@section('js')

@endsection