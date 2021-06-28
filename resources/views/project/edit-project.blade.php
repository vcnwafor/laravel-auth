@extends('layouts.app')

@section('template_title')
    {!! trans('projectsmanagement.editing-project', ['name' => $project->name]) !!}
@endsection

@section('template_linked_css')
    <style type="text/css">
        .btn-save,
        .pw-change-container {
            display: none;
        }
    </style>
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            {!! trans('projectsmanagement.editing-project', ['name' => $project->name]) !!}
                            <div class="pull-right">
                                <a href="{{ route('project.index') }}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="top" title="{{ trans('projectsmanagement.tooltips.back-projects') }}">
                                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                                    {!! trans('projectsmanagement.buttons.back-to-projects') !!}
                                </a>
                                <a href="{{ url('/project/' . $project->id) }}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="{{ trans('projectsmanagement.tooltips.back-project') }}">
                                    <i class="fa fa-fw fa-reply" aria-hidden="true"></i>
                                    {!! trans('projectsmanagement.buttons.back-to-project') !!}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! Form::open(array('route' => ['project.update', $project->id], 'method' => 'PUT', 'role' => 'form', 'enctype' => 'multipart/form-data',  'class' => 'needs-validation')) !!}

                            {!! csrf_field() !!}

                            <div class="form-group has-feedback row {{ $errors->has('name') ? ' has-error ' : '' }}">
                                {!! Form::label('name', trans('forms.create_project_label_name'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('name', $project->name, array('id' => 'name', 'class' => 'form-control','required' =>'required', 'placeholder' => trans('forms.create_project_ph_name'))) !!}
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
                                    {!! Form::textarea('description', $project->description, array('id' => 'description', 'rows'=>4, 'class' => 'form-control', 'placeholder' => trans('forms.create_project_ph_description'))) !!}
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
                                        {!! Form::select('client_id', $clients,$project->client_id, array('id' => 'client_id', 'class' => 'form-control', 'required'=>'required', 'placeholder' => 'Clients')) !!}

                                        <div class="input-group-append">
                                            <label for="client_id" class="input-group-text">
                                                <i class="fa fa-fw {{ trans('forms.create_project_icon_client') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group has-feedback row {{ $errors->has('startdate') ? ' has-error ' : '' }}">
                                {!! Form::label('startdate', trans('forms.create_project_label_startdate'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::date('startdate', $project->startdate, array('id' => 'startdate', 'class' => 'form-control', 'required'=>'required', 'placeholder' => trans('forms.create_project_ph_startdate'))) !!}
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
                                        {!! Form::date('completiondate', $project->completiondate, array('id' => 'completiondate', 'class' => 'form-control',  'placeholder' => trans('forms.create_project_ph_completiondate'))) !!}
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
                                        {!! Form::text('approvedamount', $project->approvedamount, array('id' => 'approvedamount', 'class' => 'form-control', 'required'=>'required', 'placeholder' => trans('forms.create_project_ph_approvedamount'))) !!}
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
                                        {!! Form::select('status',array('Ongoing'=>'Ongoing','Paused'=>'Paused','Inspected'=>'Inspected','Completed'=>'Completed','Delivered'=>'Delivered'), $project->status, array('id' => 'status', 'class' => 'form-control','required' =>'required', 'placeholder' => trans('forms.create_project_ph_status'))) !!}
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


                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    {!! Form::button(trans('forms.save-changes'), array('class' => 'btn btn-success btn-block margin-bottom-1 mt-3 mb-2 btn-save','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmSave', 'data-title' => trans('modals.edit_project__modal_text_confirm_title'), 'data-message' => trans('modals.edit_project__modal_text_confirm_message'))) !!}
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>

    @include('modals.modal-save')
    @include('modals.modal-delete')

@endsection

@section('footer_scripts')
  @include('scripts.delete-modal-script')
  @include('scripts.save-modal-script')
  @include('scripts.check-changed')
@endsection
