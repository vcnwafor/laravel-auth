@extends('layouts.app')

@section('template_title')
    {!! trans('personnelsmanagement.showing-all-personnels') !!}
@endsection

@section('template_linked_css')
    @if(config('personnelsmanagement.enabledDatatablesJs'))
        <link rel="stylesheet" type="text/css" href="{{ config('personnelsmanagement.datatablesCssCDN') }}">
    @endif
    <style type="text/css" media="screen">
        .personnels-table {
            border: 0;
        }
        .personnels-table tr td:first-child {
            padding-left: 15px;
        }
        .personnels-table tr td:last-child {
            padding-right: 15px;
        }
        .personnels-table.table-responsive,
        .personnels-table.table-responsive table {
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
                                {!! trans('personnelsmanagement.showing-all-personnels') !!}
                            </span>

                            <div class="btn-group pull-right btn-group-xs">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v fa-fw" aria-hidden="true"></i>
                                    <span class="sr-only">
                                        {!! trans('personnelsmanagement.personnels-menu-alt') !!}
                                    </span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    @permission('create.personnels')

                                    <a class="dropdown-item" href="/personnel/create">
                                        <i class="fa fa-fw fa-service-plus" aria-hidden="true"></i>
                                        {!! trans('personnelsmanagement.buttons.create-new') !!}
                                    </a>
                                    @endpermission
                                    <a class="dropdown-item" href="/personnels/deleted">
                                        <i class="fa fa-fw fa-group" aria-hidden="true"></i>
                                        {!! trans('personnelsmanagement.show-deleted-personnels') !!}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        @if(config('personnelsmanagement.enableSearchProcedures'))
                            @include('partials.search-personnels-form')
                        @endif

                        <div class="table-responsive personnels-table">
                            <table class="table table-striped table-sm data-table">
                                <caption id="user_count">
                                    {{ trans_choice('personnelsmanagement.personnels-table.caption', 1, ['personnelscount' => $personnels->count()]) }}
                                </caption>
                                <thead class="thead">
                                    <tr>
                                        <th>{!! trans('personnelsmanagement.personnels-table.id') !!}</th>
                                        <th>{!! trans('personnelsmanagement.personnels-table.employeeno') !!}</th>
                                        <th>{!! trans('personnelsmanagement.personnels-table.name') !!}</th>
                                        <th class="hidden-xs">{!! trans('personnelsmanagement.personnels-table.phone') !!}</th>
                                        <th class="hidden-xs">{!! trans('personnelsmanagement.personnels-table.email') !!}</th>
                                        <th class="hidden-xs">{!! trans('personnelsmanagement.personnels-table.sex') !!}</th>
                                        <th class="hidden-xs">{!! trans('personnelsmanagement.personnels-table.address') !!}</th>
                                        <th class="hidden-xs">{!! trans('personnelsmanagement.personnels-table.designation') !!}</th>
                                        <th class="hidden-sm hidden-xs hidden-md">{!! trans('personnelsmanagement.personnels-table.created') !!}</th>
                                        <th class="hidden-sm hidden-xs hidden-md">{!! trans('personnelsmanagement.personnels-table.updated') !!}</th>
                                        <th>{!! trans('personnelsmanagement.personnels-table.actions') !!}</th>
                                        <th class="no-search no-sort"></th>
                                        @permission('edit.personnels')

                                        <th class="no-search no-sort"></th>
                                        @endpermission
                                    </tr>
                                </thead>
                                <tbody id="personnels_table">
                                    @foreach($personnels as $personnel)
                                        <tr>
                                            <td>{{$personnel->id}}</td>
                                            <td>{{$personnel->employeeno}}</td>
                                            <td>{{$personnel->firstname." ".$personnel->middlename." ".$personnel->lastname}}</td>
                                            <td class="hidden-xs">{{$personnel->phone}}</td>
                                            <td class="hidden-xs">{{$personnel->email}}</td>
                                            <td class="hidden-xs">{{$personnel->sex}}</td>
                                            <td class="hidden-xs">{{$personnel->address}}</td>
                                            <td class="hidden-xs">{{$personnel->designation}}</td>
                                            <td class="hidden-sm hidden-xs hidden-md">{{$personnel->created_at}}</td>
                                            <td class="hidden-sm hidden-xs hidden-md">{{$personnel->updated_at}}</td>
                                            @permission('delete.personnels')
                                            <td>
                                                {!! Form::open(array('url' => 'personnel/' . $personnel->id, 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Delete')) !!}
                                                    {!! Form::hidden('_method', 'DELETE') !!}
                                                    {!! Form::button(trans('personnelsmanagement.buttons.delete'), array('class' => 'btn btn-danger btn-sm','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete Personnels', 'data-message' => 'Are you sure you want to delete this Personnel ?')) !!}
                                                {!! Form::close() !!}
                                            </td>
                                            @endpermission
                                            <td>
                                                <a class="btn btn-sm btn-success btn-block" href="{{ URL::to('personnel/' . $personnel->id) }}" data-toggle="tooltip" title="Show">
                                                    {!! trans('personnelsmanagement.buttons.show') !!}
                                                </a>
                                            </td>
                                            @permission('edit.personnels')
                                            <td>
                                                <a class="btn btn-sm btn-info btn-block" href="{{ URL::to('personnel/' . $personnel->id . '/edit') }}" data-toggle="tooltip" title="Edit">
                                                    {!! trans('personnelsmanagement.buttons.edit') !!}
                                                </a>
                                            </td>
                                            @endpermission
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tbody id="search_results"></tbody>
                                @if(config('personnelsmanagement.enableSearchProcedures'))
                                    <tbody id="search_results"></tbody>
                                @endif

                            </table>

                            @if(config('personnelsmanagement.enablePagination'))
                                {{ $personnels->links() }}
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
    @if ((count($personnels) > config('personnelsmanagement.datatablesJsStartCount')) && config('personnelsmanagement.enabledDatatablesJs'))
        @include('scripts.datatables')
    @endif
    @include('scripts.delete-modal-script')
    @include('scripts.save-modal-script')
    @if(config('personnelsmanagement.tooltipsEnabled'))
        @include('scripts.tooltips')
    @endif
    @if(config('personnelsmanagement.enableSearchProcedures'))
        @include('scripts.search-personnels')
    @endif
@endsection
