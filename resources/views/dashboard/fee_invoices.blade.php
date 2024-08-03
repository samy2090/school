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
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>{{ trans('pages.title') }}</th>
                                                    <th>{{ trans('pages.stdName') }}</th>
                                                    <th>{{ trans('pages.grade') }}</th>
                                                    <th>{{ trans('pages.classroom') }}</th>
                                                    <th>{{ trans('pages.amount') }}</th>
                                                    <th>{{ trans('pages.options') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>@php $i = 1; @endphp
                                                @foreach ($fees_invoices as $fees_invoice)
                                                
                                                <tr>
                                                    <td>{{$i++}}</td>
                                                    <td>{{$fees_invoice->fee->title}}</td>
                                                    <td>{{$fees_invoice->student->name}}</td>
                                                    <td>{{$fees_invoice->student->grade->name}}</td>
                                                    <td>{{$fees_invoice->student->classroom->name}}</td>
                                                    <td>{{$fees_invoice->fee->amount}}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-outline-secondary rounded-pill p-1" title="{{ trans('student.back_graduation') }}" data-bs-toggle="modal" data-bs-target="#modal_edit{{$fees_invoice->id}}">
                                                            <i class="ph-note-pencil ph-1x"></i>
                                                        </button>	
                                                        <button type="button" class="btn btn-outline-danger rounded-pill p-1" title="{{ trans('student.prem_delete') }}" data-bs-toggle="modal" data-bs-target="#modal_delete{{$fees_invoice->id}}">
                                                            <i class="ph-trash ph-1x "></i>
                                                        </button>
                
                                                        <!-- start edit student fees modal -->
                                                        <div id="modal_edit{{$fees_invoice->id}}" class="modal fade" tabindex="-1">
                                                            <div class="modal-dialog modal-full">
                                                                <div class="modal-content">
                                                                    <div class="modal-header ">
                                                                        <h5 class="modal-title">{{ trans('pages.add_new_fees') }}</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                                    </div>
                                                                    <form action="{{route('std_account.update',$fees_invoice->id)}}" method="POST"  enctype="multipart/form-data">
                                                                        @csrf @method('PATCH')
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="mb-3 col-lg-6">
                                                                                    <label class="form-label">{{ trans('pages.name') }}</label>
                                                                                    <div class="">
                                                                                        <input type="text" class="form-control" placeholder="{{ trans('pages.name') }}" name="std_name" value="{{$fees_invoice->student->name}}" disabled>
                                                                                        <input type="hidden"  name="fees_invoice_id" value="{{$fees_invoice->id}}" >
                                                                                    </div>
                                                                                </div>
                                                                                <div class="mb-3 col-lg-6">
                                                                                    <label class="form-label">{{ trans('pages.fees_type') }}</label>
                                                                                    <div class="">
                                                                                        <select class="form-select" name="fees_id">
                                                                                            <option value="#" style="display:none">{{ trans('students.selectOption') }}</option>
                                                                                            @foreach ( $allfees as $fees)
                                                                                            <option value="{{$fees->id}}" {{$fees_invoice->fee_id == $fees->id ? 'selected' : '' }} >{{ $fees->title }}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                {{-- <div class="mb-3 col-lg-6">
                                                                                    <label class="form-label">{{ trans('pages.amount') }}</label>
                                                                                    <div class="">
                                                                                        <input type="text" class="form-control" placeholder="{{ trans('pages.name') }}" name="amount">
                                                                                    </div>
                                                                                </div> --}}
                                                                                <div class="mb-3 col-lg-12">
                                                                                    <label class="form-label">{{ trans('pages.info') }}</label>
                                                                                    <div class="">
                                                                                        <input type="text" class="form-control" placeholder="{{ trans('pages.info') }}" name="info"  value="{{$fees_invoice->dts}}">
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
                                                        <!-- /end edit student fees modal -->
                                                        <!-- start premanent delete modal -->
                                                        <div id="modal_delete{{$fees_invoice->id}}" class="modal fade" tabindex="-1">
                                                            <div class="modal-dialog">
                                                                <form action="{{route('std_account.destroy',$fees_invoice->id)}}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <div class="modal-content">
                                                                        <div class="modal-header bg-danger text-white border-0">
                                                                            <h6 class="modal-title">{{ trans('classroom.delete') }}</h6>
                                                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                                                        </div>
                
                                                                        <div class="modal-body">
                                                                            <input type="hidden" value="{{$fees_invoice->id}}" name="id">
                                                                            <h6 class="fw-semibold">{{ trans('classrooms.delete_sure') }}</h6>
                                                                            <p>{{ $fees_invoice->fee->title }} -- {{ $fees_invoice->student->name }} </p> 
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