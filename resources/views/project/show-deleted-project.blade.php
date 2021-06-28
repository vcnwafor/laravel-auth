@extends('layouts.app')

@section('template_title')
    {!!trans('personnelsmanagement.showing-personnel-deleted')!!} {{ $personnel->name }}
@endsection

@php
    $levelAmount = 'Level:';
    if ($personnel->level() >= 2) {
        $levelAmount = 'Levels:';
    }
@endphp

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card">

                    <div class="card-header bg-danger text-white">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            {!! trans('personnelsmanagement.personnelsDeletedPanelTitle') !!}
                            <div class="float-right">
                                <a href="/personnel/deleted/" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="{{ trans('personnelsmanagement.personnelsBackDelBtn') }}">
                                    <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                                    <span class="sr-only">
                                        {!! trans('personnelsmanagement.personnelsBackDelBtn') !!}
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4 offset-sm-2 col-md-2 offset-md-3">
                                <img src="@if ($personnel->profile && $personnel->profile->avatar_status == 1) {{ $personnel->profile->avatar }} @else {{ Gravatar::get($personnel->email) }} @endif" alt="{{ $personnel->name }}" class="rounded-circle center-block mb-3 mt-4 personnel-image">
                            </div>
                            <div class="col-sm-4 col-md-6">
                                <h4 class="text-muted margin-top-sm-1 text-center text-left-tablet">
                                    {{ $personnel->name }}
                                </h4>
                                <p class="text-center text-left-tablet">
                                    <strong>
                                    {{ $personnel->first_name }} {{ $personnel->last_name }}
                                    </strong>
                                    <br />
                                    {{ HTML::mailto($personnel->email, $personnel->email) }}
                                </p>
                                @if ($personnel->profile)
                                <div class="text-center text-left-tablet mb-4">
                                    {!! Form::model($personnel, array('action' => array('SoftDeletesController@update', $personnel->id), 'method' => 'PUT', 'class' => 'form-inline')) !!}
                                        {!! Form::button('<i class="fa fa-refresh fa-fw" aria-hidden="true"></i> Restore User', array('class' => 'btn btn-success btn-block btn-sm mt-1 mb-1', 'type' => 'submit', 'data-toggle' => 'tooltip', 'title' => 'Restore User')) !!}
                                        {!! Form::close() !!}
                                        {!! Form::model($personnel, array('action' => array('SoftDeletesController@destroy', $personnel->id), 'method' => 'DELETE', 'class' => 'form-inline', 'data-toggle' => 'tooltip', 'title' => 'Permanently Delete User')) !!}
                                        {!! Form::hidden('_method', 'DELETE') !!}
                                        {!! Form::button('<i class="fa fa-personnel-times fa-fw" aria-hidden="true"></i> Delete User', array('class' => 'btn btn-danger btn-sm ','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Permanently Delete User', 'data-message' => 'Are you sure you want to permanently delete this personnel?')) !!}
                                    {!! Form::close() !!}
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="clearfix"></div>
                        <div class="border-bottom"></div>

                        @if ($personnel->deleted_at)
                            <div class="col-sm-5 col-xs-6 text-larger">
                                <strong>
                                    {{ trans('personnelsmanagement.labelDeletedAt') }}
                                </strong>
                            </div>
                            <div class="col-sm-7 text-warning">
                                {{ $personnel->deleted_at }}
                            </div>

                            <div class="clearfix"></div>
                            <div class="border-bottom"></div>
                        @endif

                        @if ($personnel->deleted_ip_address)
                            <div class="col-sm-5 col-xs-6 text-larger">
                                <strong>
                                {{ trans('personnelsmanagement.labelIpDeleted') }}
                                </strong>
                            </div>
                            <div class="col-sm-7 text-warning">
                                {{ $personnel->deleted_ip_address }}
                            </div>

                            <div class="clearfix"></div>
                            <div class="border-bottom"></div>
                        @endif

                        @if ($personnel->name)
                            <div class="col-sm-5 col-xs-6 text-larger">
                                <strong>
                                {{ trans('personnelsmanagement.labelUserName') }}
                                </strong>
                            </div>
                            <div class="col-sm-7">
                                {{ $personnel->name }}
                            </div>

                            <div class="clearfix"></div>
                            <div class="border-bottom"></div>
                        @endif

                        @if ($personnel->email)
                            <div class="col-sm-5 col-xs-6 text-larger">
                                <strong>
                                {{ trans('personnelsmanagement.labelEmail') }}
                                </strong>
                            </div>
                            <div class="col-sm-7">
                                {{ HTML::mailto($personnel->email, $personnel->email) }}
                            </div>

                            <div class="clearfix"></div>
                            <div class="border-bottom"></div>
                        @endif

                        @if ($personnel->first_name)
                            <div class="col-sm-5 col-xs-6 text-larger">
                                <strong>
                                {{ trans('personnelsmanagement.labelFirstName') }}
                                </strong>
                            </div>
                            <div class="col-sm-7">
                                {{ $personnel->first_name }}
                            </div>

                            <div class="clearfix"></div>
                            <div class="border-bottom"></div>
                        @endif

                        @if ($personnel->last_name)
                            <div class="col-sm-5 col-xs-6 text-larger">
                                <strong>
                                {{ trans('personnelsmanagement.labelLastName') }}
                                </strong>
                            </div>
                            <div class="col-sm-7">
                                {{ $personnel->last_name }}
                            </div>

                            <div class="clearfix"></div>
                            <div class="border-bottom"></div>
                        @endif

                        <div class="col-sm-5 col-xs-6 text-larger">
                            <strong>
                                {{ trans('personnelsmanagement.labelRole') }}
                            </strong>
                        </div>
                        <div class="col-sm-7">
                            @foreach ($personnel->roles as $personnel_role)
                                @if ($personnel_role->name == 'User')
                                    @php $badgeClass = 'primary' @endphp
                                @elseif ($personnel_role->name == 'Admin')
                                    @php $badgeClass = 'warning' @endphp
                                @elseif ($personnel_role->name == 'Unverified')
                                    @php $badgeClass = 'danger' @endphp
                                @else
                                    @php $badgeClass = 'default' @endphp
                                @endif
                                <span class="badge badge-{{$badgeClass}}">{{ $personnel_role->name }}</span>
                            @endforeach
                        </div>

                        <div class="clearfix"></div>
                        <div class="border-bottom"></div>

                        <div class="col-sm-5 col-xs-6 text-larger">
                            <strong>
                                {{ trans('personnelsmanagement.labelStatus') }}
                            </strong>
                        </div>
                        <div class="col-sm-7">
                            @if ($personnel->activated == 1)
                                <span class="badge badge-success">
                                    Activated
                                </span>
                            @else
                                <span class="badge badge-danger">
                                    Not-Activated
                                </span>
                            @endif
                        </div>

                        <div class="clearfix"></div>
                        <div class="border-bottom"></div>

                        <div class="col-sm-5 col-xs-6 text-larger">
                            <strong>
                                {{ trans('personnelsmanagement.labelAccessLevel')}} {{ $levelAmount }}
                            </strong>
                        </div>
                        <div class="col-sm-7">
                            @if($personnel->level() >= 5)
                                <span class="badge badge-primary margin-half ml-0">5</span>
                            @endif

                            @if($personnel->level() >= 4)
                                <span class="badge badge-info margin-half ml-0">4</span>
                            @endif

                            @if($personnel->level() >= 3)
                                <span class="badge badge-success margin-half ml-0">3</span>
                            @endif

                            @if($personnel->level() >= 2)
                                <span class="badge badge-warning margin-half ml-0">2</span>
                            @endif

                            @if($personnel->level() >= 1)
                                <span class="badge badge-default margin-half ml-0">1</span>
                            @endif
                        </div>

                        <div class="clearfix"></div>
                        <div class="border-bottom"></div>

                        <div class="col-sm-5 col-xs-6 text-larger">
                            <strong>
                                {{ trans('personnelsmanagement.labelPermissions') }}
                            </strong>
                        </div>
                        <div class="col-sm-7">
                            @if($personnel->canViewUsers())
                                <span class="badge badge-primary margin-half margin-left-0">
                                    {{ trans('permsandroles.permissionView') }}
                                </span>
                            @endif

                            @if($personnel->canCreateUsers())
                                <span class="badge badge-info margin-half margin-left-0">
                                    {{ trans('permsandroles.permissionCreate') }}
                                </span>
                            @endif

                            @if($personnel->canEditUsers())
                                <span class="badge badge-warning margin-half margin-left-0">
                                    {{ trans('permsandroles.permissionEdit') }}
                                </span>
                            @endif

                            @if($personnel->canDeleteUsers())
                                <span class="badge badge-danger margin-half margin-left-0">
                                    {{ trans('permsandroles.permissionDelete') }}
                                </span>
                            @endif
                        </div>

                        <div class="clearfix"></div>
                        <div class="border-bottom"></div>

                        @if ($personnel->created_at)
                            <div class="col-sm-5 col-xs-6 text-larger">
                                <strong>
                                {{ trans('personnelsmanagement.labelCreatedAt') }}
                                </strong>
                            </div>
                            <div class="col-sm-7">
                                {{ $personnel->created_at }}
                            </div>

                            <div class="clearfix"></div>
                            <div class="border-bottom"></div>
                        @endif

                        @if ($personnel->updated_at)
                            <div class="col-sm-5 col-xs-6 text-larger">
                                <strong>
                                {{ trans('personnelsmanagement.labelUpdatedAt') }}
                                </strong>
                            </div>
                            <div class="col-sm-7">
                                {{ $personnel->updated_at }}
                            </div>

                            <div class="clearfix"></div>
                            <div class="border-bottom"></div>
                        @endif

                        @if ($personnel->signup_ip_address)
                            <div class="col-sm-5 col-xs-6 text-larger">
                                <strong>
                                {{ trans('personnelsmanagement.labelIpEmail') }}
                                </strong>
                            </div>
                            <div class="col-sm-7">
                                <code>
                                {{ $personnel->signup_ip_address }}
                                </code>
                            </div>

                            <div class="clearfix"></div>
                            <div class="border-bottom"></div>
                        @endif

                        @if ($personnel->signup_confirmation_ip_address)
                            <div class="col-sm-5 col-xs-6 text-larger">
                                <strong>
                                {{ trans('personnelsmanagement.labelIpConfirm') }}
                                </strong>
                            </div>
                            <div class="col-sm-7">
                                <code>
                                {{ $personnel->signup_confirmation_ip_address }}
                                </code>
                            </div>

                            <div class="clearfix"></div>
                            <div class="border-bottom"></div>
                        @endif

                        @if ($personnel->signup_sm_ip_address)
                            <div class="col-sm-5 col-xs-6 text-larger">
                                <strong>
                                {{ trans('personnelsmanagement.labelIpSocial') }}
                                </strong>
                            </div>
                            <div class="col-sm-7">
                                <code>
                                {{ $personnel->signup_sm_ip_address }}
                                </code>
                            </div>

                            <div class="clearfix"></div>
                            <div class="border-bottom"></div>

                        @endif

                        @if ($personnel->admin_ip_address)
                            <div class="col-sm-5 col-xs-6 text-larger">
                                <strong>
                                {{ trans('personnelsmanagement.labelIpAdmin') }}
                                </strong>
                            </div>
                            <div class="col-sm-7">
                                <code>
                                {{ $personnel->admin_ip_address }}
                                </code>
                            </div>

                            <div class="clearfix"></div>
                            <div class="border-bottom"></div>
                        @endif

                        @if ($personnel->updated_ip_address)
                            <div class="col-sm-5 col-xs-6 text-larger">
                                <strong>
                                {{ trans('personnelsmanagement.labelIpUpdate') }}
                                </strong>
                            </div>
                            <div class="col-sm-7">
                                <code>
                                {{ $personnel->updated_ip_address }}
                                </code>
                            </div>

                            <div class="clearfix"></div>
                            <div class="border-bottom"></div>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('modals.modal-delete')

@endsection

@section('footer_scripts')
    @include('scripts.delete-modal-script')
    @include('scripts.tooltips')
@endsection
