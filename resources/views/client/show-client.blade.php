@extends('layouts.app')

@section('template_title')
  {!! trans('clientsmanagement.showing-client', ['name' => $client->businessname]) !!}
@endsection

@section('content')

  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-12">

        <div class="card">

          <div class="card-header text-white bg-primary">
            <div style="display: flex; justify-content: space-between; align-items: center;">
              {!! trans('clientsmanagement.showing-client-title', ['name' => $client->businessname]) !!}
              <div class="float-right">
                <a href="{{ route('client.index') }}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="{{ trans('clientsmanagement.tooltips.back-clients') }}">
                  <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                  {!! trans('clientsmanagement.buttons.back-to-clients') !!}
                </a>
              </div>
            </div>
          </div>

          <div class="card-body">

            <div class="row">
              <div class="col-sm-4 col-md-6">
                <h4 class="text-muted margin-top-sm-1 text-center text-left-tablet">
                  {{ $client->name }}
                </h4>
                <p class="text-center text-left-tablet">
                  <strong>
                    {{ $client->description }}
                  </strong>
                </p>

                  {{-- <div class="text-center text-left-tablet mb-4">
                    <a href="{{ url('/profile/'.$client->name) }}" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="left" title="{{ trans('clientsmanagement.viewProfile') }}">
                      <i class="fa fa-eye fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md"> {{ trans('clientsmanagement.viewProfile') }}</span>
                    </a>
                    <a href="/users/{{$client->id}}/edit" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="{{ trans('clientsmanagement.editUser') }}">
                      <i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md"> {{ trans('clientsmanagement.editUser') }} </span>
                    </a>
                    {!! Form::open(array('url' => 'client/' . $client->id, 'class' => 'form-inline', 'data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => trans('clientsmanagement.deleteService'))) !!}
                      {!! Form::hidden('_method', 'DELETE') !!}
                      {!! Form::button('<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md">' . trans('clientsmanagement.deleteService') . '</span>' , array('class' => 'btn btn-danger btn-sm','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete Service', 'data-message' => 'Are you sure you want to delete this client?')) !!}
                    {!! Form::close() !!}
                  </div> --}}
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="row">
                <div class="col-12">
                    @if ($client->businessname)

                      <div class="col-sm-5 col-6 text-larger">
                        <strong>
                          {{ trans('clientsmanagement.labelBusinessName') }}
                        </strong>
                      </div>

                      <div class="col-sm-7">
                        {{ $client->businessname }}
                      </div>

                      <div class="clearfix"></div>
                      <div class="border-bottom"></div>

                    @endif

                    @if ($client->phone)

                    <div class="col-sm-5 col-6 text-larger">
                      <strong>
                        {{ trans('clientsmanagement.labelPhone') }}
                      </strong>
                    </div>

                    <div class="col-sm-7">
                      {{ $client->phone }}
                    </div>

                    <div class="clearfix"></div>
                    <div class="border-bottom"></div>

                  @endif
                    @if ($client->email)

                      <div class="col-sm-5 col-6 text-larger">
                        <strong>
                          {{ trans('clientsmanagement.labelEmail') }}
                        </strong>
                      </div>

                      <div class="col-sm-7">
                        {{ $client->email }}
                      </div>

                      <div class="clearfix"></div>
                      <div class="border-bottom"></div>

                    @endif

                    @if ($client->address)

                      <div class="col-sm-5 col-6 text-larger">
                        <strong>
                          {{ trans('clientsmanagement.labelAddress') }}
                        </strong>
                      </div>

                      <div class="col-sm-7">
                        {{ $client->address }}
                      </div>

                      <div class="clearfix"></div>
                      <div class="border-bottom"></div>

                    @endif

                    @if ($client->description)

                      <div class="col-sm-5 col-6 text-larger">
                        <strong>
                          {{ trans('clientsmanagement.labelDescription') }}
                        </strong>
                      </div>

                      <div class="col-sm-7">
                        {{ $client->description }}
                      </div>

                      <div class="clearfix"></div>
                      <div class="border-bottom"></div>

                    @endif
                    @if ($client->created_at)

                    <div class="col-sm-5 col-6 text-larger">
                      <strong>
                        {{ trans('clientsmanagement.labelCreatedAt') }}
                      </strong>
                    </div>

                    <div class="col-sm-7">
                      {{ $client->created_at->toDateString() }}
                    </div>

                    <div class="clearfix"></div>
                    <div class="border-bottom"></div>

                  @endif

                  @if ($client->updated_at)

                    <div class="col-sm-6 col-8 text-larger">
                      <strong>
                        {{ trans('clientsmanagement.labelUpdatedAt') }}
                      </strong>
                    </div>

                    <div class="col-sm-6">
                      {{ $client->updated_at->toDateString() }}
                    </div>

                    <div class="clearfix"></div>
                    <div class="border-bottom"></div>

                  @endif
                </div>
            </div>
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
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">File(s)</th>
                                    @permission('delete.clientproject')

                                    <th scope="col">Action</th>
                                    @endpermission
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($client->projects as $proj)
                                        <tr>
                                        <th scope="row">{{ $proj->id }}</th>
                                        <td>{{ $proj->name }}</td>
                                        <td>{{ $proj->description }}</td>
                                        <td>
                                            <button type="button" data-toggle="modal" data-fileurl="{{ 'downloadproj/'.$proj->image }}" data-target="#confirmDownload" data-title="Download Document" data-message="Are you sure you want to download Document: {{ $proj->name }}?" class="btn btn-block btn-outline-primary btn-sm" style="width: 100%;">
                                                <span class="hidden-xs hidden-sm">Download </span><i aria-hidden="true" class="fa fa-download fa-fw"></i>
                                            </button>
                                        </td>
                                        @permission('delete.clientproject')
                                        <td>
                                            {!! Form::open(array('url' => 'destroyproj/' . $proj->id, 'class' => 'form-inline', 'data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => trans('clientsmanagement.deletePdoc'))) !!}
                                            {!! Form::hidden('_method', 'DELETE') !!}
                                            {!! Form::hidden('id', $proj->id) !!}
                                            {!! Form::hidden('client_id', $proj->client_id) !!}
                                            {!! Form::button('<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md">' . trans('clientsmanagement.deletePdoc') . '</span>' , array('class' => 'btn btn-danger btn-sm','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete Document', 'data-message' => 'Are you sure you want to delete this Document?')) !!}
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

            {{--
            <div class="col-sm-5 col-6 text-larger">
              <strong>
                {{ trans('clientsmanagement.labelRole') }}
              </strong>
            </div>

            <div class="col-sm-7">
              @foreach ($client->roles as $client_role)

                @if ($client_role->name == 'User')
                  @php $badgeClass = 'primary' @endphp

                @elseif ($client_role->name == 'Admin')
                  @php $badgeClass = 'warning' @endphp

                @elseif ($client_role->name == 'Unverified')
                  @php $badgeClass = 'danger' @endphp

                @else
                  @php $badgeClass = 'default' @endphp

                @endif

                <span class="badge badge-{{$badgeClass}}">{{ $client_role->name }}</span>

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
  @if(config('clientsmanagement.tooltipsEnabled'))
    @include('scripts.tooltips')
  @endif
@endsection
