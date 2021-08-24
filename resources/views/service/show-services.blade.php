@extends('layouts.app')

@section('template_title')
    {!! trans('servicesmanagement.showing-all-services') !!}
@endsection

@section('template_linked_css')
    @if(config('servicesmanagement.enabledDatatablesJs'))
        <link rel="stylesheet" type="text/css" href="{{ config('servicesmanagement.datatablesCssCDN') }}">
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
                                {!! trans('servicesmanagement.showing-all-services') !!}
                            </span>

                            <div class="btn-group pull-right btn-group-xs">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v fa-fw" aria-hidden="true"></i>
                                    <span class="sr-only">
                                        {!! trans('servicesmanagement.services-menu-alt') !!}
                                    </span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    @permission('create.services')
                                    <a class="dropdown-item" href="/service/create">
                                        <i class="fa fa-fw fa-service-plus" aria-hidden="true"></i>
                                        {!! trans('servicesmanagement.buttons.create-new') !!}
                                    </a>
                                    @endpermission
                                    <a class="dropdown-item" href="/services/deleted">
                                        <i class="fa fa-fw fa-group" aria-hidden="true"></i>
                                        {!! trans('servicesmanagement.show-deleted-services') !!}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        @if(config('servicesmanagement.enableSearchUsers'))
                            @include('partials.search-services-form')
                        @endif

                        <div class="table-responsive users-table">
                            <table class="table table-striped table-sm data-table">
                                <caption id="user_count">
                                    {{ trans_choice('servicesmanagement.services-table.caption', 1, ['servicescount' => $services->count()]) }}
                                </caption>
                                <thead class="thead">
                                    <tr>
                                        <th>{!! trans('servicesmanagement.services-table.name') !!}</th>
                                        <th>Parent</th>
                                        <th class="hidden-xs">{!! trans('servicesmanagement.services-table.description') !!}</th>
                                        <th class="hidden-xs">Procedures</th>
                                        <th class="hidden-xs">Sheets</th>
                                        <th class="hidden-sm hidden-xs hidden-md">{!! trans('servicesmanagement.services-table.created') !!}</th>
                                        <th class="hidden-sm hidden-xs hidden-md">{!! trans('servicesmanagement.services-table.updated') !!}</th>
                                        <th>{!! trans('servicesmanagement.services-table.actions') !!}</th>
                                        <th class="no-search no-sort"></th>
                                        <th class="no-search no-sort"></th>
                                    </tr>
                                </thead>
                                <tbody id="users_table">
                                    @foreach($services as $service)
                                        <tr>
                                            <td>{{$service->name}}</td>
                                            <td>{{$service->parent != null ? $service->parent->name : ""}}</td>
                                            <td class="hidden-xs">{{$service->description}}</td>
                                            <td class="hidden-xs">{{$service->procedures->count()}}</td>
                                            <td class="hidden-xs">{{$service->sheets->count()}}</td>
                                            <td class="hidden-sm hidden-xs hidden-md">{{$service->created_at->toDateString() }}</td>
                                            <td class="hidden-sm hidden-xs hidden-md">{{$service->updated_at->toDateString() }}</td>
                                            @permission('delete.services')

                                            <td>
                                                {!! Form::open(array('url' => 'service/' . $service->id, 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Delete')) !!}
                                                    {!! Form::hidden('_method', 'DELETE') !!}
                                                    {!! Form::button($service->parent == null ? trans('servicesmanagement.buttons.delete') : trans('servicesmanagement.buttons.delete-subservice'), array('class' => 'btn btn-danger btn-sm','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => $service->parent != null ? 'Delete Sub-Service' : 'Service', 'data-message' => $service->parent != null ? 'Are you sure you want to delete this Sub-Service':'Are you sure you want to delete this service ?')) !!}
                                                {!! Form::close() !!}
                                            </td>
                                            @endpermission
                                            <td>
                                                <a class="btn btn-sm btn-success btn-block" href="{{ URL::to('service/' . $service->id) }}" data-toggle="tooltip" title="Show">
                                                    {!! trans('servicesmanagement.buttons.show') !!}
                                                </a>
                                            </td>
                                            @permission('edit.services')

                                            <td>
                                                <a class="btn btn-sm btn-info btn-block" href="{{ URL::to('service/' . $service->id . '/edit') }}" data-toggle="tooltip" title="Edit">
                                                    {!! trans('servicesmanagement.buttons.edit') !!}
                                                </a>
                                            </td>
                                            @endpermission
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tbody id="search_results"></tbody>
                                @if(config('servicesmanagement.enableSearchUsers'))
                                    <tbody id="search_results"></tbody>
                                @endif

                            </table>

                            @if(config('servicesmanagement.enablePagination'))
                                {{ $services->links() }}
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
    @if ((count($services) > config('servicesmanagement.datatablesJsStartCount')) && config('servicesmanagement.enabledDatatablesJs'))
        @include('scripts.datatables')
    @endif
    @include('scripts.delete-modal-script')
    @include('scripts.save-modal-script')
    @if(config('servicesmanagement.tooltipsEnabled'))
        @include('scripts.tooltips')
    @endif
    @if(config('servicesmanagement.enableSearchUsers'))
        @include('scripts.search-users')
    @endif
@endsection
