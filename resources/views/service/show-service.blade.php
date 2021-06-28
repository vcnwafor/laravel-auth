@extends('layouts.app')

@section('template_title')
  {!! trans('servicesmanagement.showing-service', ['name' => $service->name]) !!}
@endsection

@section('content')

  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-12">

        <div class="card">

          <div class="card-header text-white bg-primary">
            <div style="display: flex; justify-content: space-between; align-items: center;">
              {!! trans('servicesmanagement.showing-service-title', ['name' => $service->name]) !!}
              <div class="float-right">
                <a href="{{ route('service.index') }}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="{{ trans('servicesmanagement.tooltips.back-services') }}">
                  <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                  {!! trans('servicesmanagement.buttons.back-to-services') !!}
                </a>
              </div>
            </div>
          </div>

          <div class="card-body">

            <div class="row">
              <div class="col-sm-4 col-md-6">
                <h4 class="text-muted margin-top-sm-1 text-center text-left-tablet">
                  {{ $service->name }}
                </h4>
                <p class="text-center text-left-tablet">
                  <strong>
                    {{ $service->description }}
                  </strong>
                </p>

                  {{-- <div class="text-center text-left-tablet mb-4">
                    <a href="{{ url('/profile/'.$service->name) }}" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="left" title="{{ trans('servicesmanagement.viewProfile') }}">
                      <i class="fa fa-eye fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md"> {{ trans('servicesmanagement.viewProfile') }}</span>
                    </a>
                    <a href="/users/{{$service->id}}/edit" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="{{ trans('servicesmanagement.editUser') }}">
                      <i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md"> {{ trans('servicesmanagement.editUser') }} </span>
                    </a>
                    {!! Form::open(array('url' => 'service/' . $service->id, 'class' => 'form-inline', 'data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => trans('servicesmanagement.deleteService'))) !!}
                      {!! Form::hidden('_method', 'DELETE') !!}
                      {!! Form::button('<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md">' . trans('servicesmanagement.deleteService') . '</span>' , array('class' => 'btn btn-danger btn-sm','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete Service', 'data-message' => 'Are you sure you want to delete this service?')) !!}
                    {!! Form::close() !!}
                  </div> --}}
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="row">
                <div class="col-12">
                    @if ($service->name)

                      <div class="col-sm-5 col-6 text-larger">
                        <strong>
                          {{ trans('servicesmanagement.labelName') }}
                        </strong>
                      </div>

                      <div class="col-sm-7">
                        {{ $service->name }}
                      </div>

                      <div class="clearfix"></div>
                      <div class="border-bottom"></div>

                    @endif

                    @if ($service->description)

                      <div class="col-sm-5 col-6 text-larger">
                        <strong>
                          {{ trans('servicesmanagement.labelDescription') }}
                        </strong>
                      </div>

                      <div class="col-sm-7">
                        {{ $service->description }}
                      </div>

                      <div class="clearfix"></div>
                      <div class="border-bottom"></div>

                    @endif
                    @if ($service->created_at)

                    <div class="col-sm-5 col-6 text-larger">
                      <strong>
                        {{ trans('servicesmanagement.labelCreatedAt') }}
                      </strong>
                    </div>

                    <div class="col-sm-7">
                      {{ $service->created_at }}
                    </div>

                    <div class="clearfix"></div>
                    <div class="border-bottom"></div>

                  @endif

                  @if ($service->updated_at)

                    <div class="col-sm-6 col-8 text-larger">
                      <strong>
                        {{ trans('servicesmanagement.labelUpdatedAt') }}
                      </strong>
                    </div>

                    <div class="col-sm-6">
                      {{ $service->updated_at }}
                    </div>

                    <div class="clearfix"></div>
                    <div class="border-bottom"></div>

                  @endif
                </div>
            </div>
            <div class="row mt-10">
                <div class="col-12">
                    <h5 class="card-title py-2">New Sheet/Procedure Form</h5>
                        {!! Form::open(array('route' => 'service.newsheet', 'method' => 'POST','enctype' => 'multipart/form-data', 'role' => 'form', 'class' => 'needs-validation')) !!}

                        {!! csrf_field() !!}
                        {{ Form::hidden('service_id',$service->id) }}
                      <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Name</span>
                            </div>
                          <input type="text" class="form-control" name="name" required placeholder="name" aria-label="image">
                          <span class="input-group-text">File</span>
                          <div class="custom-file">
                              <input type="file" class="custom-file-input" id="image" name="image" aria-describedby="image">
                              <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Type</span>
                            </div>
                            <select id="inputState" class="form-control" id="type" name="type">
                                <option value="Sheet">Sheet</option>
                                <option value="Procedure">Procedure</option>
                                <option value="Sub-Service">Sub-Service</option>
                            </select>
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
                          Sub-Services
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    @permission('delete.servicesubs')
                                    <th scope="col">Action</th>
                                    @endpermission
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($service->subservices as $sheet)
                                        <tr>
                                        <td>{{ $sheet->name }}</td>
                                        <td>{{ $sheet->description }}</td>
                                        {{-- <td>
                                            <button type="button" data-toggle="modal" data-fileurl="{{ "downloadsheet".$sheet->image }}" data-target="#confirmDownload" data-title="Download Sub-Service" data-message="Are you sure you want to download Sub-Service: {{ $sheet->name }}?" class="btn btn-block btn-outline-primary btn-sm" style="width: 100%;">
                                                <span class="hidden-xs hidden-sm">Download </span><i aria-hidden="true" class="fa fa-download fa-fw"></i>
                                            </button>
                                        </td> --}}
                                    @permission('delete.servicesubs')

                                        <td>
                                            {!! Form::open(array('url' => 'destroysheet/' . $sheet->id, 'class' => 'form-inline', 'data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => trans('servicesmanagement.deleteSheet'))) !!}
                                            {!! Form::hidden('_method', 'DELETE') !!}
                                            {!! Form::hidden('id', $sheet->id) !!}
                                            {!! Form::hidden('service_id', $sheet->service_id) !!}
                                            {!! Form::button('<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md">Delete Sub-Service</span>' , array('class' => 'btn btn-danger btn-sm','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete Sub-Service', 'data-message' => 'Are you sure you want to delete this Sub-Service?')) !!}
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
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                          Sheets
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">File</th>
                                    @permission('delete.servicesheets')

                                    <th scope="col">Action</th>
                                    @endpermission
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($service->sheets as $sheet)
                                        <tr>
                                        <td>{{ $sheet->name }}</td>
                                        <td>{{ $sheet->description }}</td>
                                        <td>
                                            <button type="button" data-toggle="modal" data-fileurl="{{ "downloadsheet/".$sheet->image }}" data-target="#confirmDownload" data-title="Download Sheet" data-message="Are you sure you want to download Sheet: {{ $sheet->name }}?" class="btn btn-block btn-outline-primary btn-sm" style="width: 100%;">
                                                <span class="hidden-xs hidden-sm">Download </span><i aria-hidden="true" class="fa fa-download fa-fw"></i>
                                            </button>
                                        </td>
                                        @permission('delete.servicesheets')
                                        <td>
                                            {!! Form::open(array('url' => 'destroysheet/' . $sheet->id, 'class' => 'form-inline', 'data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => trans('servicesmanagement.deleteSheet'))) !!}
                                            {!! Form::hidden('_method', 'DELETE') !!}
                                            {!! Form::hidden('id', $sheet->id) !!}
                                            {!! Form::hidden('service_id', $sheet->service_id) !!}
                                            {!! Form::button('<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md">' . trans('servicesmanagement.deleteSheet') . '</span>' , array('class' => 'btn btn-danger btn-sm','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete Sheet', 'data-message' => 'Are you sure you want to delete this Sheet?')) !!}
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
            <div class="row mt-3">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                          Procedures
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">File</th>
                                    @permission('delete.serviceprocedures')
                                    <th scope="col">Action</th>
                                    @endpermission
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($service->procedures as $procedure)
                                        <tr>
                                        <td>{{ $procedure->name }}</td>
                                        <td>{{ $procedure->description }}</td>
                                        <td>
                                            <button type="button" data-toggle="modal" data-fileurl="{{ "downloadsheet".$procedure->image }}" data-target="#confirmDownload" data-title="Download Procedure" data-message="Are you sure you want to download Procedure: {{ $procedure->name }}?" class="btn btn-block btn-outline-primary btn-sm" style="width: 100%;">
                                                <span class="hidden-xs hidden-sm">Download </span><i aria-hidden="true" class="fa fa-download fa-fw"></i>
                                            </button>
                                        </td>
                                        @permission('delete.serviceprocedures')
                                        <td>
                                            {!! Form::open(array('url' => 'destroyprocedure/' . $procedure->id, 'class' => 'form-inline', 'data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => trans('servicesmanagement.deleteSheet'))) !!}
                                            {!! Form::hidden('_method', 'DELETE') !!}
                                            {!! Form::hidden('id', $procedure->id) !!}
                                            {!! Form::hidden('service_id', $procedure->service_id) !!}
                                            {!! Form::button('<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md">Delete Procedure</span>' , array('class' => 'btn btn-danger btn-sm','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete Procedure', 'data-message' => 'Are you sure you want to delete this Procedure?')) !!}
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
  @if(config('servicesmanagement.tooltipsEnabled'))
    @include('scripts.tooltips')
  @endif
@endsection
