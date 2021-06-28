@extends('layouts.app')

@section('template_title')
    {!! trans('projectsmanagement.create-new-project') !!}
@endsection

@section('template_fastload_css')
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            {!! trans('projectsmanagement.create-new-project') !!}
                            <div class="pull-right">
                                <a href="{{ route('project.index') }}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="{{ trans('projectsmanagement.tooltips.back-projects') }}">
                                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                                    {!! trans('projectsmanagement.buttons.back-to-projects') !!}
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        {!! Form::open(array('route' => 'project.store', 'method' => 'POST', 'role' => 'form','enctype' => 'multipart/form-data',  'class' => 'needs-validation')) !!}

                            {!! csrf_field() !!}

                            <div class="form-group has-feedback row {{ $errors->has('name') ? ' has-error ' : '' }}">
                                {!! Form::label('name', trans('forms.create_project_label_name'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('name', NULL, array('id' => 'name', 'class' => 'form-control','required' =>'required', 'placeholder' => trans('forms.create_project_ph_name'))) !!}
                                        <div class="input-group-append">
                                            <label for="name" class="input-group-text">
                                                <i class="fa fa-fw {{ trans('forms.create_project_icon_name') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group has-feedback row {{ $errors->has('description') ? ' has-error ' : '' }}">
                                {!! Form::label('description', trans('forms.create_service_label_description') , array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    {!! Form::textarea('description', old('description'), array('id' => 'description', 'rows'=>4, 'class' => 'form-control', 'placeholder' => trans('forms.create_project_ph_description'))) !!}
                                    <span class="glyphicon glyphicon-pencil form-control-feedback" aria-hidden="true"></span>
                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group has-feedback row {{ $errors->has('client_id') ? ' has-error ' : '' }}">
                                {!! Form::label('client_id', trans('forms.create_project_label_client'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::select('client_id', $clients,NULL, array('id' => 'client_id', 'class' => 'form-control', 'required'=>'required', 'placeholder' => 'Clients')) !!}

                                        <div class="input-group-append">
                                            <label for="client_id" class="input-group-text">
                                                <i class="fa fa-fw {{ trans('forms.create_project_icon_client') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('client_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('client_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group has-feedback row {{ $errors->has('startdate') ? ' has-error ' : '' }}">
                                {!! Form::label('startdate', trans('forms.create_project_label_startdate'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::date('startdate', NULL, array('id' => 'startdate', 'class' => 'form-control', 'required'=>'required', 'placeholder' => trans('forms.create_project_ph_startdate'))) !!}
                                        <div class="input-group-append">
                                            <label for="startdate" class="input-group-text">
                                                <i class="fa fa-fw {{ trans('forms.create_project_icon_startdate') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('startdate'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('startdate') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group has-feedback row {{ $errors->has('completiondate') ? ' has-error ' : '' }}">
                                {!! Form::label('completiondate', trans('forms.create_project_label_completiondate'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::date('completiondate', NULL, array('id' => 'completiondate', 'class' => 'form-control',  'placeholder' => trans('forms.create_project_ph_completiondate'))) !!}
                                        <div class="input-group-append">
                                            <label for="completiondate" class="input-group-text">
                                                <i class="fa fa-fw {{ trans('forms.create_project_icon_completiondate') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('completiondate'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('completiondate') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group has-feedback row {{ $errors->has('approvedamount') ? ' has-error ' : '' }}">
                                {!! Form::label('approvedamount', trans('forms.create_project_label_approvedamount'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('approvedamount', NULL, array('id' => 'approvedamount', 'class' => 'form-control', 'required'=>'required', 'placeholder' => trans('forms.create_project_ph_approvedamount'))) !!}
                                        <div class="input-group-append">
                                            <label for="approvedamount" class="input-group-text">
                                                <i class="fa fa-fw {{ trans('forms.create_project_icon_approvedamount') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('approvedamount'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('approvedamount') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group has-feedback row {{ $errors->has('status') ? ' has-error ' : '' }}">
                                {!! Form::label('status', trans('forms.create_project_label_status'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::select('status',array('Ongoing'=>'Ongoing','Paused'=>'Paused','Inspected'=>'Inspected','Completed'=>'Completed','Delivered'=>'Delivered'), NULL, array('id' => 'status', 'class' => 'form-control','required' =>'required', 'placeholder' => trans('forms.create_project_ph_status'))) !!}
                                        <div class="input-group-append">
                                            <label for="status" class="input-group-text">
                                                <i class="fa fa-fw {{ trans('forms.create_project_icon_status') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('status'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('status') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {!! Form::button(trans('forms.create_project_button_text'), array('class' => 'btn btn-success margin-bottom-1 mb-1 float-right','type' => 'submit' )) !!}
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer_scripts')
@endsection
