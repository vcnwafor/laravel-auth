@extends('layouts.app')

@section('template_title')
    {!! trans('assetsmanagement.showing-all-assets') !!}
@endsection

@section('template_linked_css')
    @if(config('assetsmanagement.enabledDatatablesJs'))
        <link rel="stylesheet" type="text/css" href="{{ config('assetsmanagement.datatablesCssCDN') }}">
    @endif
    <style type="text/css" media="screen">
        .users-table {
            border: 0;
        }
        .users-table tr td:first-child {
            padding-left: 15px;
        }
        .users-table tr td:last-child {
            padding-right: 15px;
        }
        .users-table.table-responsive,
        .users-table.table-responsive table {
            margin-bottom: 0;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">

                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {!! trans('assetsmanagement.showing-all-assets') !!}
                            </span>

                            <div class="btn-group pull-right btn-group-xs">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v fa-fw" aria-hidden="true"></i>
                                    <span class="sr-only">
                                        {!! trans('assetsmanagement.assets-menu-alt') !!}
                                    </span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="/asset/create">
                                        <i class="fa fa-fw fa-service-plus" aria-hidden="true"></i>
                                        {!! trans('assetsmanagement.buttons.create-new') !!}
                                    </a>
                                    <a class="dropdown-item" href="/assets/deleted">
                                        <i class="fa fa-fw fa-group" aria-hidden="true"></i>
                                        {!! trans('assetsmanagement.show-deleted-assets') !!}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        @if(config('assetsmanagement.enableSearchProcedures'))
                            @include('partials.search-assets-form')
                        @endif

                        <div class="table-responsive users-table">
                            <table class="table table-striped table-sm data-table">
                                <caption id="user_count">
                                    {{ trans_choice('assetsmanagement.assets-table.caption', 1, ['assetscount' => $assets->count()]) }}
                                </caption>
                                <thead class="thead">
                                    <tr>
                                        <th>{!! trans('assetsmanagement.assets-table.id') !!}</th>
                                        <th>{!! trans('assetsmanagement.assets-table.name') !!}</th>
                                        <th class="hidden-xs">{!! trans('assetsmanagement.assets-table.description') !!}</th>
                                        <th class="hidden-xs">{!! trans('assetsmanagement.assets-table.location') !!}</th>
                                        <th class="hidden-sm hidden-xs hidden-md">{!! trans('assetsmanagement.assets-table.created') !!}</th>
                                        <th class="hidden-sm hidden-xs hidden-md">{!! trans('assetsmanagement.assets-table.updated') !!}</th>
                                        <th>{!! trans('assetsmanagement.assets-table.actions') !!}</th>
                                        <th class="no-search no-sort"></th>
                                        <th class="no-search no-sort"></th>
                                    </tr>
                                </thead>
                                <tbody id="users_table">
                                    @foreach($assets as $asset)
                                        <tr>
                                            <td>{{$asset->id}}</td>
                                            <td>{{$asset->name}}</td>
                                            <td class="hidden-xs">{{$asset->description}}</td>
                                            <td class="hidden-xs">{{$asset->location}}</td>
                                            <td class="hidden-sm hidden-xs hidden-md">{{$asset->created_at}}</td>
                                            <td class="hidden-sm hidden-xs hidden-md">{{$asset->updated_at}}</td>
                                            @permission('delete.assets')
                                            <td>
                                                {!! Form::open(array('url' => 'asset/' . $asset->id, 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Delete')) !!}
                                                    {!! Form::hidden('_method', 'DELETE') !!}
                                                    {!! Form::button(trans('assetsmanagement.buttons.delete'), array('class' => 'btn btn-danger btn-sm','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete Procedures', 'data-message' => 'Are you sure you want to delete this Procedure ?')) !!}
                                                {!! Form::close() !!}
                                            </td>
                                            @endpermission
                                            <td>
                                                <a class="btn btn-sm btn-success btn-block" href="{{ URL::to('asset/' . $asset->id) }}" data-toggle="tooltip" title="Show">
                                                    {!! trans('assetsmanagement.buttons.show') !!}
                                                </a>
                                            </td>
                                            @permission('edit.assets')
                                            <td>
                                                <a class="btn btn-sm btn-info btn-block" href="{{ URL::to('asset/' . $asset->id . '/edit') }}" data-toggle="tooltip" title="Edit">
                                                    {!! trans('assetsmanagement.buttons.edit') !!}
                                                </a>
                                            </td>
                                            @endpermission
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tbody id="search_results"></tbody>
                                @if(config('assetsmanagement.enableSearchProcedures'))
                                    <tbody id="search_results"></tbody>
                                @endif

                            </table>

                            @if(config('assetsmanagement.enablePagination'))
                                {{ $assets->links() }}
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('modals.modal-delete')

@endsection

@section('footer_scripts')
    @if ((count($assets) > config('assetsmanagement.datatablesJsStartCount')) && config('assetsmanagement.enabledDatatablesJs'))
        @include('scripts.datatables')
    @endif
    @include('scripts.delete-modal-script')
    @include('scripts.save-modal-script')
    @if(config('assetsmanagement.tooltipsEnabled'))
        @include('scripts.tooltips')
    @endif
    @if(config('assetsmanagement.enableSearchProcedures'))
        @include('scripts.search-assets')
    @endif
@endsection
