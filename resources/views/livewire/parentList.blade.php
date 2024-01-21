<div class="card">


    <div class="card-body">
        <button type="button" class="btn btn-outline-success my-1 me-2" data-bs-toggle="modal" data-bs-target="#modal_centered" wire:click='showFormAdd'>  {{ trans('addParents.addParent') }}   <i class="ph-plus ph-1x me-1"></i></button>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{ trans('addParents.email') }}</th>
                    <th>{{ trans('addParents.fatherName') }}</th>
                    <th>{{ trans('addParents.jobFather') }}</th>
                    <th>{{ trans('addParents.nationalID_father') }}</th>
                    <th>{{ trans('addParents.options') }}</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 0;                @endphp
                @foreach ($parents as $parent )
                    
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{$parent['Email']}}</td>
                        <td>{{$parent['nameFather']}}</td>
                        <td>{{$parent['jobFather']}}</td>
                        <td>{{$parent['national_ID_Father']}}</td>
                        <td> 
                            <button type="button" class="btn btn-outline-secondary rounded-pill p-1" title="تعديل" data-bs-toggle="modal" data-bs-target="#modal_centered_edit1" wire:click="showUpdateForm({{$parent['id']}})">
                                <i class="ph-note-pencil ph-1x"></i>
                            </button>	
                            <button type="button" class="btn btn-outline-danger rounded-pill p-1" title="حذف" data-bs-toggle="modal" data-bs-target="#modal_delete{{$parent->id}}" >
                                <i class="ph-trash ph-1x "></i>
                            </button>	
                        </td>
                    </tr>
                    <!-- start delete modal -->
                    <div id="modal_delete{{$parent->id}}" class="modal fade" tabindex="-1">
                        <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger text-white border-0">
                                        <h6 class="modal-title">{{ trans('grades.delete') }}</h6>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                    </div>

                                    <div class="modal-body">
                                        <input type="hidden" value="{{$parent->id}}" name="id">
                                        <h6 class="fw-semibold">{{ trans('grades.delete_sure') }}</h6>
                                        <p>{{ $parent->nameFather }}</p>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-link" data-bs-dismiss="modal" >{{ trans('grades.close') }}</button>
                                        <button type="submit" class="btn btn-danger" wire:click="destroy({{$parent['id']}})">{{ trans('grades.delete') }}</button>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <!-- end delete modal -->
                @endforeach

            </tbody>
        </table>
    </div>
</div>