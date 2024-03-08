@extends('dashboard.layouts.master')

@section('css')
	<!-- Theme JS files -->
	<script src="{{asset('dashassets/js/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('dashassets/js/vendor/ui/moment/moment.min.js')}}"></script>
	<script src="{{asset('dashassets/js/vendor/pickers/daterangepicker.js')}}"></script>
	<script src="{{asset('dashassets/js/vendor/pickers/datepicker.min.js')}}"></script>

	<script src="{{asset('dashassets/demo/pages/picker_date.js')}}"></script>
	<!-- /theme JS files -->
    <style>
        .datepicker { z-index: 1600 !important;      right: 280px; }
    </style>
@endsection

@section('title', 'Teachers ')
@section('page_section')
	->	{{trans("page_header.teachers")}}
@endsection
@section('page_name')
	->	{{ trans('page_header.teachers_list') }} 
@endsection


@section('content')

					<!-- Collapsed atate -->
					<div class="card">
						<div class="card-header">
							<h5 class="mb-0">{{ trans('teachers.teachersList') }}</h5>
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
							<p class="mb-3">The accordion component has two main states: collapsed and expanded. The chevron icon at the end of the accordion indicates which state the accordion is in. The chevron points down to indicate collapsed and up to indicate expanded. Starting in a collapsed state gives the user a high level overview of the available information. Accordions begin by default in the collapsed state with all content panels closed.</p>
                            <div class="card">
                                <div class="card-header">
                                    <button type="button" class="btn btn-outline-success my-1 me-2" data-bs-toggle="modal" data-bs-target="#modal_full" >  {{ trans('teachers.addTeacher') }}    <i class="ph-plus ph-1x me-1"></i></button>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>{{ trans('teachers.name') }}</th>
                                                    <th>{{ trans('teachers.specialization') }}</th>
                                                    <th>{{ trans('teachers.joiningDate') }}</th>
                                                    <th>Username</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $i = 0 ; @endphp
                                                @foreach ($teachers as $teacher)
                                                    <tr>
                                                        <td>{{++$i}}</td>
                                                        <td>{{$teacher['name']}}</td>
                                                        <td>{{$teacher->specialization->name}}</td>
                                                        <td>{{$teacher['joiningDate']}}</td>
                                                        <td>
                                                            <button type="button" class="btn btn-outline-secondary rounded-pill p-1" title="{{ trans('teachers.edit') }}" data-bs-toggle="modal" data-bs-target="#modal_centered_edit{{$teacher->id}}">
                                                                <i class="ph-note-pencil ph-1x"></i>
                                                            </button>	
                                                            <button type="button" class="btn btn-outline-danger rounded-pill p-1" title="{{ trans('teachers.delete') }}" data-bs-toggle="modal" data-bs-target="#modal_delete{{$teacher->id}}">
                                                                <i class="ph-trash ph-1x "></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <!-- start edit teacher modal -->
                                                    <div id="modal_centered_edit{{$teacher->id}}" class="modal fade" tabindex="-1">
                                                        <div class="modal-dialog modal-full">
                                                            <div class="modal-content">
                                                                <div class="modal-header ">
                                                                    <h5 class="modal-title">{{ trans('teachers.addTeacher') }}</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                                </div>
                                                                <form action="{{route('teachers.update', $teacher->id)}}" method="POST">
                                                                    @csrf @method('PATCH')
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="mb-3 col-lg-6">
                                                                                <label class="form-label">{{ trans('teachers.email') }}</label>
                                                                                <div class="">
                                                                                    <input type="text" class="form-control" placeholder="{{ trans('teachers.email') }}" name="email" value="{{$teacher['email']}}">
                                                                                    <input type="hidden" name="id" value="{{$teacher['id']}}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="mb-3 col-lg-6">
                                                                                <label class="form-label">{{ trans('teachers.password') }}</label>
                                                                                <div class="">
                                                                                    <input type="password" class="form-control" placeholder="{{ trans('teachers.password') }}" name="password" value="{{$teacher['password']}}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="mb-3 col-lg-6">
                                                                                <label class="form-label">{{ trans('teachers.arName') }}</label>
                                                                                <div class="">
                                                                                    <input type="text" class="form-control" placeholder="{{ trans('teachers.arName') }}" name="arName" value="{{$teacher->getTranslation('name','ar')}}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="mb-3 col-lg-6">
                                                                                <label class="form-label">{{ trans('teachers.enName') }}</label>
                                                                                <div class="">
                                                                                    <input type="text" class="form-control" placeholder="{{ trans('teachers.enName') }}" name="enName" value="{{$teacher->getTranslation('name','en')}}">
                                                                                </div>
                                                                            </div>
                                                                            <div class=" mb-3 col-lg-6">
                                                                                <label class="form-label">{{ trans('teachers.specialization') }}</label>
                                                                                <div class="">
                                                                                    <select class="form-select" name="specialization">
                                                                                        <option value="opt1" style="display:none">{{ trans('teachers.selectOption') }}</option>
                                                                                        @foreach ($specializations as $specialization)
                                                                                            <option value="{{$specialization['id']}}" {{$teacher['specialization_id'] == $specialization['id'] ? 'selected' : '' }}>{{$specialization['name']}}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mb-3 col-lg-6">
                                                                                <label class="form-label">{{ trans('teachers.gender') }}</label>
                                                                                <div class="">
                                                                                    <select class="form-select" name="gender">
                                                                                        <option value="opt1" style="display:none">{{ trans('teachers.selectOption') }}</option>
                                                                                        @foreach ($genders as $gender)
                                                                                            <option value="{{$gender['id']}}" {{$teacher['gender_id'] == $gender['id'] ? 'selected' : '' }}>{{$gender['name']}}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mb-3 col-lg-6">
                                                                                <label class="form-label">{{ trans('teachers.joiningDate') }}</label>
                                                                                <div class="">
                                                                                        <div class="input-group">
                                                                                            <span class="input-group-text">
                                                                                                <i class="ph-calendar"></i>
                                                                                            </span>
                                                                                            <input type="text" class="form-control datepicker-autohide" placeholder="Pick a date"  name="joiningDate" value="{{$teacher['joiningDate']}}" >
                                                                                        </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mb-3 col-lg-6">
                                                                                <label class="form-label">{{ trans('teachers.address') }}</label>
                                                                                <div class="">
                                                                                    <textarea rows="3" cols="3" class="form-control" placeholder="{{ trans('teachers.address') }}" name="address">{{$teacher['address']}}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-link" data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /end edit teacher modal -->

                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>

                    <!-- start add new teacher modal -->
                    <div id="modal_full" class="modal fade" tabindex="-1">
                        <div class="modal-dialog modal-full">
                            <div class="modal-content">
                                <div class="modal-header ">
                                    <h5 class="modal-title">{{ trans('teachers.addTeacher') }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <form action="{{route('teachers.store')}}" method="POST">
                                    @csrf @method('POST')
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="mb-3 col-lg-6">
                                                <label class="form-label">{{ trans('teachers.email') }}</label>
                                                <div class="">
                                                    <input type="text" class="form-control" placeholder="{{ trans('teachers.email') }}" name="email">
                                                </div>
                                            </div>
                                            <div class="mb-3 col-lg-6">
                                                <label class="form-label">{{ trans('teachers.password') }}</label>
                                                <div class="">
                                                    <input type="password" class="form-control" placeholder="{{ trans('teachers.password') }}" name="password">
                                                </div>
                                            </div>
                                            <div class="mb-3 col-lg-6">
                                                <label class="form-label">{{ trans('teachers.arName') }}</label>
                                                <div class="">
                                                    <input type="text" class="form-control" placeholder="{{ trans('teachers.arName') }}" name="arName">
                                                </div>
                                            </div>
                                            <div class="mb-3 col-lg-6">
                                                <label class="form-label">{{ trans('teachers.enName') }}</label>
                                                <div class="">
                                                    <input type="text" class="form-control" placeholder="{{ trans('teachers.enName') }}" name="enName">
                                                </div>
                                            </div>
                                            <div class=" mb-3 col-lg-6">
                                                <label class="form-label">{{ trans('teachers.specialization') }}</label>
                                                <div class="">
                                                    <select class="form-select" name="specialization">
                                                        <option value="opt1" style="display:none">{{ trans('teachers.selectOption') }}</option>
                                                        @foreach ($specializations as $specialization)
                                                            <option value="{{$specialization['id']}}">{{$specialization['name']}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-3 col-lg-6">
                                                <label class="form-label">{{ trans('teachers.gender') }}</label>
                                                <div class="">
                                                    <select class="form-select" name="gender">
                                                        <option value="opt1" style="display:none">{{ trans('teachers.selectOption') }}</option>
                                                        @foreach ($genders as $gender)
                                                            <option value="{{$gender['id']}}">{{$gender['name']}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-3 col-lg-6">
                                                <label class="form-label">{{ trans('teachers.joiningDate') }}</label>
                                                <div class="">
                                                        <div class="input-group">
                                                            <span class="input-group-text">
                                                                <i class="ph-calendar"></i>
                                                            </span>
                                                            <input type="text" class="form-control datepicker-autohide" placeholder="Pick a date"  name="joiningDate">
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 col-lg-6">
                                                <label class="form-label">{{ trans('teachers.address') }}</label>
                                                <div class="">
                                                    <textarea rows="3" cols="3" class="form-control" placeholder="{{ trans('teachers.address') }}" name="address"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-link" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /end add new teacher modal -->

					<!-- /collapsed state -->
@endsection



@section('js')

@endsection