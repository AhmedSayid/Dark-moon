@extends('admin.layout')

@section('content')
    <div class="app-content">
        <section class="section">
            <!--page-header open-->
            <div class="page-header">
                <h4 class="page-title">{{ trans('translations.teams') }}</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home.index') }}"
                            class="text-light-color">{{ trans('translations.home') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.teams.index') }}"
                            class="text-light-color">{{ trans('translations.teams') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ trans('translations.edit') }}</li>
                </ol>
            </div>
            <!--page-header closed-->
            <div class="section-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ trans('translations.edit_lab') }}</h4>
                            </div>
                            <div class="card-body">
                                @include('admin.errors')
                                <form action="{{ route('admin.teams.update', $team->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class=" row">
                                        <div class="form-group col-md-4">
                                            <label for="name">{{ trans('translations.name') }}</label>
                                            <input type="text" required class="form-control" name="name" id="name"
                                                value="{{ old('name', $team->name) }}">
                                        </div>
                                    </div>
                                    <div class=" row">
                                        <div class="form-group col-md-6">
                                            <label for="address">{{ trans('translations.image') }}</label>
                                            <input required style="height:40px" type="text"
                                                value="{{ old('image', $team->address) }}" class="form-control"
                                                name="image" id="image" placeholder="{{ trans('translations.image') }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- <input id="pac-input" style="width:250px;height:25px;margin-top:20px;" class="controls" type="text" placeholder="{{ trans('translations.search') }}"> -->
                                            <div class=" col-md-12" id="map" style="height: 400px; width: 100%">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <button type="submit" href="#"
                                                    class="btn  btn-outline-primary m-b-5  m-t-5">
                                                    <i class="fa fa-save"></i> {{ trans('translations.save') }}
                                                </button>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop
