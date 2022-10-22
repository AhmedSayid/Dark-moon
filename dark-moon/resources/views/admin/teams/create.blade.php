@extends('admin.layout')

@section('content')
<?php

use \App\Constants\UserTypes;
?>
<div class="app-content">
    <section class="section">

        <!--page-header open-->
        <div class="page-header">
            <h4 class="page-title">{{trans('translations.teams')}}</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.home.index') }}" class="text-light-color">{{trans('translations.home')}}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.teams.index') }}" class="text-light-color">{{trans('translations.teams')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{trans('translations.new')}}</li>
            </ol>
        </div>
        <!--page-header closed-->

        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{trans('translations.new_team')}}</h4>
                        </div>
                        <div class="card-body">
                            @include('admin.errors')
                            <form action="{{ route('admin.teams.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    {{-- <div class="form-group col-md-4  d-flex justify-content-center align-items-center">
                                        <div class="">
                                            <label class="custom-switch">
                                                <input type="file" style="display:none;" style="border-radius: 100%;width:90%" onchange="readURL(this,'upload_img');" name="image" class="image">
                                                <img id="upload_img" class="ml-3" style="border-radius: 100%;width:90%" src="{{ url('assets/img/add_img.jpg')}}">
                                            </label>
                                        </div>
                                    </div> --}}
                                    <div class="form-group col-md-12 d-flex justify-content-center align-items-center flex-column">
                                        <label for="name" class="w-100 text-start pl-3">{{trans('translations.name')}}</label>
                                        <input type="text" required class="form-control" name="name_team" id="name" value="{{ old('name_team') }}">
                                    </div>
                                    {{-- <div class="form-group col-md-12">
                                        <label for="desc">{{trans('translations.desc')}}</label>
                                        <input type="text" required class="form-control" name="desc" id="desc" value="{{ old('desc') }}">
                                    </div> --}}
                                </div>
                                {{-- <div class="row">
                                    <div class="col-md-12">
                                    <!-- <input id="pac-input" style="width:250px;height:25px;margin-top:20px;" class="controls" type="text" placeholder="{{trans('translations.search')}}"> -->
                                    <div class="col-md-12" id="map" style="height: 400px; width: 100%"></div>
                                </div> --}}
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <button type="submit" href="#" class="btn  btn-outline-primary m-b-25  m-t-5">
                                            <i class="fa fa-save"></i> {{trans('translations.save')}}
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

