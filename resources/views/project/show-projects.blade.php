@extends('layouts.app')

@section('template_title')
    {!! trans('projectsmanagement.showing-all-projects') !!}
@endsection

@section('template_linked_css')
    @if(config('projectsmanagement.enabledDatatablesJs'))
        <link rel="stylesheet" type="text/css" href="{{ config('projectsmanagement.datatablesCssCDN') }}">
    @endif
    <style type="text/css" media="screen">
        .projects-table {
            border: 0;
        }
        .projects-table tr td:first-child {
            padding-left: 15px;
        }
        .projects-table tr td:last-child {
            padding-right: 15px;
        }
        .projects-table.table-responsive,
        .projects-table.table-responsive table {
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
                                {!! trans('projectsmanagement.showing-all-projects') !!}
                            </span>

                            <div class="btn-group pull-right btn-group-xs">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v fa-fw" aria-hidden="true"></i>
                                    <span class="sr-only">
                                        {!! trans('projectsmanagement.projects-menu-alt') !!}
                                    </span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="/project/create">
                                        <i class="fa fa-fw fa-service-plus" aria-hidden="true"></i>
                                        {!! trans('projectsmanagement.buttons.create-new') !!}
                                    </a>
                                    <a class="dropdown-item" href="/projects/deleted">
                                        <i class="fa fa-fw fa-group" aria-hidden="true"></i>
                                        {!! trans('projectsmanagement.show-deleted-projects') !!}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        @if(config('projectsmanagement.enableSearchProcedures'))
                            @include('partials.search-projects-form')
                        @endif

                        <div class="table-responsive projects-table">
                            <table class="table table-striped table-sm data-table">
                                <caption id="user_count">
                                    {{ trans_choice('projectsmanagement.projects-table.caption', 1, ['projectscount' => $projects->count()]) }}
                                </caption>
                                <thead class="thead">
                                    <tr>
                                        <th>{!! trans('projectsmanagement.projects-table.id') !!}</th>
                                        <th>{!! trans('projectsmanagement.projects-table.name') !!}</th>
                                        <th>{!! trans('projectsmanagement.projects-table.description') !!}</th>
                                        <th class="hidden-xs">{!! trans('projectsmanagement.projects-table.client') !!}</th>
                                        <th class="hidden-xs">{!! trans('projectsmanagement.projects-table.startdate') !!}</th>
                                        <th class="hidden-xs">{!! trans('projectsmanagement.projects-table.completiondate') !!}</th>
                                        <th class="hidden-xs">{!! trans('projectsmanagement.projects-table.amount') !!}</th>
                                        <th class="hidden-xs">{!! trans('projectsmanagement.projects-table.status') !!}</th>
                                        <th class="hidden-sm hidden-xs hidden-md">{!! trans('projectsmanagement.projects-table.created') !!}</th>
                                        <th class="hidden-sm hidden-xs hidden-md">{!! trans('projectsmanagement.projects-table.updated') !!}</th>
                                        <th>{!! trans('projectsmanagement.projects-table.actions') !!}</th>
                                        <th class="no-search no-sort"></th>
                                        @permission('edit.projects')

                                        <th class="no-search no-sort"></th>
                                        @endpermission
                                    </tr>
                                </thead>
                                <tbody id="projects_table">
                                    @foreach($projects as $project)
                                        <tr>
                                            <td>{{$project->id}}</td>
                                            <td>{{$project->name}}</td>
                                            <td>{{$project->description}}</td>
                                            <td>{{ $project->client->businessname != null ? $project->client->businessname : $project->client->firstname." ".$project->client->middlename." ".$project->client->lastname}}</td>
                                            <td class="hidden-xs">{{$project->startdate->toDateString() }}</td>
                                            <td class="hidden-xs">{{$project->completiondate->toDateString() }}</td>
                                            <td class="hidden-xs">{{$project->approvedamount}}</td>
                                            <td class="hidden-xs">{{$project->status}}</td>
                                            <td class="hidden-sm hidden-xs hidden-md">{{$project->created_at->toDateString() }}</td>
                                            <td class="hidden-sm hidden-xs hidden-md">{{$project->updated_at->toDateString() }}</td>
                                            @permission('delete.projects')
                                            <td>
                                                {!! Form::open(array('url' => 'project/' . $project->id, 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Delete')) !!}
                                                    {!! Form::hidden('_method', 'DELETE') !!}
                                                    {!! Form::button(trans('projectsmanagement.buttons.delete'), array('class' => 'btn btn-danger btn-sm','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete Projects', 'data-message' => 'Are you sure you want to delete this Project ?')) !!}
                                                {!! Form::close() !!}
                                            </td>
                                            @endpermission
                                            <td>
                                                <a class="btn btn-sm btn-success btn-block" href="{{ URL::to('project/' . $project->id) }}" data-toggle="tooltip" title="Show">
                                                    {!! trans('projectsmanagement.buttons.show') !!}
                                                </a>
                                            </td>
                                            @permission('edit.projects')
                                            <td>
                                                <a class="btn btn-sm btn-info btn-block" href="{{ URL::to('project/' . $project->id . '/edit') }}" data-toggle="tooltip" title="Edit">
                                                    {!! trans('projectsmanagement.buttons.edit') !!}
                                                </a>
                                            </td>
                                            @endpermission
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tbody id="search_results"></tbody>
                                @if(config('projectsmanagement.enableSearchProcedures'))
                                    <tbody id="search_results"></tbody>
                                @endif

                            </table>

                            @if(config('projectsmanagement.enablePagination'))
                                {{ $projects->links() }}
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
    @if ((count($projects) > config('projectsmanagement.datatablesJsStartCount')) && config('projectsmanagement.enabledDatatablesJs'))
        @include('scripts.datatables')
    @endif
    @include('scripts.delete-modal-script')
    @include('scripts.save-modal-script')
    @if(config('projectsmanagement.tooltipsEnabled'))
        @include('scripts.tooltips')
    @endif
    @if(config('projectsmanagement.enableSearchProcedures'))
        @include('scripts.search-projects')
    @endif
@endsection
