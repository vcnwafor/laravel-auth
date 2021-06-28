@extends('layouts.app')

@section('template_title')
  {!! trans('proceduresmanagement.showing-procedure', ['name' => $procedure->name]) !!}
@endsection

@section('content')

  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-12">

        <div class="card">

          <div class="card-header text-white bg-primary">
            <div style="display: flex; justify-content: space-between; align-items: center;">
              {!! trans('proceduresmanagement.showing-procedure-title', ['name' => $procedure->name]) !!}
              <div class="float-right">
                <a href="{{ route('service.index') }}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="{{ trans('proceduresmanagement.tooltips.back-procedures') }}">
                  <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                  {!! trans('proceduresmanagement.buttons.back-to-procedures') !!}
                </a>
              </div>
            </div>
          </div>

          <div class="card-body">

            <div class="row">
              <div class="col-sm-4 col-md-6">
                <h4 class="text-muted margin-top-sm-1 text-center text-left-tablet">
                  {{ $procedure->name }}
                </h4>
                <p class="text-center text-left-tablet">
                  <strong>
                    {{ $procedure->description }}
                  </strong>
                </p>

                  {{-- <div class="text-center text-left-tablet mb-4">
                    <a href="{{ url('/profile/'.$procedure->name) }}" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="left" title="{{ trans('proceduresmanagement.viewProfile') }}">
                      <i class="fa fa-eye fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md"> {{ trans('proceduresmanagement.viewProfile') }}</span>
                    </a>
                    <a href="/users/{{$procedure->id}}/edit" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="{{ trans('proceduresmanagement.editUser') }}">
                      <i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md"> {{ trans('proceduresmanagement.editUser') }} </span>
                    </a>
                    {!! Form::open(array('url' => 'service/' . $procedure->id, 'class' => 'form-inline', 'data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => trans('proceduresmanagement.deleteService'))) !!}
                      {!! Form::hidden('_method', 'DELETE') !!}
                      {!! Form::button('<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md">' . trans('proceduresmanagement.deleteService') . '</span>' , array('class' => 'btn btn-danger btn-sm','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete Service', 'data-message' => 'Are you sure you want to delete this service?')) !!}
                    {!! Form::close() !!}
                  </div> --}}
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="row">
                <div class="col-12">
                    @if ($procedure->name)

                      <div class="col-sm-5 col-6 text-larger">
                        <strong>
                          {{ trans('proceduresmanagement.labelName') }}
                        </strong>
                      </div>

                      <div class="col-sm-7">
                        {{ $procedure->name }}
                      </div>

                      <div class="clearfix"></div>
                      <div class="border-bottom"></div>

                    @endif

                    @if ($procedure->description)

                      <div class="col-sm-5 col-6 text-larger">
                        <strong>
                          {{ trans('proceduresmanagement.labelDescription') }}
                        </strong>
                      </div>

                      <div class="col-sm-7">
                        {{ $procedure->description }}
                      </div>

                      <div class="clearfix"></div>
                      <div class="border-bottom"></div>

                    @endif
                    @if ($procedure->created_at)

                    <div class="col-sm-5 col-6 text-larger">
                      <strong>
                        {{ trans('proceduresmanagement.labelCreatedAt') }}
                      </strong>
                    </div>

                    <div class="col-sm-7">
                      {{ $procedure->created_at }}
                    </div>

                    <div class="clearfix"></div>
                    <div class="border-bottom"></div>

                  @endif

                  @if ($procedure->updated_at)

                    <div class="col-sm-6 col-8 text-larger">
                      <strong>
                        {{ trans('proceduresmanagement.labelUpdatedAt') }}
                      </strong>
                    </div>

                    <div class="col-sm-6">
                      {{ $procedure->updated_at }}
                    </div>

                    <div class="clearfix"></div>
                    <div class="border-bottom"></div>

                  @endif
                </div>
            </div>
            <div class="row mt-10">
                <div class="col-12">
                    <h5 class="card-title py-2">New Document Form</h5>
                        {!! Form::open(array('route' => 'procedure.newpdoc', 'method' => 'POST','enctype' => 'multipart/form-data', 'role' => 'form', 'class' => 'needs-validation')) !!}

                        {!! csrf_field() !!}
                        {{ Form::hidden('procedure_id',$procedure->id) }}
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text">Name</span>
                            </div>

                          <input type="text" class="form-control" name="name" required placeholder="name" aria-label="image">
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
                          Documents
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">File</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($procedure->pdocs as $pdoc)
                                        <tr>
                                        <th scope="row">{{ $pdoc->id }}</th>
                                        <td>{{ $pdoc->name }}</td>
                                        <td>{{ $pdoc->description }}</td>
                                        <td>
                                            <button type="button" data-toggle="modal" data-fileurl="{{ 'downloadpdoc/'.$pdoc->image }}" data-target="#confirmDownload" data-title="Download Document" data-message="Are you sure you want to download Document: {{ $pdoc->name }}?" class="btn btn-block btn-outline-primary btn-sm" style="width: 100%;">
                                                <span class="hidden-xs hidden-sm">Download </span><i aria-hidden="true" class="fa fa-download fa-fw"></i>
                                            </button>
                                        </td>
                                        <td>
                                            {!! Form::open(array('url' => 'destroypdoc/' . $pdoc->id, 'class' => 'form-inline', 'data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => trans('proceduresmanagement.deletePdoc'))) !!}
                                            {!! Form::hidden('_method', 'DELETE') !!}
                                            {!! Form::hidden('id', $pdoc->id) !!}
                                            {!! Form::hidden('procedure_id', $pdoc->procedure_id) !!}
                                            {!! Form::button('<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md">' . trans('proceduresmanagement.deletePdoc') . '</span>' , array('class' => 'btn btn-danger btn-sm','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete Document', 'data-message' => 'Are you sure you want to delete this Document?')) !!}
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

            {{--
            <div class="col-sm-5 col-6 text-larger">
              <strong>
                {{ trans('proceduresmanagement.labelRole') }}
              </strong>
            </div>

            <div class="col-sm-7">
              @foreach ($procedure->roles as $procedure_role)

                @if ($procedure_role->name == 'User')
                  @php $badgeClass = 'primary' @endphp

                @elseif ($procedure_role->name == 'Admin')
                  @php $badgeClass = 'warning' @endphp

                @elseif ($procedure_role->name == 'Unverified')
                  @php $badgeClass = 'danger' @endphp

                @else
                  @php $badgeClass = 'default' @endphp

                @endif

                <span class="badge badge-{{$badgeClass}}">{{ $procedure_role->name }}</span>

              @endforeach
            </div> --}}



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
  @if(config('proceduresmanagement.tooltipsEnabled'))
    @include('scripts.tooltips')
  @endif
@endsection
