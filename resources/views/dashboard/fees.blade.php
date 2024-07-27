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
							<h5 class="mb-0">{{ trans('pages.fees') }}</h5>
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
                                        <button type="button" class="btn btn-outline-success my-1 me-2" data-bs-toggle="modal" data-bs-target="#modal_centered" >  {{ trans('pages.add_new_fees') }}    <i class="ph-plus ph-1x me-1"></i></button>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>{{ trans('pages.title') }}</th>
                                                    <th>{{ trans('pages.grade') }}</th>
                                                    <th>{{ trans('pages.classroom') }}</th>
                                                    <th>{{ trans('pages.amount') }}</th>
                                                    <th>{{ trans('pages.options') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>@php $i = 1; @endphp
                                                @foreach ($fees as $fee)
                                                
                                                <tr>
                                                    <td>{{$i++}}</td>
                                                    <td>{{$fee->title}}</td>
                                                    <td>{{$fee->grade->name}}</td>
                                                    <td>{{$fee->classroom->name}}</td>
                                                    <td>{{$fee->amount}}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-outline-secondary rounded-pill p-1" title="{{ trans('student.back_graduation') }}" data-bs-toggle="modal" data-bs-target="#modal_edit{{$fee->id}}">
                                                            <i class="ph-note-pencil ph-1x"></i>
                                                        </button>	
                                                        <button type="button" class="btn btn-outline-danger rounded-pill p-1" title="{{ trans('student.prem_delete') }}" data-bs-toggle="modal" data-bs-target="#modal_delete{{$fee->id}}">
                                                            <i class="ph-trash ph-1x "></i>
                                                        </button>
                
                                                        <!-- edit fees modal  -->
                                                        <div id="modal_edit{{$fee->id}}" class="modal fade" tabindex="-1">
                                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">{{ trans('pages.edit_fees') }}</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                                    </div>
                                                                    
                                                                    <form action="{{route('fees.update',$fee->id)}}" method="POST">
                                                                        @csrf @method('PATCH')
                                                                        <div class="modal-body">
                                                                            <div class="row">

                                                                                <div class="mb-3 col-lg-4">
                                                                                    <label class="form-label">{{ trans('pages.ar_title') }}</label>
                                                                                    <div class="">
                                                                                        <input type="text" class="form-control" placeholder="{{ trans('pgaes.ar_title') }}" name="arTitle" value="{{$fee->getTranslation('title','ar')}}">
                                                                                        <input type="hidden" name="id" value="{{$fee->id}}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="mb-3 col-lg-4">
                                                                                    <label class="form-label">{{ trans('pages.en_title') }}</label>
                                                                                    <div class="">
                                                                                        <input type="text" class="form-control" placeholder="{{ trans('pages.en_title') }}" name="enTitle" value="{{$fee->getTranslation('title','en')}}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="mb-3 col-lg-4">
                                                                                    <label class="form-label">{{ trans('pages.amount') }}</label>
                                                                                    <div class="">
                                                                                        <input type="hidden" class="form-control" name="id" >
                                                                                        <input type="text" class="form-control" placeholder="{{ trans('pages.amount') }}" name="amount" value="{{$fee->amount}}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="mb-3 col-lg-4">
                                                                                    <label class="form-label">{{ trans('students.grade') }}</label>
                                                                                    <div class="">
                                                                                        <select class="form-select" name="grade_id">
                                                                                            <option value="opt1" style="display:none">{{ trans('students.selectOption') }}</option>
                                                                                            @foreach ($grades as $grade)
                                                                                            <option value="opt1" disabled>{{ trans('students.selectOption') }}</option>
                                                                                                <option value="{{$grade['id']}}" {{$fee->grade_id == $grade->id ? 'selected' : ''}} >{{$grade['name']}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="mb-3 col-lg-4">
                                                                                    <label class="form-label">{{ trans('students.classroom') }}</label>
                                                                                    <div class="">
                                                                                        <select class="form-select" name="classroom_id">
                                                                                            <option value="opt1" style="display:none">{{ trans('students.selectOption') }}</option>

                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="mb-3 col-lg-4">
                                                                                    <label class="form-label">{{ trans('pages.year') }}</label>
                                                                                    <div class="">
                                                                                        <input type="text" class="form-control" placeholder="{{ trans('pages.year') }}" name="year" value="{{$fee->year}}">
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
                                                        <!-- edit new fees modal  -->
                                                        <!-- start premanent delete modal -->
                                                        <div id="modal_delete{{$fee->id}}" class="modal fade" tabindex="-1">
                                                            <div class="modal-dialog">
                                                                <form action="{{route('fees.destroy',$fee->id)}}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <div class="modal-content">
                                                                        <div class="modal-header bg-danger text-white border-0">
                                                                            <h6 class="modal-title">{{ trans('classroom.delete') }}</h6>
                                                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                                                        </div>
                
                                                                        <div class="modal-body">
                                                                            <input type="hidden" value="{{$fee->id}}" name="id">
                                                                            <h6 class="fw-semibold">{{ trans('classrooms.delete_sure') }}</h6>
                                                                            <p>{{ $fee->title }}</p>
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

                    <!-- Insert new fee modal  -->
                    <div id="modal_centered" class="modal fade" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">{{ trans('pages.add_new_fees') }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                
                                <form action="{{route('fees.store')}}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">

                                            <div class="mb-3 col-lg-4">
                                                <label class="form-label">{{ trans('pages.ar_title') }}</label>
                                                <div class="">
                                                    <input type="text" class="form-control" placeholder="{{ trans('pages.ar_title') }}" name="arTitle">
                                                </div>
                                            </div>
                                            <div class="mb-3 col-lg-4">
                                                <label class="form-label">{{ trans('pages.en_title') }}</label>
                                                <div class="">
                                                    <input type="text" class="form-control" placeholder="{{ trans('pages.en_title') }}" name="enTitle">
                                                </div>
                                            </div>
                                            <div class="mb-3 col-lg-4">
                                                <label class="form-label">{{ trans('pages.amount') }}</label>
                                                <div class="">
                                                    <input type="hidden" class="form-control" name="id" >
                                                    <input type="text" class="form-control" placeholder="{{ trans('pages.amount') }}" name="amount">
                                                </div>
                                            </div>
                                            <div class="mb-3 col-lg-4">
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
                                            <div class="mb-3 col-lg-4">
                                                <label class="form-label">{{ trans('students.classroom') }}</label>
                                                <div class="">
                                                    <select class="form-select" name="classroom_id">
                                                        <option value="opt1" style="display:none">{{ trans('students.selectOption') }}</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-3 col-lg-4">
                                                <label class="form-label">{{ trans('pages.year') }}</label>
                                                <div class="">
                                                    <input type="text" class="form-control" placeholder="{{ trans('pages.year') }}" name="year">
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
@endsection