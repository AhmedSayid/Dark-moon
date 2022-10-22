@extends('admin.layout')

@section('content')
<div class="app-content">
    <section class="section">
        <!--page-header open-->
        <div class="page-header">
            <h4 class="page-title">{{trans('translations.branches')}}</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.home.index') }}" class="text-light-color">{{trans('translations.home')}}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.branches.index') }}" class="text-light-color">{{trans('translations.branches')}}</a></li>
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
                            <form action="{{ route('admin.branches.update', $branch->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class=" row">
                                    <div class="form-group col-md-4">
                                        <label for="name">{{trans('translations.name')}}</label>
                                        <input type="text" required class="form-control" name="name" id="name" value="{{ old('name', $branch->name) }}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="phone_one">{{trans('translations.phone_one')}}</label>
                                        <input type="text" required class="form-control" name="phone_one" id="phone_one" value="{{ old('phone_one', $branch->phone_one) }}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="phone_two">{{trans('translations.phone_two')}}</label>
                                        <input type="text" required class="form-control" name="phone_two" id="phone_two" value="{{ old('phone_two', $branch->phone_two) }}">
                                    </div>
                                </div>
                                <div class=" row">
                                    <div class="form-group col-md-3">
                                        <label for="lat">{{trans('translations.lat')}}</label>
                                        <input required style="height:40px" type="text" value="{{old('lat', $branch->lat)}}"  class="form-control" name="lat"  id="lat" placeholder="{{ trans('translations.latitude') }}" >    
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="lng">{{trans('translations.long')}}</label>
                                        <input required style="height:40px" type="text" value="{{old('lng',  $branch->lng)}}" class="form-control" name="lng"  id="lng" placeholder="{{ trans('translations.longitude')}}" >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="address">{{trans('translations.address')}}</label>
                                        <input required style="height:40px" type="text" value="{{old('address',  $branch->address)}}" class="form-control" name="address"  id="address" placeholder="{{ trans('translations.address')}}" >
                                    </div> 
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                    <!-- <input id="pac-input" style="width:250px;height:25px;margin-top:20px;" class="controls" type="text" placeholder="{{trans('translations.search')}}"> -->
                                    <div class=" col-md-12" id="map" style="height: 400px; width: 100%"></div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label class="custom-switch">
                                            <input type="checkbox" name="active" value="1" {{ $branch->active ? 'checked' : ' ' }} class="custom-switch-input" >
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
    @if($branch->lat && $branch->lng)
        <script>
            localStorage.setItem('lat', '{{$branch->lat}}')
            localStorage.setItem('lng', '{{$branch->lng}}')
        </script>
    @else
        <script>
            localStorage.setItem('lat', '30.046275160232675')
            localStorage.setItem('lng', '31.244865309119177')
        </script>
    @endif
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCmhwCq8qtR01rwoYk_wzvbkZW1i7LBCEE&libraries=places&callback=initAutocomplete"  defer></script>
@stop 
