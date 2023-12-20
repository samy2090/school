@extends('dashboard.layouts.master')

@section('css')
<script src="{{asset('dashassets/demo/pages/components_modals.js')}}"></script>
<script src="{{asset('dashassets/js/jquery/jquery.min.js')}}"></script>
<script src="{{asset('dashassets/js/vendor/notifications/bootbox.min.js')}}"></script>
@endsection

@section('title', 'Grades')
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
							<h5 class="mb-0">{{ trans('grades.grades') }}</h5>
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
										<h5 class="modal-title">{{ trans('grades.add_new_grade') }}</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
									</div>
									
									<form action="{{route('grades.store')}}" method="POST">
										@csrf
										<div class="modal-body">
											{{-- <hr> --}}
											{{-- <h6 class="fw-semibold">Another paragraph</h6> --}}
											<div class="row">
												<div class="col-lg-6">
													<label class="col-form-label">{{ trans('grades.ar_name') }}</label>
													<div class="">
														<input type="text" class="form-control" placeholder="{{ trans('grades.ar_name') }}" name="arName">
													</div>
												</div>
												<div class="col-lg-6">
													<label class="col-form-label">{{ trans('grades.en_name') }}</label>
													<div class="">
														<input type="text" class="form-control" placeholder="{{ trans('grades.en_name') }}" name="enName">
													</div>
												</div>
												<div class="col-lg-12">
													<label class="col-form-label">{{ trans('grades.notes') }}</label>
													<div class="">
														<textarea rows="3" cols="3" class="form-control" placeholder="{{ trans('grades.notes') }}" name="notes"></textarea>
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
						<!-- end Insert grades modal  -->

						<div class="card-body">
							<div>
								<button type="button" class="btn btn-outline-success my-1 me-2" data-bs-toggle="modal" data-bs-target="#modal_centered"> {{ trans('grades.add_new_grade') }}  <i class="ph-plus ph-1x me-1"></i></button>
							</div>
							<p class="mb-3"></p>
							<div class="fw-bold border-bottom pb-2 mb-3"> {{ trans('grades.curent_grades') }} </div>
							<div class="table-responsive">
								<table class="table table-hover" style=" text-align: center">
									<thead>
										<tr>
											<th>#</th>
											<th>{{ trans('grades.grade_name') }}</th>
											<th>{{ trans('grades.notes') }}</th>
											<th>{{ trans('grades.options') }}</th>
										</tr>
									</thead>
									<tbody >
										<?php $i = 0 ;?>
										@foreach ($grades as $grade) 
											<?php $i++; ?>
											<tr>
												<td>{{ $i}} </td>
												<td>{{$grade->name}}</td>
												<td>{{$grade->notes}}</td>
												<td> 
													<button type="button" class="btn btn-outline-secondary rounded-pill p-1" title="{{ trans('grades.edit') }}" data-bs-toggle="modal" data-bs-target="#modal_centered_edit{{$grade->id}}">
														<i class="ph-note-pencil ph-1x"></i>
													</button>	
													<button type="button" class="btn btn-outline-danger rounded-pill p-1" title="{{ trans('grades.delete') }}" data-bs-toggle="modal" data-bs-target="#modal_delete{{$grade->id}}">
														<i class="ph-trash ph-1x "></i>
													</button>	
												</td>
											</tr>
											<!-- edit grades modal  -->
											<div id="modal_centered_edit{{$grade->id}}" class="modal fade" tabindex="-1">
												<div class="modal-dialog modal-dialog-centered modal-lg">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title">{{ trans('grades.add_new_grade') }}</h5>
															<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
														</div>
														
														<form action="{{route('grades.update',$grade->id)}}" method="POST">
															@csrf
															@method('PATCH')
															<div class="modal-body">
																{{-- <hr> --}}
																{{-- <h6 class="fw-semibold">Another paragraph</h6> --}}
																<div class="row">
																	<div class="col-lg-6">
																		<label class="col-form-label">{{ trans('grades.ar_name') }}</label>
																		<div class="">
																			<input type="hidden" class="form-control" name="id" value="{{$grade->id}}">
																			<input type="text" class="form-control" placeholder="{{ trans('grades.ar_name') }}" name="arName" value="{{$grade->getTranslation('name','ar')}}">
																		</div>
																	</div>
																	<div class="col-lg-6">
																		<label class="col-form-label">{{ trans('grades.en_name') }}</label>
																		<div class="">
																			<input type="text" class="form-control" placeholder="{{ trans('grades.en_name') }}" name="enName" value="{{$grade->getTranslation('name','en')}}">
																		</div>
																	</div>
																	<div class="col-lg-12">
																		<label class="col-form-label">{{ trans('grades.notes') }}</label>
																		<div class="">
																			<textarea rows="3" cols="3" class="form-control" placeholder="{{ trans('grades.notes') }}" name="notes">{{$grade->notes}}</textarea>
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
											<!-- end edit grades modal  -->
											<!-- start delete modal -->
											<div id="modal_delete{{$grade->id}}" class="modal fade" tabindex="-1">
												<div class="modal-dialog">
													<form action="{{route('grades.destroy',$grade->id)}}" method="POST">
														@csrf
														@method('DELETE')
														<div class="modal-content">
															<div class="modal-header bg-danger text-white border-0">
																<h6 class="modal-title">{{ trans('grades.delete') }}</h6>
																<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
															</div>

															<div class="modal-body">
																<input type="hidden" value="{{$grade->id}}" name="id">
																<h6 class="fw-semibold">{{ trans('grades.delete_sure') }}</h6>
																<p>{{ $grade->name }}</p>
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
@endsection



@section('js')

@endsection