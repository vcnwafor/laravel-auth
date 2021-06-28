@extends('layouts.app')

@section('template_title')
    {!! trans('clientsmanagement.showing-all-clients') !!}
@endsection

@section('template_linked_css')
    @if(config('clientsmanagement.enabledDatatablesJs'))
        <link rel="stylesheet" type="text/css" href="{{ config('clientsmanagement.datatablesCssCDN') }}">
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
                                {!! trans('clientsmanagement.showing-all-clients') !!}
                            </span>

                            <div class="btn-group pull-right btn-group-xs">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v fa-fw" aria-hidden="true"></i>
                                    <span class="sr-only">
                                        {!! trans('clientsmanagement.clients-menu-alt') !!}
                                    </span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="/client/create">
                                        <i class="fa fa-fw fa-service-plus" aria-hidden="true"></i>
                                        {!! trans('clientsmanagement.buttons.create-new') !!}
                                    </a>
                                    <a class="dropdown-item" href="/clients/deleted">
                                        <i class="fa fa-fw fa-group" aria-hidden="true"></i>
                                        {!! trans('clientsmanagement.show-deleted-clients') !!}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        @if(config('clientsmanagement.enableSearchProcedures'))
                            @include('partials.search-clients-form')
                        @endif

                        <div class="table-responsive users-table">
                            <table class="table table-striped table-sm data-table">
                                <caption id="user_count">
                                    {{ trans_choice('clientsmanagement.clients-table.caption', 1, ['clientscount' => $clients->count()]) }}
                                </caption>
                                <thead class="thead">
                                    <tr>
                                        <th>{!! trans('clientsmanagement.clients-table.id') !!}</th>
                                        <th>{!! trans('clientsmanagement.clients-table.businessname') !!}</th>
                                        <th class="hidden-xs">{!! trans('clientsmanagement.clients-table.address') !!}</th>
                                        <th class="hidden-xs">{!! trans('clientsmanagement.clients-table.phone') !!}</th>
                                        <th class="hidden-xs">{!! trans('clientsmanagement.clients-table.email') !!}</th>
                                        <th class="hidden-xs">{!! trans('clientsmanagement.clients-table.rcno') !!}</th>
                                        <th class="hidden-sm hidden-xs hidden-md">{!! trans('clientsmanagement.clients-table.created') !!}</th>
                                        <th class="hidden-sm hidden-xs hidden-md">{!! trans('clientsmanagement.clients-table.updated') !!}</th>
                                        <th>{!! trans('clientsmanagement.clients-table.actions') !!}</th>
                                        <th class="no-search no-sort"></th>
                                        @permission('edit.clients')

                                        <th class="no-search no-sort"></th>
                                        @endpermission
                                    </tr>
                                </thead>
                                <tbody id="users_table">
                                    @foreach($clients as $client)
                                        <tr>
                                            <td>{{$client->id}}</td>
                                            <td>{{$client->businessname}}</td>
                                            <td class="hidden-xs">{{$client->address}}</td>
                                            <td class="hidden-xs">{{$client->phone}}</td>
                                            <td class="hidden-xs">{{$client->email}}</td>
                                            <td class="hidden-xs">{{$client->rcno}}</td>
                                            <td class="hidden-sm hidden-xs hidden-md">{{$client->created_at}}</td>
                                            <td class="hidden-sm hidden-xs hidden-md">{{$client->updated_at}}</td>
                                            @permission('delete.clients')
                                            <td>
                                                {!! Form::open(array('url' => 'client/' . $client->id, 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Delete')) !!}
                                                    {!! Form::hidden('_method', 'DELETE') !!}
                                                    {!! Form::button(trans('clientsmanagement.buttons.delete'), array('class' => 'btn btn-danger btn-sm','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete Procedures', 'data-message' => 'Are you sure you want to delete this Procedure ?')) !!}
                                                {!! Form::close() !!}
                                            </td>
                                            @endpermission
                                            <td>
                                                <a class="btn btn-sm btn-success btn-block" href="{{ URL::to('client/' . $client->id) }}" data-toggle="tooltip" title="Show">
                                                    {!! trans('clientsmanagement.buttons.show') !!}
                                                </a>
                                            </td>
                                            @permission('edit.clients')
                                            <td>
                                                <a class="btn btn-sm btn-info btn-block" href="{{ URL::to('client/' . $client->id . '/edit') }}" data-toggle="tooltip" title="Edit">
                                                    {!! trans('clientsmanagement.buttons.edit') !!}
                                                </a>
                                            </td>
                                            @endpermission
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tbody id="search_results"></tbody>
                                @if(config('clientsmanagement.enableSearchProcedures'))
                                    <tbody id="search_results"></tbody>
                                @endif

                            </table>

                            @if(config('clientsmanagement.enablePagination'))
                                {{ $clients->links() }}
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
    @if ((count($clients) > config('clientsmanagement.datatablesJsStartCount')) && config('clientsmanagement.enabledDatatablesJs'))
        @include('scripts.datatables')
    @endif
    @include('scripts.delete-modal-script')
    @include('scripts.save-modal-script')
    @if(config('clientsmanagement.tooltipsEnabled'))
        @include('scripts.tooltips')
    @endif
    @if(config('clientsmanagement.enableSearchProcedures'))
        @include('scripts.search-clients')
    @endif
@endsection
