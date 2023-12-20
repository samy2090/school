@extends('dashboard.layouts.master')

@section('css')
<script src="{{asset('dashassets/demo/pages/components_modals.js')}}"></script>
<script src="{{asset('dashassets/js/jquery/jquery.min.js')}}"></script>
<script src="{{asset('dashassets/js/vendor/notifications/bootbox.min.js')}}"></script>
{{-- <script src='{{asset('jquery.repeater.min.js')}}'></script> --}}
<script>
    function CheckAll(className, elem) {
        var elements = document.getElementsByClassName(className);
        var l = elements.length;

        if (elem.checked) {
            for (var i = 0; i < l; i++) {
                elements[i].checked = true;
            }
        } else {
            for (var i = 0; i < l; i++) {
                elements[i].checked = false;
            }
        }
    }
</script>
<script type="text/javascript">
    $(function() {
        $("#btn_delete_all").click(function() {
            var selected = new Array();
            $("#table input[type=checkbox]:checked").each(function() {
                selected.push(this.value);
            });

            if (selected.length > 0) {
                $('#modal_delete_all').modal('show')
                $('input[id="delete_all_id"]').val(selected);
            }
        });
    });

</script>

@endsection

@section('title', 'Classrooms')
@section('page_section')
	->	{{trans("page_header.classRooms")}}
@endsection
@section('page_name')
	->	{{ trans('page_header.classRooms_list') }} 
@endsection

@section('content')

					<!-- Collapsed atate -->
					<div class="card">
						<div class="card-header">
							<h5 class="mb-0">{{ trans('classrooms.classrooms') }}</h5>
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
						<!-- Insert classroom modal  -->
						<div id="modal_centered" class="modal fade" tabindex="-1">
							<div class="modal-dialog modal-dialog-centered modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">{{ trans('classrooms.add_new_classroom') }}</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
									</div>
									
									<form action="{{route('classrooms.store')}}" method="POST">
										@csrf
										<div class="modal-body">
											{{-- <hr> --}}
											{{-- <h6 class="fw-semibold">Another paragraph</h6> --}}
											<div class="row">
												<div class="col-lg-6">
													<label class="col-form-label">{{ trans('classrooms.ar_name') }}</label>
													<div class="">
														<input type="text" class="form-control" placeholder="{{ trans('classrooms.ar_name') }}" name="arName">
													</div>
												</div>
												<div class="col-lg-6">
													<label class="col-form-label">{{ trans('classrooms.en_name') }}</label>
													<div class="">
														<input type="text" class="form-control" placeholder="{{ trans('classrooms.en_name') }}" name="enName">
													</div>
												</div>
												<div class="col-lg-6">
													<label class="col-form-label">{{ trans('classrooms.en_name') }}</label>
													<div class="">
														<select class="form-select" name='grade_id'>
                                                            <option value="opt1">Default select height</option>
                                                            @foreach ($grades as $grade)
                                                            <option value="{{$grade->id}}">{{$grade->name}}</option>
                                                            @endforeach
                                                        </select>
													</div>
												</div>
												<div class="col-lg-12">
													<label class="col-form-label">{{ trans('classrooms.notes') }}</label>
													<div class="">
														<textarea rows="3" cols="3" class="form-control" placeholder="{{ trans('classrooms.notes') }}" name="notes"></textarea>
													</div>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-link" data-bs-dismiss="modal">{{ trans('classrooms.close') }}</button>
											<button type="submit" class="btn btn-success ">{{ trans('classrooms.save') }}</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<!-- end Insert classroom modal  -->

						<div class="card-body">
							<div>
								<button type="button" class="btn btn-outline-success my-1 me-2" data-bs-toggle="modal" data-bs-target="#modal_centered"> {{ trans('classrooms.add_new_classroom') }}  <i class="ph-plus ph-1x me-1"></i></button>
								<button type="button" class="btn btn-outline-info my-1 me-2" id="btn_delete_all">
									{{ trans('classrooms.delete_checkbox') }}
								</button>
								<div class="col my-1 me-2 mb-3 col-lg-3">
									<form action="{{route('classroom_filter')}}" method="POST" >
										@method('POST') @csrf
										<select class="form-select my-1 me-2 mb-3 col-lg-3" name='grade_id'  onchange="this.form.submit()" >
											<option value="opt1">Styled select box</option>
											@foreach ($grades as $grade )
											<option value="{{$grade->id}}" >{{$grade->name}}</option>
											@endforeach
										</select>
									</form>
								</div>
							</div>
							<p class="mb-3"></p>
							<div class="fw-bold border-bottom pb-2 mb-3"> {{ trans('classrooms.curent_classrooms') }} </div>
							<div class="table-responsive">
								<table class="table table-hover" style=" text-align: center" id="table">
									<thead>
										<tr>
											<th><input name="select_all" id="example-select-all" class="form-check-input form-check-input-info" type="checkbox" onclick="CheckAll('box1', this)" /></th>
											<th>#</th>
											<th>{{ trans('classrooms.classroom_name') }}</th>
											<th>{{ trans('classrooms.grade_name') }}</th>
											<th>{{ trans('classrooms.notes') }}</th>
											<th>{{ trans('classrooms.options') }}</th>
										</tr>
									</thead>
									<tbody >
										<?php $i = 0 ;?>
										@foreach ($classrooms as $classroom) 
											<?php $i++; ?>
											<tr>
												
												<td><input type="checkbox"  value="{{ $classroom->id }}" class="box1 form-check-input form-check-input-info" ></td>
												<td>{{ $i}} </td>
												<td>{{$classroom->name}}</td>
												<td>{{$classroom->grade->name}}</td>
												<td>{{$classroom->notes}}</td>
												<td> 
													<button type="button" class="btn btn-outline-secondary rounded-pill p-1" title="{{ trans('classrooms.edit') }}" data-bs-toggle="modal" data-bs-target="#modal_centered_edit{{$classroom->id}}">
														<i class="ph-note-pencil ph-1x"></i>
													</button>	
													<button type="button" class="btn btn-outline-danger rounded-pill p-1" title="{{ trans('classrooms.delete') }}" data-bs-toggle="modal" data-bs-target="#modal_delete{{$classroom->id}}">
														<i class="ph-trash ph-1x "></i>
													</button>	
												</td>
											</tr>
											<!-- edit classroom modal  -->
											<div id="modal_centered_edit{{$classroom->id}}" class="modal fade" tabindex="-1">
												<div class="modal-dialog modal-dialog-centered modal-lg">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title">{{ trans('classrooms.add_new_classrooms') }}</h5>
															<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
														</div>
														
														<form action="{{route('classrooms.update',$classroom->id)}}" method="POST">
															@csrf
															@method('PATCH')
															<div class="modal-body">
																{{-- <hr> --}}
																{{-- <h6 class="fw-semibold">Another paragraph</h6> --}}
																<div class="row">
																	<div class="col-lg-6">
																		<label class="col-form-label">{{ trans('classrooms.name') }}</label>
																		<div class="">
																			<input type="hidden" class="form-control" name="id" value="{{$classroom->id}}">
																			<input type="text" class="form-control" placeholder="{{ trans('classrooms.ar_name') }}" name="arName" value="{{$classroom->getTranslation('name','ar')}}">
																		</div>
																	</div>
																	<div class="col-lg-6">
																		<label class="col-form-label">{{ trans('classrooms.en_name') }}</label>
																		<div class="">
																			<input type="text" class="form-control" placeholder="{{ trans('classrooms.en_name') }}" name="enName" value="{{$classroom->getTranslation('name','en')}}">
																		</div>
																	</div>
                                                                    <div class="col-lg-6">
                                                                        <label class="col-form-label">{{ trans('classrooms.grade_name') }}</label>
                                                                        <div class="">
                                                                            <select class="form-select" name='grade_id'>
                                                                                <option value="opt1">Default select height</option>
                                                                                @foreach ($grades as $grade)
                                                                                <option value="{{$grade->id}}" {{$grade->id == $classroom->grade_id ? 'selected' :'' }}>{{$grade->name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
																	<div class="col-lg-12">
																		<label class="col-form-label">{{ trans('classrooms.notes') }}</label>
																		<div class="">
																			<textarea rows="3" cols="3" class="form-control" placeholder="{{ trans('classrooms.notes') }}" name="notes">{{$classroom->notes}}</textarea>
																		</div>
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-link" data-bs-dismiss="modal">{{ trans('classrooms.close') }}</button>
																<button type="submit" class="btn btn-success ">{{ trans('classrooms.save') }}</button>
															</div>
														</form>
													</div>
												</div>
											</div>
											<!-- end edit classroom modal  -->
											<!-- start delete modal -->
											<div id="modal_delete{{$classroom->id}}" class="modal fade" tabindex="-1">
												<div class="modal-dialog">
													<form action="{{route('classrooms.destroy',$classroom->id)}}" method="POST">
														@csrf
														@method('DELETE')
														<div class="modal-content">
															<div class="modal-header bg-danger text-white border-0">
																<h6 class="modal-title">{{ trans('classroom.delete') }}</h6>
																<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
															</div>

															<div class="modal-body">
																<input type="hidden" value="{{$classroom->id}}" name="id">
																<h6 class="fw-semibold">{{ trans('classrooms.delete_sure') }}</h6>
																<p>{{ $classroom->name }}</p>
															</div>

															<div class="modal-footer">
																<button type="button" class="btn btn-link" data-bs-dismiss="modal">{{ trans('classroom.close') }}</button>
																<button type="submit" class="btn btn-danger">{{ trans('classroom.delete') }}</button>
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
					<!-- حذف مجموعة صفوف -->
					<div id="modal_delete_all" class="modal fade" tabindex="-1">
						<div class="modal-dialog">
							<form action="{{route('classroom_deleteAll')}}" method="POST">
								@csrf
								@method('POST')
								<div class="modal-content">
									<div class="modal-header bg-danger text-white border-0">
										<h6 class="modal-title">{{ trans('classrooms.delete') }}</h6>
										<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
									</div>

									<div class="modal-body">
										<input type="hidden" value="" name="delete_all_id" id="delete_all_id">
										<h6 class="fw-semibold">{{ trans('classrooms.delete_sure') }}</h6>
										<p> want to delete the selected classrooms ?</p>
									</div>

									<div class="modal-footer">
										<button type="button" class="btn btn-link" data-bs-dismiss="modal">{{ trans('classrooms.close') }}</button>
										<button type="submit" class="btn btn-danger">{{ trans('classrooms.delete') }}</button>
									</div>
								</div>
							</form>
						</div>
					</div>
@endsection



@section('js')
{{-- <script>
    function CheckAll(className, elem) {
        var elements = document.getElementById(className);
        var l = elements.length;

        if (elem.checked) {
            for (var i = 0; i < l; i++) {
                elements[i].checked = true;
            }
        } else {
            for (var i = 0; i < l; i++) {
                elements[i].checked = false;
            }
        }
    }
</script> --}}
@endsection