@extends('admin.layout')

@section('content')

    <div class="app-content mt-0 pt-1">
        <section class="section">

            <!--page-header open-->
            <div class="page-header">
                <h4 class="page-title">{{ trans('dashboard') }}</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="text-light-color">home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ trans('dashboard') }}</li>
                </ol>
            </div>

            <!--row open-->
            <div class="row">
                <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12">
                    <div class="card bg-primary">
                        <div class="card-body">
                            <div class="card-order">
                                <h6 class="mb-2">Branches' count</h6>
                                <h2 class="text-right"><i
                                        class="fa fa-user-md mt-2 float-left"></i><span>{{ $branches }}</span>
                                </h2>
                                <p class="mb-0">Branches<span class="float-right">835</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--row closed-->
        </section>
    </div>
@stop
