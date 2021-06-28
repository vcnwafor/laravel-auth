@extends('layouts.app')

@section('template_title')
    {!!trans('personnelsmanagement.show-deleted-personnels')!!}

@endsection

@section('template_linked_css')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
    <style type="text/css" media="screen">
        .personnels-table {
            border: 0;
        }
        .personnels-table tr td:first-child {
            padding-left: 15px;
        }
        .personnels-table tr td:last-child {
            padding-right: 15px;
        }
        .personnels-table.table-responsive,
        .personnels-table.table-responsive table {
            margin-bottom: .15em;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-danger text-white">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {!!trans('personnelsmanagement.show-deleted-personnels')!!}
                            </span>
                            <div class="float-right">
                                <a href="{{ route('personnels') }}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="{{ trans('personnelsmanagement.tooltips.back-personnels') }}">
                                    <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                                    {!! trans('personnelsmanagement.buttons.back-to-personnels') !!}
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        @if(count($personnels) === 0)

                            <tr>
                                <p class="text-center margin-half">
                                    {!! trans('personnelsmanagement.no-records') !!}
                                </p>
                            </tr>

                        @else

                            <div class="table-responsive personnels-table">
                                <table class="table table-striped table-sm data-table">
                                    <caption id="user_count">
                                        {{ trans_choice('personnelsmanagement.personnels-table.caption', 1, ['personnelscount' => $personnels->count()]) }}
                                    </caption>
                                    <thead>
                                        <tr>
                                            <th class="hidden-xxs">ID</th>
                                            <th>{!!trans('personnelsmanagement.personnels-table.name')!!}</th>
                                            <th class="hidden-xs hidden-sm">Email</th>
                                            <th class="hidden-xs hidden-sm hidden-md">{!!trans('personnelsmanagement.personnels-table.fname')!!}</th>
                                            <th class="hidden-xs hidden-sm hidden-md">{!!trans('personnelsmanagement.personnels-table.lname')!!}</th>
                                            <th class="hidden-xs hidden-sm">{!!trans('personnelsmanagement.personnels-table.role')!!}</th>
                                            <th class="hidden-xs">{!!trans('personnelsmanagement.labelDeletedAt')!!}</th>
                                            <th class="hidden-xs">{!!trans('personnelsmanagement.labelIpDeleted')!!}</th>
                                            <th>{!!trans('personnelsmanagement.personnels-table.actions')!!}</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($personnels as $user)
                                            <tr>
                                                <td class="hidden-xxs">{{$user->id}}</td>
                                                <td>{{$user->name}}</td>
                                                <td class="hidden-xs hidden-sm"><a href="mailto:{{ $user->email }}" title="email {{ $user->email }}">{{ $user->email }}</a></td>
                                                <td class="hidden-xs hidden-sm hidden-md">{{$user->first_name}}</td>
                                                <td class="hidden-xs hidden-sm hidden-md">{{$user->last_name}}</td>
                                                <td class="hidden-xs hidden-sm">
                                                    @foreach ($user->roles as $user_role)

                                                        @if ($user_role->name == 'User')
                                                            @php $labelClass = 'primary' @endphp

                                                        @elseif ($user_role->name == 'Admin')
                                                            @php $labelClass = 'warning' @endphp

                                                        @elseif ($user_role->name == 'Unverified')
                                                            @php $labelClass = 'danger' @endphp

                                                        @else
                                                            @php $labelClass = 'default' @endphp

                                                        @endif

                                                        <span class="label label-{{$labelClass}}">{{ $user_role->name }}</span>

                                                    @endforeach
                                                </td>
                                                <td class="hidden-xs">{{$user->deleted_at}}</td>
                                                <td class="hidden-xs">{{$user->deleted_ip_address}}</td>
                                                <td>
                                                    {!! Form::model($user, array('action' => array('SoftDeletesController@update', $user->id), 'method' => 'PUT', 'data-toggle' => 'tooltip')) !!}
                                                        {!! Form::button('<i class="fa fa-refresh" aria-hidden="true"></i>', array('class' => 'btn btn-success btn-block btn-sm', 'type' => 'submit', 'data-toggle' => 'tooltip', 'title' => 'Restore User')) !!}
                                                    {!! Form::close() !!}
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-info btn-block" href="{{ URL::to('personnels/deleted/' . $user->id) }}" data-toggle="tooltip" title="Show User">
                                                        <i class="fa fa-eye fa-fw" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    {!! Form::model($user, array('action' => array('SoftDeletesController@destroy', $user->id), 'method' => 'DELETE', 'class' => 'inline', 'data-toggle' => 'tooltip', 'title' => 'Destroy User Record')) !!}
                                                        {!! Form::hidden('_method', 'DELETE') !!}
                                                        {!! Form::button('<i class="fa fa-user-times" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm inline','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete User', 'data-message' => 'Are you sure you want to delete this user ?')) !!}
                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('modals.modal-delete')

@endsection

@section('footer_scripts')

    @if (count($personnels) > 10)
        @include('scripts.datatables')
    @endif
    @include('scripts.delete-modal-script')
    @include('scripts.save-modal-script')
    @include('scripts.tooltips')

@endsection
