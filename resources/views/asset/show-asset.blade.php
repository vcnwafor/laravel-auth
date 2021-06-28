@extends('layouts.app')

@section('template_title')
  {!! trans('assetsmanagement.showing-asset', ['name' => $asset->name]) !!}
@endsection

@section('content')

  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-12">

        <div class="card">

          <div class="card-header text-white bg-primary">
            <div style="display: flex; justify-content: space-between; align-items: center;">
              {!! trans('assetsmanagement.showing-asset-title', ['name' => $asset->name]) !!}
              <div class="float-right">
                <a href="{{ route('asset.index') }}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="{{ trans('assetsmanagement.tooltips.back-assets') }}">
                  <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                  {!! trans('assetsmanagement.buttons.back-to-assets') !!}
                </a>
              </div>
            </div>
          </div>

          <div class="card-body">

            <div class="row">
              <div class="col-sm-4 col-md-6">
                <h4 class="text-muted margin-top-sm-1 text-center text-left-tablet">
                  {{ $asset->name }}
                </h4>
                <p class="text-center text-left-tablet">
                  <strong>
                    {{ $asset->description }}
                  </strong>
                </p>

                  {{-- <div class="text-center text-left-tablet mb-4">
                    <a href="{{ url('/profile/'.$asset->name) }}" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="left" title="{{ trans('assetsmanagement.viewProfile') }}">
                      <i class="fa fa-eye fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md"> {{ trans('assetsmanagement.viewProfile') }}</span>
                    </a>
                    <a href="/users/{{$asset->id}}/edit" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="{{ trans('assetsmanagement.editUser') }}">
                      <i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md"> {{ trans('assetsmanagement.editUser') }} </span>
                    </a>
                    {!! Form::open(array('url' => 'asset/' . $asset->id, 'class' => 'form-inline', 'data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => trans('assetsmanagement.deleteService'))) !!}
                      {!! Form::hidden('_method', 'DELETE') !!}
                      {!! Form::button('<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md">' . trans('assetsmanagement.deleteService') . '</span>' , array('class' => 'btn btn-danger btn-sm','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete Service', 'data-message' => 'Are you sure you want to delete this asset?')) !!}
                    {!! Form::close() !!}
                  </div> --}}
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="row">
                <div class="col-12">
                    @if ($asset->name)

                      <div class="col-sm-5 col-6 text-larger">
                        <strong>
                          {{ trans('assetsmanagement.labelName') }}
                        </strong>
                      </div>

                      <div class="col-sm-7">
                        {{ $asset->name }}
                      </div>

                      <div class="clearfix"></div>
                      <div class="border-bottom"></div>

                    @endif

                    @if ($asset->image)

                    <div class="col-sm-5 col-6 text-larger">
                      <strong>
                        {{ trans('assetsmanagement.labelImage') }}
                      </strong>
                    </div>

                    <div class="col-sm-7">
                      <img src="{{ asset('/uploads/assets/images/'.$asset->image) }}" style="width:200px;" />
                    </div>

                    <div class="clearfix"></div>
                    <div class="border-bottom"></div>

                  @endif

                  @if ($asset->location)

                  <div class="col-sm-5 col-6 text-larger">
                    <strong>
                      {{ trans('assetsmanagement.labelLocation') }}
                    </strong>
                  </div>

                  <div class="col-sm-7">
                    {{ $asset->location }}
                  </div>

                  <div class="clearfix"></div>
                  <div class="border-bottom"></div>

                @endif

                    @if ($asset->description)

                      <div class="col-sm-5 col-6 text-larger">
                        <strong>
                          {{ trans('assetsmanagement.labelDescription') }}
                        </strong>
                      </div>

                      <div class="col-sm-7">
                        {{ $asset->description }}
                      </div>

                      <div class="clearfix"></div>
                      <div class="border-bottom"></div>

                    @endif
                    @if ($asset->created_at)

                    <div class="col-sm-5 col-6 text-larger">
                      <strong>
                        {{ trans('assetsmanagement.labelCreatedAt') }}
                      </strong>
                    </div>

                    <div class="col-sm-7">
                      {{ $asset->created_at }}
                    </div>

                    <div class="clearfix"></div>
                    <div class="border-bottom"></div>

                  @endif

                  @if ($asset->updated_at)

                    <div class="col-sm-6 col-8 text-larger">
                      <strong>
                        {{ trans('assetsmanagement.labelUpdatedAt') }}
                      </strong>
                    </div>

                    <div class="col-sm-6">
                      {{ $asset->updated_at }}
                    </div>

                    <div class="clearfix"></div>
                    <div class="border-bottom"></div>

                  @endif
                </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  @include('modals.modal-delete')
  @include('modals.modal-download')

@endsection

@section('footer_scripts')
  @include('scripts.delete-modal-script')
  @include('scripts.download-modal-script')
  @if(config('assetsmanagement.tooltipsEnabled'))
    @include('scripts.tooltips')
  @endif
@endsection
