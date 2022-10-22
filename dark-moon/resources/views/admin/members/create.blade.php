@extends('admin.layout')

@section('content')
    <?php

    use App\Constants\UserTypes;
    ?>
    <div class="app-content">
        <section class="section">

            <!--page-header open-->
            <div class="page-header">
                <h4 class="page-title">{{ trans('translations.members') }}</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home.index') }}"
                            class="text-light-color">{{ trans('translations.home') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.members.index') }}"
                            class="text-light-color">{{ trans('translations.members') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ trans('translations.new') }}</li>
                </ol>
            </div>
            <!--page-header closed-->

            <div class="section-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ trans('translations.new_members') }}</h4>
                            </div>
                            <div class="card-body">
                                @include('admin.errors')
                                <form action="{{ route('admin.members.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-4  d-flex justify-content-center align-items-center">
                                            <div class="">
                                                <label class="custom-switch">
                                                    <input type="file" style="display:none;" style="border-radius: 100%;width:90%" onchange="readURL(this,'upload_img');" name="image" class="image">
                                                    <img id="upload_img" class="ml-3" style="border-radius: 100%;width:90%" src="{{ url('assets/img/add_img.jpg')}}">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4 d-flex justify-content-center align-items-center flex-column">
                                            <label for="name" class="w-100 text-start pl-3">{{ trans('translations.name') }}</label>
                                            <input type="text" required class="form-control" name="name" id="name"
                                                value="{{ old('name') }}">
                                        </div>
                                        <div class="form-group col-md-4 d-flex justify-content-center align-items-center flex-column">
                                            <label for="team_id" class="w-100 text-start">{{ trans('translations.team_id') }}</label>
                                            <select class="form-control" name="team_id" id="team_id">
                                                @if(!$teams->isEmpty())
                                                    @foreach ($teams as $team)
                                                        <option value="{{ $team->id }}">{{ $team->name_team }}</option>
                                                    @endforeach
                                                @else
                                                    <option disabled>Not found any teams</option>
                                                @endif
                                            </select>
                                        </div>
                                        {{-- <div class="form-group col-md-4">
                                            <label for="gender">{{ trans('translations.gender') }}</label>
                                            <input type="radio" required class="form-control" name="gender" id="gender" value="{{ old('gender') }}">
                                        </div> --}}
                                        {{-- <div class="form-group col-md-6">
                                            <label class="custom-switch">
                                                <input type="checkbox" name="active" value="1" checked class="custom-switch-input">
                                                <span class="custom-switch-indicator"></span>
                                            </label>
                                        </div> --}}

                                        <div class="form-group col-md-8">
                                            <label for="email">{{ trans('translations.email') }}</label>
                                            <input type="text" class="form-control" name="email" id="email"
                                            value="{{ old('email') }}">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="position">{{ trans('translations.position') }}</label>
                                            <input type="text" required class="form-control" name="position" id="position"
                                                value="{{ old('position') }}">
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label for="description">{{ trans('translations.description') }}</label>
                                            <input type="text" required class="form-control" name="description" id="description"
                                                value="{{ old('description') }}">
                                        </div>
                                    </div>

                                    {{-- <div class=" row">
                                        <div class="form-group col-md-3">
                                            <label for="lat">{{ trans('translations.lat') }}</label>
                                            <input required style="height:40px" type="text" value="{{ old('lat') }}"
                                                class="form-control" name="lat" id="lat"
                                                placeholder="{{ trans('translations.latitude') }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="lng">{{ trans('translations.long') }}</label>
                                            <input required style="height:40px" type="text" value="{{ old('lng') }}"
                                                class="form-control" name="lng" id="lng"
                                                placeholder="{{ trans('translations.longitude') }}">
                                        </div>

                                    </div> --}}

                                    <div class="row">
                                        {{-- <div class="col-md-12">
                                            <input id="pac-input" style="width:250px;height:25px;margin-top:20px;" class="controls" type="text" placeholder="{{ trans('translations.search') }}">
                                            <div class=" col-md-12" id="map" style="height: 400px; width: 100%"></div>
                                        </div> --}}

                                        <div class="form-group d-flex justify-content-center align-items-center col-md-3">
                                            {{-- <button type="submit"
                                                class="btn btn-outline-primary m-b-5 m-t-5">
                                                <i class="fa fa-save"></i> {{ trans('translations.save') }}
                                            </button> --}}
                                            <div>
                                                <button type="submit" class="btn btn-outline-primary m-b-5 m-t-5">
                                                    <i class="fa fa-save"></i> {{trans('translations.save')}}
                                                </button>
                                            </div>
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
@section('scripts')

    {{-- @if (old('lat') && old('lng'))
        <script>
            localStorage.setItem('lat', '{{ old('lat') }}')
            localStorage.setItem('lng', '{{ old('lng') }}')
        </script>
    @else
        <script>
            localStorage.setItem('lat', '30.046275160232675')
            localStorage.setItem('lng', '31.244865309119177')
        </script>
    @endif --}}
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCmhwCq8qtR01rwoYk_wzvbkZW1i7LBCEE&libraries=places&callback=initAutocomplete"
        defer></script>
@stop
