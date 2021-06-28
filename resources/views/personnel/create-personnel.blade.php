@extends('layouts.app')

@section('template_title')
    {!! trans('personnelsmanagement.create-new-personnel') !!}
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
                            {!! trans('personnelsmanagement.create-new-personnel') !!}
                            <div class="pull-right">
                                <a href="{{ route('personnel.index') }}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="{{ trans('personnelsmanagement.tooltips.back-personnels') }}">
                                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                                    {!! trans('personnelsmanagement.buttons.back-to-personnels') !!}
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        {!! Form::open(array('route' => 'personnel.store', 'method' => 'POST', 'role' => 'form','enctype' => 'multipart/form-data',  'class' => 'needs-validation')) !!}

                            {!! csrf_field() !!}

                            <div class="form-group has-feedback row {{ $errors->has('employeeno') ? ' has-error ' : '' }}">
                                {!! Form::label('employeeno', trans('forms.create_personnel_label_employeeno'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('employeeno', NULL, array('id' => 'employeeno', 'class' => 'form-control', 'placeholder' => trans('forms.create_personnel_ph_employeeno'))) !!}
                                        <div class="input-group-append">
                                            <label for="employeeno" class="input-group-text">
                                                <i class="fa fa-fw {{ trans('forms.create_personnel_icon_employeeno') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('employeeno'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('employeeno') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group has-feedback row {{ $errors->has('firstname') ? ' has-error ' : '' }}">
                                {!! Form::label('firstname', trans('forms.create_personnel_label_firstname'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('firstname', NULL, array('id' => 'firstname', 'class' => 'form-control', 'required'=>'required', 'placeholder' => trans('forms.create_personnel_ph_firstname'))) !!}
                                        <div class="input-group-append">
                                            <label for="firstname" class="input-group-text">
                                                <i class="fa fa-fw {{ trans('forms.create_personnel_icon_firstname') }}" aria-hidden="true"></i>
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
                                {!! Form::label('middlename', trans('forms.create_personnel_label_middlename'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('middlename', NULL, array('id' => 'middlename', 'class' => 'form-control',  'placeholder' => trans('forms.create_personnel_ph_middlename'))) !!}
                                        <div class="input-group-append">
                                            <label for="middlename" class="input-group-text">
                                                <i class="fa fa-fw {{ trans('forms.create_personnel_icon_middlename') }}" aria-hidden="true"></i>
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
                                {!! Form::label('lastname', trans('forms.create_personnel_label_lastname'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('lastname', NULL, array('id' => 'lastname', 'class' => 'form-control', 'required'=>'required', 'placeholder' => trans('forms.create_personnel_ph_lastname'))) !!}
                                        <div class="input-group-append">
                                            <label for="lastname" class="input-group-text">
                                                <i class="fa fa-fw {{ trans('forms.create_personnel_icon_lastname') }}" aria-hidden="true"></i>
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
                                {!! Form::label('sex', trans('forms.create_personnel_label_sex'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::select('sex',array('Male'=>'Male', 'Female'=>'Female'), NULL, array('id' => 'sex', 'class' => 'form-control','required' =>'required', 'placeholder' => trans('forms.create_personnel_ph_sex'))) !!}
                                        <div class="input-group-append">
                                            <label for="sex" class="input-group-text">
                                                <i class="fa fa-fw {{ trans('forms.create_personnel_icon_sex') }}" aria-hidden="true"></i>
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
                                {!! Form::label('phone', trans('forms.create_personnel_label_phone'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('phone', NULL, array('id' => 'phone', 'class' => 'form-control', 'required'=>'required', 'placeholder' => trans('forms.create_personnel_ph_phone'))) !!}
                                        <div class="input-group-append">
                                            <label for="phone" class="input-group-text">
                                                <i class="fa fa-fw {{ trans('forms.create_personnel_icon_phone') }}" aria-hidden="true"></i>
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
                                {!! Form::label('image', trans('forms.create_personnel_label_image'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::file('image', NULL, array('id' => 'image', 'class' => 'form-control', 'placeholder' => trans('forms.create_personnel_ph_image'))) !!}
                                        <div class="input-group-append">
                                            <label for="image" class="input-group-text">
                                                <i class="fa fa-fw {{ trans('forms.create_personnel_icon_image') }}" aria-hidden="true"></i>
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
                                {!! Form::label('email', trans('forms.create_personnel_label_email'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('email', NULL, array('id' => 'email', 'class' => 'form-control', 'placeholder' => trans('forms.create_personnel_ph_email'))) !!}
                                        <div class="input-group-append">
                                            <label for="email" class="input-group-text">
                                                <i class="fa fa-fw {{ trans('forms.create_personnel_icon_email') }}" aria-hidden="true"></i>
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
                            <div class="form-group has-feedback row {{ $errors->has('designation') ? ' has-error ' : '' }}">
                                {!! Form::label('designation', trans('forms.create_personnel_label_designation'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('designation', NULL, array('id' => 'designation', 'class' => 'form-control', 'required'=>'required', 'placeholder' => trans('forms.create_personnel_ph_designation'))) !!}
                                        <div class="input-group-append">
                                            <label for="designation" class="input-group-text">
                                                <i class="fa fa-fw {{ trans('forms.create_personnel_icon_designation') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('designation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('designation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group has-feedback row {{ $errors->has('salary') ? ' has-error ' : '' }}">
                                {!! Form::label('salary', trans('forms.create_personnel_label_salary'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('salary', NULL, array('id' => 'salary', 'class' => 'form-control', 'placeholder' => trans('forms.create_personnel_ph_salary'))) !!}
                                        <div class="input-group-append">
                                            <label for="salary" class="input-group-text">
                                                <i class="fa fa-fw {{ trans('forms.create_personnel_icon_salary') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('salary'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('salary') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group has-feedback row {{ $errors->has('address') ? ' has-error ' : '' }}">
                                {!! Form::label('address', trans('forms.create_personnel_label_address'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('address', NULL, array('id' => 'address', 'required'=>'required', 'class' => 'form-control', 'placeholder' => trans('forms.create_personnel_ph_address'))) !!}
                                        <div class="input-group-append">
                                            <label for="address" class="input-group-text">
                                                <i class="fa fa-fw {{ trans('forms.create_personnel_icon_address') }}" aria-hidden="true"></i>
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
                            <div class="form-group has-feedback row {{ $errors->has('skills') ? ' has-error ' : '' }}">
                                {!! Form::label('skills', trans('forms.create_personnel_label_skills'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('skills', NULL, array('id' => 'skills', 'class' => 'form-control', 'required'=>'required', 'placeholder' => trans('forms.create_personnel_ph_skills'))) !!}
                                        <div class="input-group-append">
                                            <label for="skills" class="input-group-text">
                                                <i class="fa fa-fw {{ trans('forms.create_personnel_icon_skills') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('skills'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('skills') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group has-feedback row {{ $errors->has('country') ? ' has-error ' : '' }}">
                                {!! Form::label('country', trans('forms.create_personnel_label_country'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('country', NULL, array('id' => 'country', 'class' => 'form-control', 'placeholder' => trans('forms.create_personnel_ph_country'))) !!}
                                        <div class="input-group-append">
                                            <label for="country" class="input-group-text">
                                                <i class="fa fa-fw {{ trans('forms.create_personnel_icon_country') }}" aria-hidden="true"></i>
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
                            <div class="form-group has-feedback row {{ $errors->has('maritalstatus') ? ' has-error ' : '' }}">
                                {!! Form::label('maritalstatus', trans('forms.create_personnel_label_maritalstatus'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::select('maritalstatus',array('Marrie'=>'Married','Single'=>'Single','Separated'=>'Separated','Divorced'=>'Divorced'), NULL, array('id' => 'maritalstatus', 'class' => 'form-control', 'placeholder' => trans('forms.create_personnel_ph_maritalstatus'))) !!}
                                        <div class="input-group-append">
                                            <label for="maritalstatus" class="input-group-text">
                                                <i class="fa fa-fw {{ trans('forms.create_personnel_icon_maritalstatus') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('maritalstatus'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('maritalstatus') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group has-feedback row {{ $errors->has('employmentstatus') ? ' has-error ' : '' }}">
                                {!! Form::label('employmentstatus', trans('forms.create_personnel_label_employmentstatus'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::select('employmentstatus',array('Active'=>'Active', 'required'=>'required', 'Disengaged'=>'Disengaged','Sacked'=>'Sacked'), NULL, array('id' => 'employmentstatus', 'class' => 'form-control', 'placeholder' => trans('forms.create_personnel_ph_employmentstatus'))) !!}
                                        <div class="input-group-append">
                                            <label for="employmentstatus" class="input-group-text">
                                                <i class="fa fa-fw {{ trans('forms.create_personnel_icon_employmentstatus') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('employmentstatus'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('employmentstatus') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group has-feedback row {{ $errors->has('employmenttype') ? ' has-error ' : '' }}">
                                {!! Form::label('employmenttype', trans('forms.create_personnel_label_employmenttype'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::select('employmenttype', array('Fulltime'=>'Fulltime', 'required'=>'required', 'Contract'=>'Contract','Consultant'=>'Consultant'),null, array('id' => 'employmenttype', 'class' => 'form-control', 'placeholder' => trans('forms.create_personnel_ph_employmenttype'))) !!}
                                        <div class="input-group-append">
                                            <label for="employmenttype" class="input-group-text">
                                                <i class="fa fa-fw {{ trans('forms.create_personnel_icon_employmenttype') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('employmenttype'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('employmenttype') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group has-feedback row {{ $errors->has('dob') ? ' has-error ' : '' }}">
                                {!! Form::label('dob', trans('forms.create_personnel_label_dob'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::date('dob', NULL, array('id' => 'dob','class' => 'form-control', 'required'=>'required', 'placeholder' => trans('forms.create_personnel_ph_dob'))) !!}
                                        <div class="input-group-append">
                                            <label for="dob" class="input-group-text">
                                                <i class="fa fa-fw {{ trans('forms.create_personnel_icon_dob') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('dob'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('dob') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {!! Form::button(trans('forms.create_personnel_button_text'), array('class' => 'btn btn-success margin-bottom-1 mb-1 float-right','type' => 'submit' )) !!}
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer_scripts')
@endsection
