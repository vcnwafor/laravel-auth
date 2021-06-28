@extends('layouts.app')

@section('template_title')
    {!! trans('assetsmanagement.editing-asset', ['name' => $asset->name]) !!}
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
                            {!! trans('assetsmanagement.editing-asset', ['name' => $asset->name]) !!}
                            <div class="pull-right">
                                <a href="{{ route('asset.index') }}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="top" title="{{ trans('assetsmanagement.tooltips.back-assets') }}">
                                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                                    {!! trans('assetsmanagement.buttons.back-to-assets') !!}
                                </a>
                                <a href="{{ url('/asset/' . $asset->id) }}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="{{ trans('assetsmanagement.tooltips.back-asset') }}">
                                    <i class="fa fa-fw fa-reply" aria-hidden="true"></i>
                                    {!! trans('assetsmanagement.buttons.back-to-asset') !!}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! Form::open(array('route' => ['asset.update', $asset->id], 'method' => 'PUT', 'role' => 'form', 'enctype' => 'multipart/form-data',  'class' => 'needs-validation')) !!}

                            {!! csrf_field() !!}

                            <div class="form-group has-feedback row {{ $errors->has('name') ? ' has-error ' : '' }}">
                                {!! Form::label('name', trans('forms.create_asset_label_name'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('name', $asset->name, array('id' => 'name', 'class' => 'form-control', 'required' =>'required', 'placeholder' => trans('forms.create_asset_ph_name'))) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="name">
                                                <i class="fa fa-fw {{ trans('forms.create_asset_icon_name') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group has-feedback row {{ $errors->has('image') ? ' has-error ' : '' }}">
                                {!! Form::label('image', trans('forms.create_asset_label_image'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-3">
                      <img src="{{ asset('/uploads/assets/images/'.$asset->image) }}" style="width:200px;" />

                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        {!! Form::file('image', NULL, array('id' => 'image', 'class' => 'form-control', 'placeholder' => trans('forms.create_asset_ph_image'))) !!}
                                        <div class="input-group-append">
                                            <label for="image" class="input-group-text">
                                                <i class="fa fa-fw {{ trans('forms.create_asset_icon_image') }}" aria-hidden="true"></i>
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

                            <div class="form-group has-feedback row {{ $errors->has('location') ? ' has-error ' : '' }}">
                                {!! Form::label('location', trans('forms.create_asset_label_location'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('location', $asset->location, array('id' => 'location', 'class' => 'form-control', 'placeholder' => trans('forms.create_asset_ph_location'))) !!}
                                        <div class="input-group-append">
                                            <label for="location" class="input-group-text">
                                                <i class="fa fa-fw {{ trans('forms.create_asset_icon_location') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('location'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('location') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group has-feedback {{ $errors->has('description') ? ' has-error ' : '' }}">
                                {!! Form::label('description', trans('forms.create_asset_label_description') , array('class' => 'col-12 control-label')); !!}
                                <div class="col-12">
                                    {!! Form::textarea('description', $asset->description, array('id' => 'description', 'class' => 'form-control', 'placeholder' => trans('forms.create_asset_ph_description'))) !!}
                                    <span class="glyphicon glyphicon-pencil form-control-feedback" aria-hidden="true"></span>
                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    {!! Form::button(trans('forms.save-changes'), array('class' => 'btn btn-success btn-block margin-bottom-1 mt-3 mb-2 btn-save','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmSave', 'data-title' => trans('modals.edit_asset__modal_text_confirm_title'), 'data-message' => trans('modals.edit_asset__modal_text_confirm_message'))) !!}
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
