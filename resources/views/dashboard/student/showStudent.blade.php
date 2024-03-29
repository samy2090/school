                                        <!-- start show modal -->
                                        <div id="modal_show{{$student->id}}" class="modal fade" tabindex="-1">
                                            <div class="modal-dialog modal-full">
                                                <div class="modal-content">
                                                    <div class="modal-header ">
                                                        <h5 class="modal-title">{{ trans('students.show') }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="card card-body">
                                                            <h6 class="fw-semibold">Basic tabs</h6>
                                                            <ul class="nav nav-tabs nav-tabs-solid nav-tabs-solid-dark bg-info nav-justified rounded">
                                                                <li class="nav-item">
                                                                    <a href="#js-tab1{{$student->id}}" class="nav-link active" data-bs-toggle="tab">
                                                                        Details
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a href="#js-tab2{{$student->id}}" class="nav-link" data-bs-toggle="tab">
                                                                        Attachments
                                                                    </a>
                                                                </li>
                                                            </ul>
                            
                                                            <div class="tab-content">
                                                                <div class="tab-pane fade show active" id="js-tab1{{$student->id}}">
                                                                    <!--begin::Details-->
                                                                    <div class="row flex-row">
                                                                        <!--begin::Col-->
                                                                        <div class="col-lg-6 ">
                                                                            <table class="table table-flush fw-semibold gy-1">
                                                                                <tbody><tr>
                                                                                    <td class="text-muted min-w-125px w-125px">Name</td>
                                                                                    <td class="text-gray-800">{{$student->name}}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="text-muted min-w-125px w-125px">email </td>
                                                                                    <td class="text-gray-800">{{$student->email}}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="text-muted min-w-125px w-125px">gender</td>
                                                                                    <td class="text-gray-800">{{$student->gender->name}}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="text-muted min-w-125px w-125px">nationalitie</td>
                                                                                    <td class="text-gray-800">{{$student->nationalitie->name}}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="text-muted min-w-125px w-125px">blood type</td>
                                                                                    <td class="text-gray-800">{{$student->blood->name}}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="text-muted min-w-125px w-125px">Date_Birth</td>
                                                                                    <td class="text-gray-800">{{$student->Date_Birth}}</td>
                                                                                </tr>
                                                                            </tbody></table>
                                                                        </div>
                                                                        <!--end::Col-->
                                                                        <!--begin::Col-->
                                                                        <div class="col-lg-6 ">
                                                                            <table class="table table-flush fw-semibold gy-1">
                                                                                <tbody><tr>
                                                                                    <td class="text-muted min-w-125px w-125px">grade</td>
                                                                                    <td class="text-gray-800">{{$student->grade->name}}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="text-muted min-w-125px w-125px">classroom</td>
                                                                                    <td class="text-gray-800">{{$student->classroom->name}}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="text-muted min-w-125px w-125px">section</td>
                                                                                    <td class="text-gray-800"> {{$student->section->name_section}} </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="text-muted min-w-125px w-125px">parent</td>
                                                                                    <td class="text-gray-800">{{$student->stdParent->nameFather}} </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="text-muted min-w-125px w-125px">academic_year</td>
                                                                                    <td class="text-gray-800">{{$student->academic_year}} 
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="text-muted min-w-125px w-125px">address</td>
                                                                                    <td class="text-gray-800">{{$student->address}}  
                                                                                    <i class="ki-duotone ki-check fs-2 text-success"></i></td>
                                                                                </tr>
                                                                            </tbody></table>
                                                                        </div>
                                                                        <!--end::Col-->
                                                                    </div>
                                                                    <!--end::Details-->
                                                                </div>
                            
                                                                <div class="tab-pane fade" id="js-tab2{{$student->id}}">
                                                                    This is some placeholder content the <strong>second</strong> tab's associated content
                                                                    <form action="{{route('uploadAttachs')}}" method="POST" enctype="multipart/form-data">
                                                                        @csrf @method('POST')
                                                                        <div class="mb-3 col-lg-6">
                                                                            <label class="form-label">{{ trans('students.address') }}</label>
                                                                            <div class="">
                                                                                <input type="hidden" name="id" value="{{$student->id}}">
                                                                                <input type="hidden" name="enName" value="{{$student->getTranslation('name','en')}}">
                                                                                <input type="file" name="photos[]" class="file-input" multiple="multiple" data-show-upload="false" data-show-caption="true" data-show-preview="true">
                                                                            </div>
                                                                            <button type="submit" class="btn btn-outline-primary rounded-pill p-1" > save </button>
                                                                        </div>
                                                                    </form>
                                                                    <div class="table-responsive">
                                                                        <table class="table table-bordered table-striped">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>#</th>
                                                                                    <th>First Name</th>
                                                                                    <th>Last Name</th>
                                                                                    <th>Username</th>
                                                                                    <th>Username</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @php $i = 1  @endphp
                                                                                @foreach ($student->image as $image )
                                                                                <tr>
                                                                                    <td>{{$i++}}</td>
                                                                                    <td>{{$image->filename}}</td>
                                                                                    <td>{{$image->created_at}}</td>
                                                                                    <td>
                                                                                        <a href="{{asset($image->url)}}" class="btn btn-outline-white rounded-pill" data-bs-popup="lightbox">
                                                                                            <img src="{{asset($image->url)}}" class="w-32px h-32px rounded-pill" alt="">
                                                                                        </a>
                                                                                    </td>
                                                                                    <td>
                                                                                        <form action="{{route('attachmentDelete',$image->id)}}" method="POST">
                                                                                            @csrf
                                                                                            <button type="submit" class="btn btn-outline-danger rounded-pill p-1" title="{{ trans('teachers.delete') }}" >
                                                                                                <i class="ph-trash ph-1x "></i>
                                                                                            </button>
                                                                                        </form>
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

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-link" data-bs-dismiss="modal">{{ trans('classroom.close') }}</button>
                                                        <button type="submit" class="btn btn-danger">{{ trans('classroom.delete') }}</button>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end show modal -->