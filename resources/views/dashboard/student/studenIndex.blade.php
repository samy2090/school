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

@section('title', 'Students ')
@section('page_section')
	->	{{trans("page_header.students")}}
@endsection
@section('page_name')
	->	{{ trans('page_header.students_list') }} 
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
            <p class="mb-3">The accordion component has two main states: collapsed and expanded. The chevron icon at the end of the accordion indicates which state the accordion is in. The chevron points down to indicate collapsed and up to indicate expanded. Starting in a collapsed state gives the user a high level overview of the available information. Accordions begin by default in the collapsed state with all content panels closed.</p>
            <div class="accordion" id="accordion_collapsed">
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-outline-success my-1 me-2" data-bs-toggle="modal" data-bs-target="#modal_full" >  {{ trans('students.addStudent') }}    <i class="ph-plus ph-1x me-1"></i></button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Username</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Eugene</td>
                                    <td>Kopyov</td>
                                    <td>@Kopyov</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- start add new student modal -->
        <div id="modal_full" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-full">
                <div class="modal-content">
                    <div class="modal-header ">
                        <h5 class="modal-title">{{ trans('students.addStudent') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="{{route('students.store')}}" method="POST">
                        @csrf @method('POST')
                        <div class="modal-body">
                            <div class="row">
                                <div class="mb-3 col-lg-6">
                                    <label class="form-label">{{ trans('students.email') }}</label>
                                    <div class="">
                                        <input type="text" class="form-control" placeholder="{{ trans('students.email') }}" name="email">
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label class="form-label">{{ trans('students.email') }}</label>
                                    <div class="">
                                        <input type="text" class="form-control" placeholder="{{ trans('students.email') }}" name="email">
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label class="form-label">{{ trans('students.email') }}</label>
                                    <div class="">
                                        <input type="text" class="form-control" placeholder="{{ trans('students.email') }}" name="email">
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label class="form-label">{{ trans('students.password') }}</label>
                                    <div class="">
                                        <input type="password" class="form-control" placeholder="{{ trans('students.password') }}" name="password">
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label class="form-label">{{ trans('students.arName') }}</label>
                                    <div class="">
                                        <input type="text" class="form-control" placeholder="{{ trans('students.arName') }}" name="arName">
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label class="form-label">{{ trans('students.enName') }}</label>
                                    <div class="">
                                        <input type="text" class="form-control" placeholder="{{ trans('students.enName') }}" name="enName">
                                    </div>
                                </div>
                                <div class=" mb-3 col-lg-6">
                                    <label class="form-label">{{ trans('students.specialization') }}</label>
                                    <div class="">
                                        <select class="form-select" name="specialization">
                                            <option value="opt1" style="display:none">{{ trans('students.selectOption') }}</option>
                                            {{-- @foreach ($specializations as $specialization)
                                                <option value="{{$specialization['id']}}">{{$specialization['name']}}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label class="form-label">{{ trans('students.gender') }}</label>
                                    <div class="">
                                        <select class="form-select" name="gender">
                                            <option value="opt1" style="display:none">{{ trans('students.selectOption') }}</option>
                                            {{-- @foreach ($genders as $gender)
                                                <option value="{{$gender['id']}}">{{$gender['name']}}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label class="form-label">{{ trans('students.joiningDate') }}</label>
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
                                    <label class="form-label">{{ trans('students.address') }}</label>
                                    <div class="">
                                        <textarea rows="3" cols="3" class="form-control" placeholder="{{ trans('students.address') }}" name="address"></textarea>
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
        <!-- /end add new student modal -->
    </div>

    <!-- /collapsed state -->
@endsection



@section('js')

@endsection