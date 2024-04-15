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

                            <form action="{{route('promotion.store')}}" method="POST">
                                @csrf @method('POST')
                                <div class="fw-bold border-bottom pb-2 mb-3">from</div>

                                <div class="row">
                                    <div class="mb-4 col-lg-4">
                                        <label class="form-label">{{ trans('students.grade') }}</label>
                                        <div class="">
                                            <select class="form-select" name="from_grade">
                                                <option value="opt1" >{{ trans('students.selectOption') }}</option>
                                                @foreach ($grades as $grade)
                                                    <option value="{{$grade['id']}}">{{$grade['name']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-4 col-lg-4">
                                        <label class="form-label">{{ trans('students.classroom') }}</label>
                                        <div class="">
                                            <select class="form-select" name="from_class">
                                                <option value="opt1" >{{ trans('students.selectOption') }}</option>
                                                {{-- @foreach ($bloods as $blood)
                                                    <option value="{{$blood['id']}}">{{$blood['name']}}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-4 col-lg-4">
                                        <label class="form-label">{{ trans('students.section') }}</label>
                                        <div class="">
                                            <select class="form-select" name="from_section">
                                                <option value="opt1" style="display:none">{{ trans('students.selectOption') }}</option>
                                                {{-- @foreach ($bloods as $blood)
                                                    <option value="{{$blood['id']}}">{{$blood['name']}}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="fw-bold border-bottom pb-2 mb-3">to</div>

                                <div class="row">
                                    <div class="mb-4 col-lg-4">
                                        <label class="form-label">{{ trans('students.grade') }}</label>
                                        <div class="">
                                            <select class="form-select" name="to_grade">
                                                <option value="opt1" >{{ trans('students.selectOption') }}</option>
                                                @foreach ($grades as $grade)
                                                    <option value="{{$grade['id']}}">{{$grade['name']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-4 col-lg-4">
                                        <label class="form-label">{{ trans('students.classroom') }}</label>
                                        <div class="">
                                            <select class="form-select" name="to_class">
                                                <option value="opt1" style="display:none">{{ trans('students.selectOption') }}</option>
                                                {{-- @foreach ($bloods as $blood)
                                                    <option value="{{$blood['id']}}">{{$blood['name']}}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-4 col-lg-4">
                                        <label class="form-label">{{ trans('students.section') }}</label>
                                        <div class="">
                                            <select class="form-select" name="to_section">
                                                <option value="opt1" style="display:none">{{ trans('students.selectOption') }}</option>
                                                {{-- @foreach ($bloods as $blood)
                                                    <option value="{{$blood['id']}}">{{$blood['name']}}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
						</div>
					</div>

					<!-- /collapsed state -->
@endsection



@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var gradeElements = document.querySelectorAll('select[name="from_grade"]');
        var classElements = document.querySelectorAll('select[name="from_class"]');

        gradeElements.forEach(function(gradeElement, index) {
            gradeElement.addEventListener('change', function () {
                var from_grade = this.value;
                if (from_grade) {
                    var xhr = new XMLHttpRequest();
                    xhr.open("GET", "{{ URL::to('/dashboard/classrooms/getGrade') }}/" + from_grade, true);
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
        var classElements = document.querySelectorAll('select[name="from_class"]');
        var sectionElements = document.querySelectorAll('select[name="from_section"]');

        classElements.forEach(function(classElement, index) {
            classElement.addEventListener('change', function () {
                var form_class = this.value;
                if (form_class) {
                    var xhr = new XMLHttpRequest();
                    xhr.open("GET", "{{ URL::to('/dashboard/getsection') }}/" + form_class, true);
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
<!-- ################################################################################### -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var gradeElements = document.querySelectorAll('select[name="to_grade"]');
        var classElements = document.querySelectorAll('select[name="to_class"]');

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
        var classElements = document.querySelectorAll('select[name="to_class"]');
        var sectionElements = document.querySelectorAll('select[name="to_section"]');

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