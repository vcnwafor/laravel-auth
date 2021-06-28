@extends('layouts.app')

@section('template_title')
    {!! trans('clientsmanagement.create-new-client') !!}
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
                            {!! trans('clientsmanagement.create-new-client') !!}
                            <div class="pull-right">
                                <a href="{{ route('client.index') }}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="{{ trans('clientsmanagement.tooltips.back-clients') }}">
                                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                                    {!! trans('clientsmanagement.buttons.back-to-clients') !!}
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        {!! Form::open(array('route' => 'client.store', 'method' => 'POST', 'role' => 'form','enctype' => 'multipart/form-data',  'class' => 'needs-validation')) !!}

                            {!! csrf_field() !!}

                            <div class="form-group has-feedback row {{ $errors->has('businessname') ? ' has-error ' : '' }}">
                                {!! Form::label('businessname', trans('forms.create_client_label_businessname'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('businessname', NULL, array('id' => 'businessname','required'=>'required', 'class' => 'form-control', 'placeholder' => trans('forms.create_client_ph_businessname'))) !!}
                                        <div class="input-group-append">
                                            <label for="businessname" class="input-group-text">
                                                <i class="fa fa-fw {{ trans('forms.create_client_icon_businessname') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('businessname'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('businessname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group has-feedback row {{ $errors->has('firstname') ? ' has-error ' : '' }}">
                                {!! Form::label('firstname', trans('forms.create_client_label_firstname'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('firstname', NULL, array('id' => 'firstname','required'=>'required', 'class' => 'form-control', 'placeholder' => trans('forms.create_client_ph_firstname'))) !!}
                                        <div class="input-group-append">
                                            <label for="firstname" class="input-group-text">
                                                <i class="fa fa-fw {{ trans('forms.create_client_icon_firstname') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('firstname'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('firstname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group has-feedback row {{ $errors->has('middlename') ? ' has-error ' : '' }}">
                                {!! Form::label('middlename', trans('forms.create_client_label_middlename'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('middlename', NULL, array('id' => 'middlename', 'class' => 'form-control', 'placeholder' => trans('forms.create_client_ph_middlename'))) !!}
                                        <div class="input-group-append">
                                            <label for="middlename" class="input-group-text">
                                                <i class="fa fa-fw {{ trans('forms.create_client_icon_middlename') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('middlename'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('middlename') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group has-feedback row {{ $errors->has('lastname') ? ' has-error ' : '' }}">
                                {!! Form::label('lastname', trans('forms.create_client_label_lastname'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('lastname', NULL, array('id' => 'lastname','required'=>'required', 'class' => 'form-control', 'placeholder' => trans('forms.create_client_ph_lastname'))) !!}
                                        <div class="input-group-append">
                                            <label for="lastname" class="input-group-text">
                                                <i class="fa fa-fw {{ trans('forms.create_client_icon_lastname') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('lastname'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('lastname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group has-feedback row {{ $errors->has('sex') ? ' has-error ' : '' }}">
                                {!! Form::label('sex', trans('forms.create_client_label_sex'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('sex', NULL, array('id' => 'sex', 'class' => 'form-control', 'placeholder' => trans('forms.create_client_ph_sex'))) !!}
                                        <div class="input-group-append">
                                            <label for="sex" class="input-group-text">
                                                <i class="fa fa-fw {{ trans('forms.create_client_icon_sex') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('sex'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('sex') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group has-feedback row {{ $errors->has('phone') ? ' has-error ' : '' }}">
                                {!! Form::label('phone', trans('forms.create_client_label_phone'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('phone', NULL, array('id' => 'phone','required'=>'required', 'class' => 'form-control', 'placeholder' => trans('forms.create_client_ph_phone'))) !!}
                                        <div class="input-group-append">
                                            <label for="phone" class="input-group-text">
                                                <i class="fa fa-fw {{ trans('forms.create_client_icon_phone') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group has-feedback row {{ $errors->has('image') ? ' has-error ' : '' }}">
                                {!! Form::label('image', trans('forms.create_client_label_image'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::file('image', NULL, array('id' => 'image', 'class' => 'form-control', 'placeholder' => trans('forms.create_client_ph_image'))) !!}
                                        <div class="input-group-append">
                                            <label for="image" class="input-group-text">
                                                <i class="fa fa-fw {{ trans('forms.create_client_icon_image') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('image'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group has-feedback row {{ $errors->has('email') ? ' has-error ' : '' }}">
                                {!! Form::label('email', trans('forms.create_client_label_email'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('email', NULL, array('id' => 'email', 'class' => 'form-control', 'placeholder' => trans('forms.create_client_ph_email'))) !!}
                                        <div class="input-group-append">
                                            <label for="email" class="input-group-text">
                                                <i class="fa fa-fw {{ trans('forms.create_client_icon_email') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group has-feedback row {{ $errors->has('website') ? ' has-error ' : '' }}">
                                {!! Form::label('website', trans('forms.create_client_label_website'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('website', NULL, array('id' => 'website', 'class' => 'form-control', 'placeholder' => trans('forms.create_client_ph_website'))) !!}
                                        <div class="input-group-append">
                                            <label for="website" class="input-group-text">
                                                <i class="fa fa-fw {{ trans('forms.create_client_icon_website') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('website'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('website') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group has-feedback row {{ $errors->has('address') ? ' has-error ' : '' }}">
                                {!! Form::label('address', trans('forms.create_client_label_address'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('address', NULL, array('id' => 'address','required'=>'required', 'class' => 'form-control', 'placeholder' => trans('forms.create_client_ph_address'))) !!}
                                        <div class="input-group-append">
                                            <label for="address" class="input-group-text">
                                                <i class="fa fa-fw {{ trans('forms.create_client_icon_address') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group has-feedback row {{ $errors->has('rcno') ? ' has-error ' : '' }}">
                                {!! Form::label('rcno', trans('forms.create_client_label_rcno'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('rcno', NULL, array('id' => 'rcno', 'class' => 'form-control', 'placeholder' => trans('forms.create_client_ph_rcno'))) !!}
                                        <div class="input-group-append">
                                            <label for="rcno" class="input-group-text">
                                                <i class="fa fa-fw {{ trans('forms.create_client_icon_rcno') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('rcno'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('rcno') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group has-feedback row {{ $errors->has('industry') ? ' has-error ' : '' }}">
                                {!! Form::label('industry', trans('forms.create_client_label_industry'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('industry', NULL, array('id' => 'industry','required'=>'required', 'class' => 'form-control', 'placeholder' => trans('forms.create_client_ph_industry'))) !!}
                                        <div class="input-group-append">
                                            <label for="industry" class="input-group-text">
                                                <i class="fa fa-fw {{ trans('forms.create_client_icon_industry') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('industry'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('industry') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group has-feedback row {{ $errors->has('country') ? ' has-error ' : '' }}">
                                {!! Form::label('country', trans('forms.create_client_label_country'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('country', NULL, array('id' => 'country', 'class' => 'form-control', 'placeholder' => trans('forms.create_client_ph_country'))) !!}
                                        <div class="input-group-append">
                                            <label for="country" class="input-group-text">
                                                <i class="fa fa-fw {{ trans('forms.create_client_icon_country') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('country'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('country') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {!! Form::button(trans('forms.create_client_button_text'), array('class' => 'btn btn-success margin-bottom-1 mb-1 float-right','type' => 'submit' )) !!}
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer_scripts')
@endsection
