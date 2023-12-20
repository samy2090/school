@extends('dashboard.layouts.master')

@section('css')

@endsection

@section('title', 'Sections ')
@section('page_section')
	->	{{trans("page_header.sections")}}
@endsection
@section('page_name')
	->	{{ trans('page_header.sections_list') }} 
@endsection


@section('content')

					<!-- Collapsed atate -->
					<div class="card">
						<div class="card-header">
							<h5 class="mb-0">{{ trans('sections.sections') }}</h5>
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

						<!-- Insert grades modal  -->
						<div id="modal_centered" class="modal fade" tabindex="-1">
							<div class="modal-dialog modal-dialog-centered modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">{{ trans('sections.add_new_section') }}</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
									</div>
									
									<form action="{{route('sections.store')}}" method="POST">
										@csrf
										<div class="modal-body">
											{{-- <hr> --}}
											{{-- <h6 class="fw-semibold">Another paragraph</h6> --}}
											<div class="row">
												<div class="col-lg-6">
													<label class="col-form-label">{{ trans('sections.ar_name') }}</label>
													<div class="">
														<input type="text" class="form-control" placeholder="{{ trans('sections.ar_name') }}" name="arName">
													</div>
												</div>
												<div class="col-lg-6">
													<label class="col-form-label">{{ trans('sections.en_name') }}</label>
													<div class="">
														<input type="text" class="form-control" placeholder="{{ trans('sections.en_name') }}" name="enName">
													</div>
												</div>
												<div class="col-lg-6">
													<label class="col-form-label">{{ trans('sections.grade_name') }}</label>
													<div class="">
														<select class="form-select" name='gradeId'>
                                                            <option value="opt1">Default select height</option>
                                                            @foreach ($grades as $grade)
                                                            <option value="{{$grade->id}}">{{$grade->name}}</option>
                                                            @endforeach
                                                        </select>
													</div>
												</div>
												<div class="col-lg-6">
													<label class="col-form-label">{{ trans('sections.class_name') }}</label>
													<div class="">
														<select class="form-select" name='classId'>
                                                            {{-- <option value="opt1">Default select height</option>
                                                            @foreach ($grades as $grade)
                                                            <option value="{{$grade->id}}">{{$grade->name}}</option>
                                                            @endforeach --}}
                                                        </select>
													</div>
												</div>
												
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-link" data-bs-dismiss="modal">{{ trans('sections.close') }}</button>
											<button type="submit" class="btn btn-success ">{{ trans('sections.save') }}</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<!-- end Insert grades modal  -->

						<div class="card-body">
							<p class="mb-3"></p>
							<div>
								<button type="button" class="btn btn-outline-success my-1 me-2" data-bs-toggle="modal" data-bs-target="#modal_centered"> {{ trans('sections.add_new_section') }}  <i class="ph-plus ph-1x me-1"></i></button>
							</div>
							<div class="col-md-12">
								@php $i = 0; @endphp
								@foreach ($grades as $grade)
									@php $i++ @endphp
									<div class="card-group-vertical">
										<div class="card border shadow-none">
											<div class="card-header">
												<h6 class="mb-0">
													<a data-bs-toggle="collapse" class="d-flex align-items-center text-body collapsed" href="#collapsible-card-indicator-right{{$i}}" aria-expanded="false">
														{{$grade->name}}
														<i class="ph-caret-down collapsible-indicator ms-auto"></i>
													</a>
												</h6>
											</div>
											<div id="collapsible-card-indicator-right{{$i}}" class="collapse" style="">
												<div class="card-body">
													
													<div class="table-responsive">
														<table class="table table-hover" style=" text-align: center">
															<thead>
																<tr>
																	<th>#</th>
																	<th>{{ trans('sections.section_name') }}</th>
																	<th>{{ trans('sections.class_name') }}</th>
																	<th>{{ trans('sections.grade_name') }}</th>
																	<th>{{ trans('sections.status') }}</th>
																	<th>{{ trans('sections.options') }}</th>
																</tr>
															</thead>
															<tbody>
																@php $n = 0 ; @endphp
																@foreach ($grade->classRoom as $ClassRoom)
																	@foreach ($ClassRoom->section as $section )
																	@php $n++ @endphp
																		<tr>
																			<td>{{$n}}</td>
																			<td>{{$section->name_section}}</td>
																			<td>{{$section->classroom->name}}</td>
																			<td>{{$section->classroom->grade->name}}</td>
																			<td>
																				@if ($section->status === 1)
																				<span class="badge bg-success" >{{ trans('sections.active') }}</span>
																				@else
																				<span class="badge bg-danger" >{{ trans('sections.notActive') }}</span>
																				@endif
																			</td>
																			<td> 
																				<button type="button" class="btn btn-outline-secondary rounded-pill p-1" title="{{ trans('grades.edit') }}" data-bs-toggle="modal" data-bs-target="#modal_centered_edit{{$section->id}}">
																					<i class="ph-note-pencil ph-1x"></i>
																				</button>	
																				<button type="button" class="btn btn-outline-danger rounded-pill p-1" title="{{ trans('grades.delete') }}" data-bs-toggle="modal" data-bs-target="#modal_delete{{$section->id}}">
																					<i class="ph-trash ph-1x "></i>
																				</button>	

																				<!-- start edit grades modal  -->
																				<div id="modal_centered_edit{{$section->id}}" class="modal fade" tabindex="-1">
																					<div class="modal-dialog modal-dialog-centered modal-lg">
																						<div class="modal-content">
																							<div class="modal-header">
																								<h5 class="modal-title">{{ trans('sections.edit_section') }}</h5>
																								<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
																							</div>
																							
																							<form action="{{route('sections.update',$section->id)}}" method="POST">
																								@csrf @method('PATCH')
																								<div class="modal-body">
																									{{-- <hr> --}}
																									{{-- <h6 class="fw-semibold">Another paragraph</h6> --}}
																									<div class="row">
																										<div class="col-lg-6">
																											<label class="col-form-label">{{ trans('sections.ar_name') }}</label>
																											<div class="">
																												<input type="text" class="form-control" placeholder="{{ trans('sections.ar_name') }}" name="arName" value="{{ $section->getTranslation('name_section','ar') }}">
																												<input type="hidden"  name="id" value="{{ $section->id }}">
																											</div>
																										</div>
																										<div class="col-lg-6">
																											<label class="col-form-label">{{ trans('sections.en_name') }}</label>
																											<div class="">
																												<input type="text" class="form-control" placeholder="{{ trans('sections.en_name') }}" name="enName"  value="{{ $section->getTranslation('name_section','en') }}">
																											</div>
																										</div>
																										<div class="col-lg-6">
																											<label class="col-form-label">{{ trans('sections.grade_name') }}</label>
																											<div class="">
																												<select class="form-select" name='gradeId'>
																													<option value="opt1">Default select height</option>
																													@foreach ($grades as $grade)
																													<option value="{{$grade->id}}" {{$grade->id === $section->grade_id ? 'selected' : ''}}>{{$grade->name}}</option>
																													@endforeach
																												</select>
																											</div>
																										</div>
																										<div class="col-lg-6">
																											<label class="col-form-label">{{ trans('sections.class_name') }}</label>
																											<div class="">
																												<select class="form-select" name='classId'>
																													@php 	$grade 		= $section->classroom->grade; 
																															$classrooms = $grade->classRoom; 
																													@endphp
																													@foreach ($classrooms as $classroom )
																													<option value="{{$classroom->id}}" {{$classroom->id === $section->class_id ? 'selected' : ''}}>{{$classroom->name}}</option>
																													@endforeach
																												</select>
																											</div>
																										</div>
																										<div class="col-lg-6" style="margin-top : 20px ; text-align: justify;">
																											<div class="">
																												@if ($section->status === 1 )
																													<input type="checkbox" class="form-check-input form-check-input-success" checked="" value="1"  name="status">
																													<span class="badge bg-success" style="text-align: justify;margin-right: 10px;">{{ trans('sections.active') }}</span>
																												@else
																													<input type="checkbox" class="form-check-input form-check-input-success" name="status">
																													<span class="badge bg-success"  style="text-align: justify;margin-right: 10px;">{{ trans('sections.active') }}</span>
																												@endif
																											</div>
																										</div>
																										
																									</div>
																								</div>
																								<div class="modal-footer">
																									<button type="button" class="btn btn-link" data-bs-dismiss="modal">{{ trans('sections.close') }}</button>
																									<button type="submit" class="btn btn-success ">{{ trans('sections.save') }}</button>
																								</div>
																							</form>
																						</div>
																					</div>
																				</div>
																				<!-- end edit grades modal  -->

																				<!-- start delete modal -->
																				<div id="modal_delete{{$section->id}}" class="modal fade" tabindex="-1">
																					<div class="modal-dialog">
																						<form action="{{route('sections.destroy',$section->id)}}" method="POST">
																							@csrf
																							@method('DELETE')
																							<div class="modal-content">
																								<div class="modal-header bg-danger text-white border-0">
																									<h6 class="modal-title">{{ trans('grades.delete') }}</h6>
																									<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
																								</div>

																								<div class="modal-body">
																									<input type="hidden" value="{{$section->id}}" name="id">
																									<h6 class="fw-semibold">{{ trans('grades.delete_sure') }}</h6>
																									<p>{{ $section->name_section .'  ->  '. $section->classroom->name  }}</p>
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


																			</td>
																		</tr>
																	@endforeach
																@endforeach

															</tbody>
														</table>
													</div>

												</div>
											</div>
										</div>
									</div>
								@endforeach

							</div>
						</div>
					</div>

					<!-- /collapsed state -->
					<script>
						document.addEventListener('DOMContentLoaded', function () {
							var gradeElements = document.querySelectorAll('select[name="gradeId"]');
							var classElements = document.querySelectorAll('select[name="classId"]');

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
@endsection



@section('js')

	

@endsection