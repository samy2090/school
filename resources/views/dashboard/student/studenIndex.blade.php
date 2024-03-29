@extends('dashboard.layouts.master')

@section('css')
    <!-- Theme JS files -->
    <script src="{{asset('dashassets/js/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('dashassets/js/vendor/ui/moment/moment.min.js')}}"></script>
    <script src="{{asset('dashassets/js/vendor/pickers/daterangepicker.js')}}"></script>
    <script src="{{asset('dashassets/js/vendor/pickers/datepicker.min.js')}}"></script>
    
	<script src="{{asset('dashassets/js/vendor/uploaders/fileinput/fileinput.min.js')}}"></script>
	<script src="{{asset('dashassets/js/vendor/uploaders/fileinput/plugins/sortable.min.js')}}"></script>

	<script src="{{asset('dashassets/demo/pages/uploader_bootstrap.js')}}"></script>

    <script src="{{asset('dashassets/demo/pages/picker_date.js')}}"></script>
    <script src="{{asset('dashassets/js/vendor/media/glightbox.min.js')}}"></script>

	<script src="{{asset('dashassets/demo/pages/gallery.js')}}"></script>




    <!-- /theme JS files -->
    <style>
        .datepicker { z-index: 1600 !important;  right: 1288px; }
        .gbtn{display: none;}
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
                                    <th>{{ trans('students.name') }}</th>
                                    <th>{{ trans('students.email') }}</th>
                                    <th>{{ trans('students.grade') }}</th>
                                    <th>{{ trans('students.classroom') }}</th>
                                    <th>{{ trans('students.section') }}</th>
                                    <th>{{ trans('students.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>@php $i = 1; @endphp
                                @foreach ($students as $student)
                                
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$student['name']}}</td>
                                    <td>{{$student['email']}}</td>
                                    <td>{{$student->section->classroom->grade->name}}</td>
                                    <td>{{$student->section->classroom->name}}</td>
                                    <td>{{$student->section->name_section}}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-secondary rounded-pill p-1" title="{{ trans('teachers.edit') }}" data-bs-toggle="modal" data-bs-target="#modal_centered_edit{{$student->id}}">
                                            <i class="ph-note-pencil ph-1x"></i>
                                        </button>	
                                        <button type="button" class="btn btn-outline-warning rounded-pill p-1" title="{{ trans('teachers.show') }}" data-bs-toggle="modal" data-bs-target="#modal_show{{$student->id}}">
                                            <i class="ph-info ph-1x"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-danger rounded-pill p-1" title="{{ trans('teachers.delete') }}" data-bs-toggle="modal" data-bs-target="#modal_delete{{$student->id}}">
                                            <i class="ph-trash ph-1x "></i>
                                        </button>

                                        <!-- start edit new student modal -->
                                        <div id="modal_centered_edit{{$student->id}}" class="modal fade" tabindex="-1">
                                            <div class="modal-dialog modal-full">
                                                <div class="modal-content">
                                                    <div class="modal-header ">
                                                        <h5 class="modal-title">{{ trans('students.addStudent') }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <form action="{{route('students.update',$student->id)}}" method="POST">
                                                        @csrf @method('PATCH')
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="mb-3 col-lg-6">
                                                                    <label class="form-label">{{ trans('students.arName') }}</label>
                                                                    <div class="">
                                                                        <input type="text" class="form-control" placeholder="{{ trans('students.arName') }}" name="arName" value="{{$student->gettranslation('name','ar')}}">
                                                                        <input type="hidden"  name="id" value="{{$student->id}}">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3 col-lg-6">
                                                                    <label class="form-label">{{ trans('students.enName') }}</label>
                                                                    <div class="">
                                                                        <input type="text" class="form-control" placeholder="{{ trans('students.enName') }}" name="enName" value="{{$student->gettranslation('name','en')}}">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3 col-lg-6">
                                                                    <label class="form-label">{{ trans('students.email') }}</label>
                                                                    <div class="">
                                                                        <input type="text" class="form-control" placeholder="{{ trans('students.email') }}" name="email" value="{{$student->email}}">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3 col-lg-6">
                                                                    <label class="form-label">{{ trans('students.password') }}</label>
                                                                    <div class="">
                                                                        <input type="password" class="form-control" placeholder="{{ trans('students.password') }}" name="password" value="{{$student->password}}">
                                                                    </div>
                                                                </div>

                                                                <div class=" mb-3 col-lg-3">
                                                                    <label class="form-label">{{ trans('students.gender') }}</label>
                                                                    <div class="">
                                                                        <select class="form-select" name="gender_id">
                                                                            <option value="opt1" style="display:none">{{ trans('students.selectOption') }}</option>
                                                                            @foreach ($genders as $gender)
                                                                                <option value="{{$gender['id']}}" {{$gender['id'] == $student->gender_id ? 'selected' : ''}}>{{$gender['name']}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="mb-3 col-lg-3">
                                                                    <label class="form-label">{{ trans('students.nationality') }}</label>
                                                                    <div class="">
                                                                        <select class="form-select" name="nationalitie_id">
                                                                            <option value="opt1" style="display:none">{{ trans('students.selectOption') }}</option>
                                                                            @foreach ($nationalities as $nationality)
                                                                                <option value="{{$nationality['id']}}" {{$nationality['id'] == $student->nationalitie_id ? 'selected' : ''}}>{{$nationality['name']}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="mb-3 col-lg-3">
                                                                    <label class="form-label">{{ trans('students.blood') }}</label>
                                                                    <div class="">
                                                                        <select class="form-select" name="blood_id">
                                                                            <option value="opt1" style="display:none">{{ trans('students.selectOption') }}</option>
                                                                            @foreach ($bloods as $blood)
                                                                                <option value="{{$blood['id']}}" {{$blood['id'] == $student->blood_id ? 'selected' : ''}}>{{$blood['name']}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="mb-3 col-lg-3">
                                                                    <label class="form-label">{{ trans('students.birthDate') }}</label>
                                                                    <div class="">
                                                                            <div class="input-group">
                                                                                <span class="input-group-text">
                                                                                    <i class="ph-calendar"></i>
                                                                                </span>
                                                                                <input type="text" class="form-control datepicker-autohide birthDate-datepicker" placeholder="Pick a date"  name="Date_Birth" value="{{$student['Date_Birth']}}">
                                                                            </div>
                                                                    </div>
                                                                </div>

                                                                <div class="mb-3 col-lg-2">
                                                                    <label class="form-label">{{ trans('students.grade') }}</label>
                                                                    <div class="">
                                                                        <select class="form-select" name="grade_id">
                                                                            <option value="opt1" >{{ trans('students.selectOption') }}</option>
                                                                            @foreach ($grades as $grade)
                                                                                <option value="{{$grade['id']}}" {{$grade['id'] == $student->grade_id ? 'selected' : ''}}>{{$student->section->classroom->grade->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3 col-lg-2">
                                                                    <label class="form-label">{{ trans('students.classroom') }}</label>
                                                                    <div class="">
                                                                        <select class="form-select" name="classroom_id">
                                                                            <option value="opt1" style="display:none">{{ trans('students.selectOption') }}</option>
                                                                            <option value="opt1" value="{{$student['classroom_id']}}">{{ trans('students.selectOption') }}</option>
                                                                            {{-- @foreach ($bloods as $blood)
                                                                                <option value="{{$blood['id']}}">{{$blood['name']}}</option>
                                                                            @endforeach --}}
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3 col-lg-2">
                                                                    <label class="form-label">{{ trans('students.section') }}</label>
                                                                    <div class="">
                                                                        <select class="form-select" name="section_id">
                                                                            <option value="opt1" style="display:none">{{ trans('students.selectOption') }}</option>
                                                                            {{-- @foreach ($bloods as $blood)
                                                                                <option value="{{$blood['id']}}">{{$blood['name']}}</option>
                                                                            @endforeach --}}
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3 col-lg-3">
                                                                    <label class="form-label">{{ trans('students.stdParent') }}</label>
                                                                    <div class="">
                                                                        <select class="form-select" name="parent_id">
                                                                            <option value="opt1" style="display:none">{{ trans('students.selectOption') }}</option>
                                                                            @foreach ($stdParents as $stdParent)
                                                                                <option value="{{$stdParent['id']}}" {{$stdParent['id'] == $student->parent_id ? 'selected' : ''}}>{{$stdParent['nameFather']}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="mb-3 col-lg-3">
                                                                    <label class="form-label">{{ trans('students.academic_year') }}</label>
                                                                    <div class="">
                                                                        <select class="form-select" name="academic_year">
                                                                            <option value="opt1" style="display:none">{{ trans('students.selectOption') }}</option>
                                                                            @php
                                                                                $date = date('Y');
                                                                            @endphp
                                                                            @for ($year=$date-10 ; $year<=$date+1 ;$year++)
                                                                                <option value="{{$year}}" {{$year == $student->academic_year ? 'selected' : ''}}>{{$year}}</option>
                                                                            @endfor
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="mb-3 col-lg-6">
                                                                    <label class="form-label">{{ trans('students.address') }}</label>
                                                                    <div class="">
                                                                        <textarea rows="3" cols="3" class="form-control" placeholder="{{ trans('students.address') }}" name="address" >{{$student['address']}}</textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="mb-3 col-lg-6">
                                                                    <label class="form-label">{{ trans('students.address') }}</label>
                                                                    <div class="">
                                                                        <input type="file" name="photos[]" class="file-input" multiple="multiple" data-show-upload="false" data-show-caption="true" data-show-preview="true">
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
                                        <!-- /end edit new student modal -->
                                    
                                        @include('dashboard.student.showStudent')
                                        <!-- start delete modal -->
                                        <div id="modal_delete{{$student->id}}" class="modal fade" tabindex="-1">
                                            <div class="modal-dialog">
                                                <form action="{{route('students.destroy',$student->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger text-white border-0">
                                                            <h6 class="modal-title">{{ trans('classroom.delete') }}</h6>
                                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <input type="hidden" value="{{$student->id}}" name="id">
                                                            <h6 class="fw-semibold">{{ trans('classrooms.delete_sure') }}</h6>
                                                            <p>{{ $student->name }}</p>
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
                                    </td>
                                </tr>
                                @endforeach
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
                    <form action="{{route('students.store')}}" method="POST"  enctype="multipart/form-data">
                        @csrf @method('POST')
                        <div class="modal-body">
                            <div class="row">
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

                                <div class=" mb-3 col-lg-3">
                                    <label class="form-label">{{ trans('students.gender') }}</label>
                                    <div class="">
                                        <select class="form-select" name="gender_id">
                                            <option value="opt1" style="display:none">{{ trans('students.selectOption') }}</option>
                                            @foreach ($genders as $gender)
                                                <option value="{{$gender['id']}}">{{$gender['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3 col-lg-3">
                                    <label class="form-label">{{ trans('students.nationality') }}</label>
                                    <div class="">
                                        <select class="form-select" name="nationalitie_id">
                                            <option value="opt1" style="display:none">{{ trans('students.selectOption') }}</option>
                                            @foreach ($nationalities as $nationality)
                                                <option value="{{$nationality['id']}}">{{$nationality['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3 col-lg-3">
                                    <label class="form-label">{{ trans('students.blood') }}</label>
                                    <div class="">
                                        <select class="form-select" name="blood_id">
                                            <option value="opt1" style="display:none">{{ trans('students.selectOption') }}</option>
                                            @foreach ($bloods as $blood)
                                                <option value="{{$blood['id']}}">{{$blood['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3 col-lg-3">
                                    <label class="form-label">{{ trans('students.birthDate') }}</label>
                                    <div class="">
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i class="ph-calendar"></i>
                                                </span>
                                                <input type="text" class="form-control datepicker-autohide birthDate-datepicker" placeholder="Pick a date"  name="Date_Birth">
                                            </div>
                                    </div>
                                </div>

                                <div class="mb-3 col-lg-2">
                                    <label class="form-label">{{ trans('students.grade') }}</label>
                                    <div class="">
                                        <select class="form-select" name="grade_id">
                                            <option value="opt1" style="display:none">{{ trans('students.selectOption') }}</option>
                                            @foreach ($grades as $grade)
                                                <option value="{{$grade['id']}}">{{$grade['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-2">
                                    <label class="form-label">{{ trans('students.classroom') }}</label>
                                    <div class="">
                                        <select class="form-select" name="classroom_id">
                                            <option value="opt1" style="display:none">{{ trans('students.selectOption') }}</option>
                                            {{-- @foreach ($bloods as $blood)
                                                <option value="{{$blood['id']}}">{{$blood['name']}}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-2">
                                    <label class="form-label">{{ trans('students.section') }}</label>
                                    <div class="">
                                        <select class="form-select" name="section_id">
                                            <option value="opt1" style="display:none">{{ trans('students.selectOption') }}</option>
                                            {{-- @foreach ($bloods as $blood)
                                                <option value="{{$blood['id']}}">{{$blood['name']}}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-3">
                                    <label class="form-label">{{ trans('students.stdParent') }}</label>
                                    <div class="">
                                        <select class="form-select" name="parent_id">
                                            <option value="opt1" style="display:none">{{ trans('students.selectOption') }}</option>
                                            @foreach ($stdParents as $stdParent)
                                                <option value="{{$stdParent['id']}}">{{$stdParent['nameFather']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                

                                <div class="mb-3 col-lg-3">
                                    <label class="form-label">{{ trans('students.academic_year') }}</label>
                                    <div class="">
                                        <select class="form-select" name="academic_year">
                                            <option value="opt1" style="display:none">{{ trans('students.selectOption') }}</option>
                                            @php
                                                $date = date('Y');
                                            @endphp
                                            @for ($year=$date-10 ; $year<=$date+1 ;$year++)
                                                <option value="{{$year}}">{{$year}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            
                                <div class="mb-3 col-lg-6">
                                    <label class="form-label">{{ trans('students.address') }}</label>
                                    <div class="">
                                        <textarea rows="3" cols="3" class="form-control" placeholder="{{ trans('students.address') }}" name="address"></textarea>
                                    </div>
                                </div>

                                <div class="mb-3 col-lg-6">
                                    <label class="form-label">{{ trans('students.address') }}</label>
                                    <div class="">
                                        <input type="file" name="photos[]" class="file-input" multiple="multiple" data-show-upload="false" data-show-caption="true" data-show-preview="true">
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
@endsection