@extends('layouts.app')

@section('template_title')
    {!! trans('proceduresmanagement.showing-all-procedures') !!}
@endsection

@section('template_linked_css')
    @if(config('proceduresmanagement.enabledDatatablesJs'))
        <link rel="stylesheet" type="text/css" href="{{ config('proceduresmanagement.datatablesCssCDN') }}">
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
                                {!! trans('proceduresmanagement.showing-all-procedures') !!}
                            </span>

                            <div class="btn-group pull-right btn-group-xs">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v fa-fw" aria-hidden="true"></i>
                                    <span class="sr-only">
                                        {!! trans('proceduresmanagement.procedures-menu-alt') !!}
                                    </span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="/procedure/create">
                                        <i class="fa fa-fw fa-service-plus" aria-hidden="true"></i>
                                        {!! trans('proceduresmanagement.buttons.create-new') !!}
                                    </a>
                                    <a class="dropdown-item" href="/procedures/deleted">
                                        <i class="fa fa-fw fa-group" aria-hidden="true"></i>
                                        {!! trans('proceduresmanagement.show-deleted-procedures') !!}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        @if(config('proceduresmanagement.enableSearchProcedures'))
                            @include('partials.search-procedures-form')
                        @endif

                        <div class="table-responsive users-table">
                            <table class="table table-striped table-sm data-table">
                                <caption id="user_count">
                                    {{ trans_choice('proceduresmanagement.procedures-table.caption', 1, ['procedurescount' => $procedures->count()]) }}
                                </caption>
                                <thead class="thead">
                                    <tr>
                                        <th>{!! trans('proceduresmanagement.procedures-table.id') !!}</th>
                                        <th>{!! trans('proceduresmanagement.procedures-table.name') !!}</th>
                                        <th class="hidden-xs">{!! trans('proceduresmanagement.procedures-table.description') !!}</th>
                                        <th class="hidden-sm hidden-xs hidden-md">{!! trans('proceduresmanagement.procedures-table.created') !!}</th>
                                        <th class="hidden-sm hidden-xs hidden-md">{!! trans('proceduresmanagement.procedures-table.updated') !!}</th>
                                        <th>{!! trans('proceduresmanagement.procedures-table.actions') !!}</th>
                                        <th class="no-search no-sort"></th>
                                        <th class="no-search no-sort"></th>
                                    </tr>
                                </thead>
                                <tbody id="users_table">
                                    @foreach($procedures as $procedure)
                                        <tr>
                                            <td>{{$procedure->id}}</td>
                                            <td>{{$procedure->name}}</td>
                                            <td class="hidden-xs">{{$procedure->description}}</td>
                                            <td class="hidden-sm hidden-xs hidden-md">{{$procedure->created_at}}</td>
                                            <td class="hidden-sm hidden-xs hidden-md">{{$procedure->updated_at}}</td>
                                            <td>
                                                {!! Form::open(array('url' => 'procedure/' . $procedure->id, 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Delete')) !!}
                                                    {!! Form::hidden('_method', 'DELETE') !!}
                                                    {!! Form::button(trans('proceduresmanagement.buttons.delete'), array('class' => 'btn btn-danger btn-sm','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete Procedures', 'data-message' => 'Are you sure you want to delete this Procedure ?')) !!}
                                                {!! Form::close() !!}
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-success btn-block" href="{{ URL::to('procedure/' . $procedure->id) }}" data-toggle="tooltip" title="Show">
                                                    {!! trans('proceduresmanagement.buttons.show') !!}
                                                </a>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-info btn-block" href="{{ URL::to('procedure/' . $procedure->id . '/edit') }}" data-toggle="tooltip" title="Edit">
                                                    {!! trans('proceduresmanagement.buttons.edit') !!}
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tbody id="search_results"></tbody>
                                @if(config('proceduresmanagement.enableSearchProcedures'))
                                    <tbody id="search_results"></tbody>
                                @endif

                            </table>

                            @if(config('proceduresmanagement.enablePagination'))
                                {{ $procedures->links() }}
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
    @if ((count($procedures) > config('proceduresmanagement.datatablesJsStartCount')) && config('proceduresmanagement.enabledDatatablesJs'))
        @include('scripts.datatables')
    @endif
    @include('scripts.delete-modal-script')
    @include('scripts.save-modal-script')
    @if(config('proceduresmanagement.tooltipsEnabled'))
        @include('scripts.tooltips')
    @endif
    @if(config('proceduresmanagement.enableSearchProcedures'))
        @include('scripts.search-procedures')
    @endif
@endsection
