@extends('layouts.app')

@section('template_title')
  {!! trans('personnelsmanagement.showing-personnel', ['name' => $personnel->employeeno]) !!}
@endsection

@section('content')

  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-12">

        <div class="card">

          <div class="card-header text-white bg-primary">
            <div style="display: flex; justify-content: space-between; align-items: center;">
              {!! trans('personnelsmanagement.showing-personnel-title', ['name' => $personnel->employeeno]) !!}
              <div class="float-right">
                <a href="{{ route('personnel.index') }}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="{{ trans('personnelsmanagement.tooltips.back-personnels') }}">
                  <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                  {!! trans('personnelsmanagement.buttons.back-to-personnels') !!}
                </a>
              </div>
            </div>
          </div>

          <div class="card-body">

            <div class="row">
              <div class="col-sm-4 col-md-6">
                <h4 class="text-muted margin-top-sm-1 text-center text-left-tablet">
                  {{ $personnel->name }}
                </h4>
                <p class="text-center text-left-tablet">
                  <strong>
                    {{ $personnel->description }}
                  </strong>
                </p>

                  {{-- <div class="text-center text-left-tablet mb-4">
                    <a href="{{ url('/profile/'.$personnel->name) }}" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="left" title="{{ trans('personnelsmanagement.viewProfile') }}">
                      <i class="fa fa-eye fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md"> {{ trans('personnelsmanagement.viewProfile') }}</span>
                    </a>
                    <a href="/users/{{$personnel->id}}/edit" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="{{ trans('personnelsmanagement.editUser') }}">
                      <i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md"> {{ trans('personnelsmanagement.editUser') }} </span>
                    </a>
                    {!! Form::open(array('url' => 'personnel/' . $personnel->id, 'class' => 'form-inline', 'data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => trans('personnelsmanagement.deleteService'))) !!}
                      {!! Form::hidden('_method', 'DELETE') !!}
                      {!! Form::button('<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md">' . trans('personnelsmanagement.deleteService') . '</span>' , array('class' => 'btn btn-danger btn-sm','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete Service', 'data-message' => 'Are you sure you want to delete this personnel?')) !!}
                    {!! Form::close() !!}
                  </div> --}}
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="row">
                <div class="col-12">
                    @if ($personnel->employeeno)

                      <div class="col-sm-5 col-6 text-larger">
                        <strong>
                          {{ trans('personnelsmanagement.labelEmployeeno') }}
                        </strong>
                      </div>

                      <div class="col-sm-7">
                        {{ $personnel->employeeno }}
                      </div>

                      <div class="clearfix"></div>
                      <div class="border-bottom"></div>

                    @endif

                    @if ($personnel->firstname)

                      <div class="col-sm-5 col-6 text-larger">
                        <strong>
                          {{ trans('personnelsmanagement.labelEmployeeno') }}
                        </strong>
                      </div>

                      <div class="col-sm-7">
                        {{ $personnel->firstname." ".$personnel->middlename." ".$personnel->lastname }}
                      </div>

                      <div class="clearfix"></div>
                      <div class="border-bottom"></div>

                    @endif

                    @if ($personnel->designation)

                      <div class="col-sm-5 col-6 text-larger">
                        <strong>
                          {{ trans('personnelsmanagement.labelDesignation') }}
                        </strong>
                      </div>

                      <div class="col-sm-7">
                        {{ $personnel->designation }}
                      </div>

                      <div class="clearfix"></div>
                      <div class="border-bottom"></div>

                    @endif

                    @if ($personnel->sex)

                      <div class="col-sm-5 col-6 text-larger">
                        <strong>
                          {{ trans('personnelsmanagement.labelSex') }}
                        </strong>
                      </div>

                      <div class="col-sm-7">
                        {{ $personnel->sex }}
                      </div>

                      <div class="clearfix"></div>
                      <div class="border-bottom"></div>

                    @endif

                    @if ($personnel->salary)

                      <div class="col-sm-5 col-6 text-larger">
                        <strong>
                          {{ trans('personnelsmanagement.labelSalary') }}
                        </strong>
                      </div>

                      <div class="col-sm-7">
                        {{ $personnel->salary }}
                      </div>

                      <div class="clearfix"></div>
                      <div class="border-bottom"></div>

                    @endif

                    @if ($personnel->maritalstatus)

                      <div class="col-sm-5 col-6 text-larger">
                        <strong>
                          {{ trans('personnelsmanagement.labelMaritalstatus') }}
                        </strong>
                      </div>

                      <div class="col-sm-7">
                        {{ $personnel->maritalstatus }}
                      </div>

                      <div class="clearfix"></div>
                      <div class="border-bottom"></div>

                    @endif

                    @if ($personnel->employmenttype)

                      <div class="col-sm-5 col-6 text-larger">
                        <strong>
                          {{ trans('personnelsmanagement.labelEmploymenttype') }}
                        </strong>
                      </div>

                      <div class="col-sm-7">
                        {{ $personnel->employmenttype }}
                      </div>

                      <div class="clearfix"></div>
                      <div class="border-bottom"></div>

                    @endif

                    @if ($personnel->employmentstatus)

                      <div class="col-sm-5 col-6 text-larger">
                        <strong>
                          {{ trans('personnelsmanagement.labelEmploymentstatus') }}
                        </strong>
                      </div>

                      <div class="col-sm-7">
                        {{ $personnel->employmentstatus }}
                      </div>

                      <div class="clearfix"></div>
                      <div class="border-bottom"></div>

                    @endif

                    @if ($personnel->email)

                      <div class="col-sm-5 col-6 text-larger">
                        <strong>
                          {{ trans('personnelsmanagement.labelEmail') }}
                        </strong>
                      </div>

                      <div class="col-sm-7">
                        {{ $personnel->email }}
                      </div>

                      <div class="clearfix"></div>
                      <div class="border-bottom"></div>

                    @endif

                    @if ($personnel->phone)

                      <div class="col-sm-5 col-6 text-larger">
                        <strong>
                          {{ trans('personnelsmanagement.labelPhone') }}
                        </strong>
                      </div>

                      <div class="col-sm-7">
                        {{ $personnel->phone }}
                      </div>

                      <div class="clearfix"></div>
                      <div class="border-bottom"></div>

                    @endif

                    @if ($personnel->description)

                      <div class="col-sm-5 col-6 text-larger">
                        <strong>
                          {{ trans('personnelsmanagement.labelDescription') }}
                        </strong>
                      </div>

                      <div class="col-sm-7">
                        {{ $personnel->description }}
                      </div>

                      <div class="clearfix"></div>
                      <div class="border-bottom"></div>

                    @endif
                    @if ($personnel->created_at->toDateString())

                    <div class="col-sm-5 col-6 text-larger">
                      <strong>
                        {{ trans('personnelsmanagement.labelCreatedAt') }}
                      </strong>
                    </div>

                    <div class="col-sm-7">
                      {{ $personnel->created_at->toDateString() }}
                    </div>

                    <div class="clearfix"></div>
                    <div class="border-bottom"></div>

                  @endif

                  @if ($personnel->updated_at->toDateString())

                    <div class="col-sm-6 col-8 text-larger">
                      <strong>
                        {{ trans('personnelsmanagement.labelUpdatedAt') }}
                      </strong>
                    </div>

                    <div class="col-sm-6">
                      {{ $personnel->updated_at->toDateString() }}
                    </div>

                    <div class="clearfix"></div>
                    <div class="border-bottom"></div>

                  @endif
                </div>
            </div>
            <div class="row mt-10">
                <div class="col-12">
                    <h5 class="card-title py-2">New Certification Form</h5>
                        {!! Form::open(array('route' => 'personnel.newcertification', 'method' => 'POST','enctype' => 'multipart/form-data', 'role' => 'form', 'class' => 'needs-validation')) !!}

                        {!! csrf_field() !!}
                        {{ Form::hidden('personnel_id',$personnel->id) }}

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Name</span>
                              </div>

                            <input type="text" class="form-control" name="name" required placeholder="name" aria-label="name">
                            <span class="input-group-text">Obtained On</span>
                            <input type="date" class="form-control" name="obtainedon" required placeholder="obtainedon" aria-label="obtainedon">

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
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                          Certifications
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Obtained On</th>
                                    <th scope="col">File</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($personnel->certifications as $proj)
                                        <tr>
                                        <th scope="row">{{ $proj->id }}</th>
                                        <td>{{ $proj->name }}</td>
                                        <td>{{ $proj->description }}</td>
                                        <td>{{ $proj->obtainedon->toDateString() }}</td>
                                        <td>
                                            <button type="button" data-toggle="modal" data-fileurl="{{ 'downloadproj/'.$proj->image }}" data-target="#confirmDownload" data-title="Download Document" data-message="Are you sure you want to download Document: {{ $proj->name }}?" class="btn btn-block btn-outline-primary btn-sm" style="width: 100%;">
                                                <span class="hidden-xs hidden-sm">Download </span><i aria-hidden="true" class="fa fa-download fa-fw"></i>
                                            </button>
                                        </td>
                                        <td>
                                            {!! Form::open(array('url' => 'destroyproj/' . $proj->id, 'class' => 'form-inline', 'data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => 'Delete Certification')) !!}
                                            {!! Form::hidden('_method', 'DELETE') !!}
                                            {!! Form::hidden('id', $proj->id) !!}
                                            {!! Form::hidden('personnel_id', $proj->personnel_id) !!}
                                            {!! Form::button('<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md">Delete Certification</span>' , array('class' => 'btn btn-danger btn-sm','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete Document', 'data-message' => 'Are you sure you want to delete this Document?')) !!}
                                          {!! Form::close() !!}

                                        </td>
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

            <div class="row mt-10">
                <div class="col-12">
                    <h5 class="card-title py-2">New Work Form</h5>
                        {!! Form::open(array('route' => 'personnel.newwork', 'method' => 'POST', 'name'=>'newworkform','enctype' => 'multipart/form-data', 'role' => 'form', 'class' => 'needs-validation')) !!}

                        {!! csrf_field() !!}
                        {{ Form::hidden('personnel_id',$personnel->id) }}

                        {{-- <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Name</span>
                            </div>
                            <input type="text" class="form-control" name="name" required placeholder="name" aria-label="name">
                        </div> --}}
                        <div class="input-group mb-3">

                          <div class="input-group-prepend">
                            <span class="input-group-text">Started On</span>
                          </div>

                        <input type="date" class="form-control" name="startdate" required placeholder="startdate" aria-label="startdate">
                        <span class="input-group-text">Ended On</span>
                        <input type="date" class="form-control" name="enddate" required placeholder="enddate" aria-label="enddate">

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
                              <button class="btn btn-outline-primary" value="workbtn" type="submit" name="workbtn" >Submit</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                </div>

            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                          Work History
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Duration</th>
                                    <th scope="col">File</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($personnel->works as $proj)
                                        <tr>
                                        <th scope="row">{{ $proj->id }}</th>
                                        <td>{{ $proj->description }}</td>
                                        <td>{{ $proj->startdate->toDateString()." to ".$proj->enddate->toDateString() }}</td>
                                        <td>
                                            <button type="button" data-toggle="modal" data-fileurl="{{ 'downloadproj/'.$proj->image }}" data-target="#confirmDownload" data-title="Download Document" data-message="Are you sure you want to download Document: {{ $proj->name }}?" class="btn btn-block btn-outline-primary btn-sm" style="width: 100%;">
                                                <span class="hidden-xs hidden-sm">Download </span><i aria-hidden="true" class="fa fa-download fa-fw"></i>
                                            </button>
                                        </td>
                                        <td>
                                            {!! Form::open(array('url' => 'destroyproj/' . $proj->id, 'class' => 'form-inline', 'data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => 'Delete Work History')) !!}
                                            {!! Form::hidden('_method', 'DELETE') !!}
                                            {!! Form::hidden('id', $proj->id) !!}
                                            {!! Form::hidden('personnel_id', $proj->personnel_id) !!}
                                            {!! Form::button('<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md">Delete Work History</span>' , array('class' => 'btn btn-danger btn-sm','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete Document', 'data-message' => 'Are you sure you want to delete this Document?')) !!}
                                          {!! Form::close() !!}

                                        </td>
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

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                          Projects
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Client</th>
                                    <th scope="col">Project</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">File</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($personnel->pteams as $proj)
                                        <tr>
                                        <th scope="row">{{ $proj->id }}</th>
                                        <td>{{ $proj->project->client->businessname }}</td>
                                        <td>{{ $proj->project->name }}</td>
                                        <td>{{ $proj->project->description }}</td>
                                        <td>
                                            <button type="button" data-toggle="modal" data-fileurl="{{ 'downloadproj/'.$proj->image }}" data-target="#confirmDownload" data-title="Download Project" data-message="Are you sure you want to download Project: {{ $proj->name }}?" class="btn btn-block btn-outline-primary btn-sm" style="width: 100%;">
                                                <span class="hidden-xs hidden-sm">Download </span><i aria-hidden="true" class="fa fa-download fa-fw"></i>
                                            </button>
                                        </td>
                                        <td>
                                            {!! Form::open(array('url' => 'destroyproj/' . $proj->id, 'class' => 'form-inline', 'data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => 'Delete Project')) !!}
                                            {!! Form::hidden('_method', 'DELETE') !!}
                                            {!! Form::hidden('id', $proj->id) !!}
                                            {!! Form::hidden('personnel_id', $proj->personnel_id) !!}
                                            {!! Form::button('<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md">Delete Project</span>' , array('class' => 'btn btn-danger btn-sm','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete Project', 'data-message' => 'Are you sure you want to delete this Project?')) !!}
                                          {!! Form::close() !!}

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
  @if(config('personnelsmanagement.tooltipsEnabled'))
    @include('scripts.tooltips')
  @endif
@endsection
