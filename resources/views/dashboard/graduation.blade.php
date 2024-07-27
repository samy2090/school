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

                            <div class="accordion" id="accordion_collapsed">
                                <div class="card">
                                    <div class="card-header">
                                        <button type="button" class="btn btn-outline-success my-1 me-2" data-bs-toggle="modal" data-bs-target="#modal_centered" >  {{ trans('students.addStudent') }}    <i class="ph-plus ph-1x me-1"></i></button>
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
                                                @foreach ($graduated_stds as $graduated_std)
                                                
                                                <tr>
                                                    <td>{{$i++}}</td>
                                                    <td>{{$graduated_std['name']}}</td>
                                                    <td>{{$graduated_std['email']}}</td>
                                                    <td>{{$graduated_std->section->classroom->grade->name}}</td>
                                                    <td>{{$graduated_std->section->classroom->name}}</td>
                                                    <td>{{$graduated_std->section->name_section}}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-outline-secondary rounded-pill p-1" title="{{ trans('student.back_graduation') }}" data-bs-toggle="modal" data-bs-target="#modal_back_graduation{{$graduated_std->id}}">
                                                            <i class="ph-note-pencil ph-1x"></i>
                                                        </button>	
                                                        <button type="button" class="btn btn-outline-danger rounded-pill p-1" title="{{ trans('student.prem_delete') }}" data-bs-toggle="modal" data-bs-target="#modal_delete{{$graduated_std->id}}">
                                                            <i class="ph-trash ph-1x "></i>
                                                        </button>
                
                                                        
                                                        <!-- start back_graduation modal -->
                                                        <div id="modal_back_graduation{{$graduated_std->id}}" class="modal fade" tabindex="-1">
                                                            <div class="modal-dialog">
                                                                <form action="{{route('back_graduation',$graduated_std->id)}}" method="POST">
                                                                    @csrf
                                                                    @method('POST')
                                                                    <div class="modal-content">
                                                                        <div class="modal-header bg-danger text-white border-0">
                                                                            <h6 class="modal-title">{{ trans('classroom.delete') }}</h6>
                                                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                                                        </div>
                
                                                                        <div class="modal-body">
                                                                            <input type="hidden" value="{{$graduated_std->id}}" name="id">
                                                                            <h6 class="fw-semibold">{{ trans('classrooms.delete_sure') }}</h6>
                                                                            <p>{{ $graduated_std->name }}</p>
                                                                        </div>
                
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-link" data-bs-dismiss="modal">{{ trans('classroom.close') }}</button>
                                                                            <button type="submit" class="btn btn-danger">{{ trans('classroom.delete') }}</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <!-- end back_graduation modal -->
                                                        <!-- start premanent delete modal -->
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
                                                        <!-- end premanent delete modal -->
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
						</div>
					</div>

                    <!-- Insert new graduation modal  -->
                    <div id="modal_centered" class="modal fade" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">{{ trans('sections.add_new_section') }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                
                                <form action="{{route('graduation.store')}}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        {{-- <hr> --}}
                                        {{-- <h6 class="fw-semibold">Another paragraph</h6> --}}
                                        <div class="row">
                                            <div class="mb-3 col-lg-12">
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
                                            <div class="mb-3 col-lg-12">
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
                                            <div class="mb-3 col-lg-12">
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
                    <!-- end Insert new graduation modal  -->
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