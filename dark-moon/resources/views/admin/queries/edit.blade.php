@extends('admin.layout')

@section('content')
<div class="app-content">
    <section class="section">
        <!--page-header open-->
        <div class="page-header">
            <h4 class="page-title">{{trans('translations.branches')}}</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.home.index') }}" class="text-light-color">{{trans('translations.home')}}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.queries.index') }}" class="text-light-color">{{trans('translations.queries')}}</a></li>
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
                            <form action="{{ route('admin.queries.update', $query->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class=" row">
                                    <div class="form-group col-md-4">
                                        <label for="name">{{trans('translations.name')}}</label>
                                        <input type="text" required class="form-control" name="name" id="name" value="{{ old('name', $query->name) }}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="type">{{trans('translations.type')}}</label>
                                        <input type="intger" required class="form-control" name="type" id="type" value="{{ old('type', $query->type) }}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="text">{{trans('translations.text')}}</label>
                                        <input type="text" required class="form-control" name="text" id="text" value="{{ old('text', $query->text) }}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="email">{{trans('translations.email')}}</label>
                                        <input type="text" required class="form-control" name="email" id="email" value="{{ old('email', $query->email) }}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="image">{{trans('translations.image')}}</label>
                                        <input type="text" required class="form-control" name="image" id="image" value="{{ old('image', $query->image) }}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="phone">{{trans('translations.phone')}}</label>
                                        <input type="text" required class="form-control" name="phone" id="phone" value="{{ old('phone', $query->phone) }}">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="phone">{{trans('translations.file')}}</label>
                                    <input type="text" required class="form-control" name="file" id="file" value="{{ old('file', $query->file) }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="branch_id">{{trans('translations.branch_id')}}</label>
                                    <input type="intger" required class="form-control" name="branch_id" id="branch_id" value="{{ old('branch_id', $query->branch_id) }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="service_id">{{ trans('translations.service_id') }}</label>
                                    <input type="intger" required class="form-control" name="service_id" id="service_id" value="{{ old('service_id', $query->service_id) }}">
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
