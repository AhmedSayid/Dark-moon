@extends('admin.layout')

@section('content')
    <?php

    use App\Constants\UserTypes;
    ?>
    <div class="app-content">
        <section class="section">
            <!--page-header open-->
            <div class="page-header">
                <h4 class="page-title">{{ trans('translations.services') }}</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.home.index') }}"
                            class="text-light-color">{{ trans('translations.home') }}
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.services.index') }}"
                            class="text-light-color">{{ trans('translations.branches') }}
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{ trans('translations.new') }}
                    </li>
                </ol>
            </div>
            <!--page-header closed-->
            <div class="section-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ trans('translations.blogs') }}</h4>
                            </div>
                            <div class="card-body">
                                @include('admin.errors')
                                <form action="{{ route('admin.blogs.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="name">{{ trans('translations.name') }}</label>
                                            <input type="text" placeholder="{{ trans('translations.name') }}" required class="form-control" name="title" id="name"
                                                value="{{ old('name',$Blog->title) }}">
                                        </div>
                                        {{-- <div class="form-group col-md-6">
                                            <select name="parent_id" class="form-control select2 w-100" id="parent_id" >
                                                <option value="" >{{ trans('translations.select_parent') }}</option>
                                                @foreach($parents as $key => $value )
                                                    <option value="{{ $value }}" {{ request("parent_id") == $value ? "selected":null }}>{{ $key }}</option>
                                                @endforeach
                                            </select>
                                        </div> --}}


                                        {{-- <div class=" form-group col-md-6 d-flex align-items-center justify-content-center">
                                            <label class="custom-switch"> {{ trans('translations.video') }}
                                                <input type="file" style="display:none;" onchange="readURL(this,'upload_img3');" accept="video/*" name="video" class="video">
                                                <video id="upload_img3" class="ml-3"  controls src="{{ url('assets/img/add_img.jpg')}}"></video>
                                            </label>
                                        </div> --}}


                                        <div class="form-group col-md-6 d-flex justify-content-between flex-column">

                                            <div class="w-100">
                                                <label  for="detail">{{ trans('translations.details') }}</label>
                                                <input required style="height:40px" type="text" value="{{ old('detail',$Blog->detail) }}"
                                                    class="form-control" name="detail" id="detail"
                                                    placeholder="{{ trans('translations.detail') }}">
                                            </div>

                                        </div>





                                        {{--  <div class="col-md-6 mb-4 d-flex justify-content-center align-items-center">
                                            <label class="custom-switch"> {{ trans('translations.cover_image') }}
                                                <input type="file" style="display:none;" onchange="readURL(this,'upload_img');" name="cover_image" class="image">
                                                <img id="upload_img" class="ml-3" src="{{ url('assets/img/add_img.jpg')}}">
                                            </label>
                                        </div>  --}}


                                        <div class="col-md-6 mb-4 d-flex justify-content-center align-items-center">
                                            <label class="custom-switch"> {{ trans('translations.image') }}
                                                <input type="file" style="display:none;" onchange="readURL(this,'upload_img2');" name="image" class="image">
                                                <img id="upload_img2" class="ml-3" src="{{ url($Blog->image) }}">
                                            </label>
                                        </div>


                                    </div>




                                    <div class="row">

                                        <div class="form-group col-md-12 d-flex justify-content-center">


                                            <div class="">
                                                <button type="submit" href="#" class="btn  btn-outline-primary m-b-5  m-t-5">
                                                    <i class="fa fa-save"></i> {{trans('translations.save')}}
                                                </button>
                                            </div>
                                            <div class=" d-flex align-items-center ml-4">
                                                <label class="custom-switch">
                                                    <input type="checkbox" name="active" value="1" checked
                                                        class="custom-switch-input">
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
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
