@extends('layouts.app')

@section('template_title')
  {!! trans('projectsmanagement.showing-project', ['name' => $project->name]) !!}
@endsection

@section('content')

  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-12">

        <div class="card">

          <div class="card-header text-white bg-primary">
            <div style="display: flex; justify-content: space-between; align-items: center;">
              {!! trans('projectsmanagement.showing-project-title', ['name' => $project->name]) !!}
              <div class="float-right">
                <a href="{{ route('project.index') }}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="{{ trans('projectsmanagement.tooltips.back-projects') }}">
                  <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                  {!! trans('projectsmanagement.buttons.back-to-projects') !!}
                </a>
              </div>
            </div>
          </div>

          <div class="card-body">

            <div class="row">
              <div class="col-sm-4 col-md-6">
                <h4 class="text-muted margin-top-sm-1 text-center text-left-tablet">
                  {{ $project->name }}
                </h4>
                <p class="text-center text-left-tablet">
                  <strong>
                    {{ $project->description }}
                  </strong>
                </p>

                  {{-- <div class="text-center text-left-tablet mb-4">
                    <a href="{{ url('/profile/'.$project->name) }}" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="left" title="{{ trans('projectsmanagement.viewProfile') }}">
                      <i class="fa fa-eye fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md"> {{ trans('projectsmanagement.viewProfile') }}</span>
                    </a>
                    <a href="/users/{{$project->id}}/edit" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="{{ trans('projectsmanagement.editUser') }}">
                      <i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md"> {{ trans('projectsmanagement.editUser') }} </span>
                    </a>
                    {!! Form::open(array('url' => 'project/' . $project->id, 'class' => 'form-inline', 'data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => trans('projectsmanagement.deleteService'))) !!}
                      {!! Form::hidden('_method', 'DELETE') !!}
                      {!! Form::button('<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md">' . trans('projectsmanagement.deleteService') . '</span>' , array('class' => 'btn btn-danger btn-sm','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete Service', 'data-message' => 'Are you sure you want to delete this project?')) !!}
                    {!! Form::close() !!}
                  </div> --}}
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="row">
                <div class="col-12">
                    @if ($project->name)

                      <div class="col-sm-5 col-6 text-larger">
                        <strong>
                          {{ trans('projectsmanagement.labelName') }}
                        </strong>
                      </div>

                      <div class="col-sm-7">
                        {{ $project->name }}
                      </div>

                      <div class="clearfix"></div>
                      <div class="border-bottom"></div>

                    @endif

                    @if ($project->client)

                      <div class="col-sm-5 col-6 text-larger">
                        <strong>
                          {{ trans('projectsmanagement.labelClient') }}
                        </strong>
                      </div>

                      <div class="col-sm-7">
                        {{ $project->client->businessname != null ? $project->client->businessname : $project->client->firstname." ".$project->client->middlename." ".$project->client->lastname}}
                      </div>

                      <div class="clearfix"></div>
                      <div class="border-bottom"></div>

                    @endif

                    @if ($project->description)

                      <div class="col-sm-5 col-6 text-larger">
                        <strong>
                          {{ trans('projectsmanagement.labelDescription') }}
                        </strong>
                      </div>

                      <div class="col-sm-7">
                        {{ $project->description }}
                      </div>

                      <div class="clearfix"></div>
                      <div class="border-bottom"></div>

                    @endif

                    @if ($project->approvedamount)

                      <div class="col-sm-5 col-6 text-larger">
                        <strong>
                          {{ trans('projectsmanagement.labelApprovedamount') }}
                        </strong>
                      </div>

                      <div class="col-sm-7">
                        {{ $project->approvedamount }}
                      </div>

                      <div class="clearfix"></div>
                      <div class="border-bottom"></div>

                    @endif


                    @if ($project->startdate)

                      <div class="col-sm-5 col-6 text-larger">
                        <strong>
                          {{ trans('projectsmanagement.labelStart') }}
                        </strong>
                      </div>

                      <div class="col-sm-7">
                        {{ $project->startdate->toDateString() }}
                      </div>

                      <div class="clearfix"></div>
                      <div class="border-bottom"></div>

                    @endif

                    @if ($project->completiondate)

                      <div class="col-sm-5 col-6 text-larger">
                        <strong>
                          {{ trans('projectsmanagement.labelCompletion') }}
                        </strong>
                      </div>

                      <div class="col-sm-7">
                        {{ $project->completiondate->toDateString() }}
                      </div>

                      <div class="clearfix"></div>
                      <div class="border-bottom"></div>

                    @endif


                    @if ($project->status)

                      <div class="col-sm-5 col-6 text-larger">
                        <strong>
                          {{ trans('projectsmanagement.labelStatus') }}
                        </strong>
                      </div>

                      <div class="col-sm-7">
                        {{ $project->status }}
                      </div>

                      <div class="clearfix"></div>
                      <div class="border-bottom"></div>

                    @endif


                    @if ($project->created_at)

                    <div class="col-sm-5 col-6 text-larger">
                      <strong>
                        {{ trans('projectsmanagement.labelCreatedAt') }}
                      </strong>
                    </div>

                    <div class="col-sm-7">
                      {{ $project->created_at->toDateString() }}
                    </div>

                    <div class="clearfix"></div>
                    <div class="border-bottom"></div>

                  @endif

                  @if ($project->updated_at)

                    <div class="col-sm-6 col-8 text-larger">
                      <strong>
                        {{ trans('projectsmanagement.labelUpdatedAt') }}
                      </strong>
                    </div>

                    <div class="col-sm-6">
                      {{ $project->updated_at->toDateString() }}
                    </div>

                    <div class="clearfix"></div>
                    <div class="border-bottom"></div>

                  @endif
                </div>
            </div>
            @permission('add.service.project')
            <div class="row mt-10">
                <div class="col-12">
                    <h5 class="card-title py-2">New Service Form</h5>
                        {!! Form::open(array('route' => 'project.newservice', 'method' => 'POST','enctype' => 'multipart/form-data', 'role' => 'form', 'class' => 'needs-validation')) !!}

                        {!! csrf_field() !!}
                        {{ Form::hidden('project_id',$project->id) }}

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Name</span>
                              </div>
                              {!! Form::select('service_id', $services,NULL, array('id' => 'service_id', 'class' => 'form-control', 'required'=>'required', 'placeholder' => 'Select service')) !!}
                            <div class="input-group-append">
                              <button class="btn btn-outline-primary" type="submit" id="inputGroupFileAddon04">Submit</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                </div>
            </div>
            @endpermission
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                          Services
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Added On</th>
                                    @permission('delete.projectservice')

                                    <th scope="col">Action</th>
                                    @endpermission
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($project->pservices as $serv)
                                        <tr>
                                        <th scope="row">{{ $serv->id }}</th>
                                        <td>{{ $serv->service->name }}</td>
                                        <td>{{ $serv->service->description }}</td>
                                        <td>{{ $serv->created_at->toDateString() }}</td>
                                        {{-- <td>
                                            <button type="button" data-toggle="modal" data-fileurl="{{ 'downloadproj/'.$serv->image }}" data-target="#confirmDownload" data-title="Download Document" data-message="Are you sure you want to download Document: {{ $serv->name }}?" class="btn btn-block btn-outline-primary btn-sm" style="width: 100%;">
                                                <span class="hidden-xs hidden-sm">Download </span><i aria-hidden="true" class="fa fa-download fa-fw"></i>
                                            </button>
                                        </td> --}}
                                        @permission('delete.projectservice')
                                        <td>
                                            {!! Form::open(array('url' => 'destroyproj/' . $serv->id, 'class' => 'form-inline', 'data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => 'Delete Service')) !!}
                                            {!! Form::hidden('_method', 'DELETE') !!}
                                            {!! Form::hidden('id', $serv->id) !!}
                                            {!! Form::hidden('project_id', $serv->project_id) !!}
                                            {!! Form::button('<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md">Delete Service</span>' , array('class' => 'btn btn-danger btn-sm','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete Service', 'data-message' => 'Are you sure you want to delete this Service?')) !!}
                                          {!! Form::close() !!}

                                        </td>
                                        @endpermission
                                        </tr>

                                    @endforeach
                                </tbody>
                              </table>
                        </div>
                      </div>

                </div>
            </div>
            <div class="clearfix"></div>
            <div class="border-bottom mb-3 mt-3"></div>
@permission('add.personnel.project')
            <div class="row mt-10">
                <div class="col-12">
                    <h5 class="card-title py-2">New Personnel Form</h5>

                            {!! Form::open(array('route' => 'project.newpteam', 'method' => 'POST','enctype' => 'multipart/form-data', 'role' => 'form', 'class' => 'needs-validation')) !!}

                            {!! csrf_field() !!}
                            {{ Form::hidden('project_id',$project->id) }}

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Personnel</span>
                                  </div>
                                  {!! Form::select('personnel_id', $personnels,NULL, array('id' => 'personnel_id', 'class' => 'form-control', 'required'=>'required', 'placeholder' => 'Select Personnel')) !!}
                                <div class="input-group-append">
                                  <button class="btn btn-outline-primary" type="submit" id="inputGroupFileAddon04">Submit</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                </div>

            </div>
            @endpermission

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                          Team
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Skills</th>
                                    <th scope="col">File</th>
                                    @permission('delete.projectpersonnel')

                                    <th scope="col">Action</th>
                                    @endpermission
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($project->pteams as $pers)
                                        <tr>
                                        <th scope="row">{{ $pers->id }}</th>
                                        <td>{{ $pers->personnel->fullname }}</td>
                                        <td>{{ $pers->personnel->skills }}</td>
                                        @if($pers->personnel->image != null)
                                            <td>
                                                <button type="button" data-toggle="modal" data-fileurl="{{ 'downloadproj/'.$pers->image }}" data-target="#confirmDownload" data-title="Download Document" data-message="Are you sure you want to download Document: {{ $pers->name }}?" class="btn btn-block btn-outline-primary btn-sm" style="width: 100%;">
                                                    <span class="hidden-xs hidden-sm">Download </span><i aria-hidden="true" class="fa fa-download fa-fw"></i>
                                                </button>
                                            </td>

                                        @else
                                            <td>...</td>
                                        @endif
                                        @permission('delete.projectpersonnel')
                                        <td>
                                            {!! Form::open(array('url' => 'destroyproj/' . $pers->id, 'class' => 'form-inline', 'data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => 'Delete Personnel')) !!}
                                            {!! Form::hidden('_method', 'DELETE') !!}
                                            {!! Form::hidden('id', $pers->id) !!}
                                            {!! Form::hidden('project_id', $pers->project_id) !!}
                                            {!! Form::button('<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md">Delete Personnel</span>' , array('class' => 'btn btn-danger btn-sm','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete Personnel', 'data-message' => 'Are you sure you want to delete this Personnel?')) !!}
                                          {!! Form::close() !!}

                                        </td>
                                        @endpermission
                                        </tr>

                                    @endforeach
                                </tbody>
                              </table>
                        </div>
                      </div>

                </div>
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom mb-3 mt-3"></div>
@permission('create.reports')
<div class="row mt-10">
    <div class="col-12">
        <h5 class="card-title py-2">New Report Form</h5>
            {!! Form::open(array('route' => 'project.newreport', 'method' => 'POST','enctype' => 'multipart/form-data', 'role' => 'form', 'class' => 'needs-validation')) !!}

            {!! csrf_field() !!}
            {{ Form::hidden('project_id',$project->id) }}
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Completion Percentage</span>
                  </div>

                <input type="text" class="form-control" name="completion" required placeholder="15%" aria-label="completion">
                <span class="input-group-text">Date</span>
                <input type="date" class="form-control" name="actiondate" required placeholder="actiondate" aria-label="actiondate">

              </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Description</span>
                  </div>

                <input type="text" class="form-control" name="description" required placeholder="description" aria-label="description">
                <span class="input-group-text">File</span>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" required id="image" name="image" aria-describedby="image">
                    <label class="custom-file-label" for="image">Choose file</label>
                  </div>
                  <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="submit" id="inputGroupFileAddon04">Submit</button>
                  </div>
              </div>
            {!! Form::close() !!}
    </div>

</div>

@endpermission
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                          Reports
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Completion %</th>
                                    <th scope="col">File</th>
                                    @permission('delete.projectreports')
                                    <th scope="col">Action</th>
                                    @endpermissions
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($project->reports as $rep)
                                        <tr>
                                        <th scope="row">{{ $rep->id }}</th>
                                        <th>{{ $rep->actiondate->toDateString() }}</th>
                                        <td>{{ $rep->description }}</td>
                                        <td>{{ $rep->completion }}</td>
                                        <td>
                                            <button type="button" data-toggle="modal" data-fileurl="{{ 'downloadreport/'.$rep->image }}" data-target="#confirmDownload" data-title="Download Report" data-message="Are you sure you want to download Report: {{ $rep->name }}?" class="btn btn-block btn-outline-primary btn-sm" style="width: 100%;">
                                                <span class="hidden-xs hidden-sm">Download </span><i aria-hidden="true" class="fa fa-download fa-fw"></i>
                                            </button>
                                        </td>
                                        @permission('delete.projectreports')
                                        <td>
                                            {!! Form::open(array('url' => 'destroyreport/' . $rep->id, 'class' => 'form-inline', 'data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => 'Delete Report')) !!}
                                            {!! Form::hidden('_method', 'DELETE') !!}
                                            {!! Form::hidden('id', $rep->id) !!}
                                            {!! Form::hidden('project_id', $rep->project_id) !!}
                                            {!! Form::button('<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md">Delete Report</span>' , array('class' => 'btn btn-danger btn-sm','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete Report', 'data-message' => 'Are you sure you want to delete this Report?')) !!}
                                          {!! Form::close() !!}

                                        </td>
                                        @endpermission
                                        </tr>

                                    @endforeach
                                </tbody>
                              </table>
                        </div>
                      </div>

                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @include('modals.modal-delete')
  @include('modals.modal-download')

@endsection

@section('footer_scripts')
  @include('scripts.delete-modal-script')
  @include('scripts.download-modal-script')
  @if(config('projectsmanagement.tooltipsEnabled'))
    @include('scripts.tooltips')
  @endif
@endsection
