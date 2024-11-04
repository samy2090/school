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

							<div class="fw-bold border-bottom pb-2 mb-3">Attendance for -- {{date('y/m/d')}}</div>

							<div class="card-body">
                                <div class="table-responsive">
                                    <form action="{{route('attendance.store')}}" method="POST"> 
                                        @csrf @method('POST')
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>section Name</th>
                                                    <th>Grade</th>
                                                    <th>classroom</th>
                                                    <th>option</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($section_stds as $student)
                                                    <tr>
                                                        <td>1</td>
                                                        <td>{{$student->name}}</td>
                                                        <td>{{$student->grade->name}}</td>
                                                        <td>{{$student->classroom->name}}</td>
                                                        <td>
                                                            
                                                        
                                                        @if ($student->attendance->where('attendance_date', date('Y-m-d'))->pluck('attendance_date')->first() == date('Y-m-d'))
                                                                <div class="form-check form-check-inline">
                                                                    <input type="radio" class="form-check-input" name="attendance[{{$student->id}}]" value='1' id="cr_l_i_s" disabled {{$student->attendance->where('attendance_date', date('Y-m-d'))->attendance_status == 1 ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="cr_l_i_s" >attendant </label>
                                                                </div>
                
                                                                <div class="form-check form-check-inline">
                                                                    <input type="radio" class="form-check-input" name="attendance[{{$student->id}}]" value='0' id="cr_l_i_u" disabled {{$student->attendance->where('attendance_date', date('Y-m-d'))->attendance_status == 0 ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="cr_l_i_u" >absent</label>
                                                                </div>
                                                                
                                                                    
                                                            @else
                                                                <div class="form-check form-check-inline">
                                                                    <input type="radio" class="form-check-input" name="attendance[{{$student->id}}]" id="cr_l_i_s" value='1' checked="">
                                                                    <label class="form-check-label" for="cr_l_i_s" >Attendant</label>
                                                                </div>
                
                                                                <div class="form-check form-check-inline">
                                                                    <input type="radio" class="form-check-input" name="attendance[{{$student->id}}]"  value='0' id="cr_l_i_u">
                                                                    <label class="form-check-label" for="cr_l_i_u">Absent</label>
                                                                </div>
                                                            @endif 
                                                        </td>
                                                    </tr>
                                                    <input type="hidden" name="student_id[]" value="{{ $student->id }}">
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <button type="submit" class="btn btn-success ">{{ trans('classrooms.save') }}</button>
                                    </form>
                                </div>
                            </div>
						</div>
					</div>

					<!-- /collapsed state -->
@endsection



@section('js')

@endsection