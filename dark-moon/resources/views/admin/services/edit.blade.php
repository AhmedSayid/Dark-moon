@extends('admin.layout')

@section('content')
<div class="app-content">
    <section class="section">
        <!--page-header open-->
        <div class="page-header">
            <h4 class="page-title">{{trans('translations.branches')}}</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.home.index') }}" class="text-light-color">{{trans('translations.home')}}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.services.index') }}" class="text-light-color">{{trans('translations.services')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{trans('translations.edit')}}</li>
            </ol>
        </div>
        <!--page-header closed-->
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{trans('translations.edit_lab')}}</h4>
                        </div>
                        <div class="card-body">
                            @include('admin.errors')
                            <form action="{{ route('admin.services.update', $service->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class=" row">
                                    <div class="form-group col-md-6">
                                        <label for="name">{{trans('translations.name')}}</label>
                                        <input type="text" required class="form-control" name="name" id="name" value="{{ old('name', $service->name) }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="name">{{trans('translations.name')}}</label>
                                        <select name="parent_id" class="form-control " id="parent_id" >
                                            <option value="" >{{ trans('translations.select_parent') }}</option>
                                            @foreach($parents as $key => $value )
                                                <option value="{{ $value }}" {{ request('parent_id', $service->parent_id) == $value ? "selected":null }}>{{ $key }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class=" row">
                                    <div class="col-md-6">
                                        <label class="custom-switch"> {{ trans('translations.video') }}
                                            <input type="file" style="display:none;" onchange="readURL(this,'upload_img3');" accept="video/*" name="video" class="video">
                                            <video id="upload_img3"  controls src="{{ url("$service->video")}}" style="height:250px; width:250px;"></video>
                                        </label>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="custom-switch"> {{ trans('translations.cover_image') }}
                                            <input type="file" style="display:none;" onchange="readURL(this,'upload_img');" name="cover_image" class="image">
                                            <img id="upload_img" src="{{ url("$service->cover_image")}}" style="height:250px; width:250px;" >
                                        </label>
                                    </div>
                                </div>
                                <div style="height:20px"></div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="custom-switch"> {{ trans('translations.image') }}
                                            <input type="file" style="display:none;" onchange="readURL(this,'upload_img2');" name="image" class="image">
                                            <img id="upload_img2" src="{{ url("$service->image")}}" style="height:250px; width:250px;">
                                        </label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="detail">{{trans('translations.detail')}}</label>
                                        <input required style="height:40px" type="text" value="{{old('detail',  $service->details)}}" class="form-control" name="detail"  id="detail" placeholder="{{ trans('translations.detail')}}" >
                                    </div>
                                </div>
                                <div style="height:20px"></div>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label class="custom-switch">
                                            <input type="checkbox" name="active" value="1" {{ $service->active ? 'checked' : ' ' }} class="custom-switch-input" >
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <button type="submit" href="#" class="btn  btn-outline-primary m-b-5  m-t-5">
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

@section('scripts')
    {{-- @if($branch->lat && $branch->lng)
        <script>
            localStorage.setItem('lat', '{{$branch->lat}}')
            localStorage.setItem('lng', '{{$branch->lng}}')
        </script>
    @else
        <script>
            localStorage.setItem('lat', '30.046275160232675')
            localStorage.setItem('lng', '31.244865309119177')
        </script>
    @endif --}}
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCmhwCq8qtR01rwoYk_wzvbkZW1i7LBCEE&libraries=places&callback=initAutocomplete"  defer></script>
@stop
