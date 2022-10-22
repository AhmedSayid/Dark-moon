@extends('admin.layout')

@section('content')
    <?php
    use App\Constants\UserTypes;
    ?>
    <div class="app-content mt-0 pt-1">
        <section class="section">
            <div class="row">
                <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ trans('translations.filter_by') }}</h4>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" type="get" action="{{ route('admin.teams.index') }}"
                                autocomplete="off">
                                <div class="form-group row">
                                    <div class="form-group col-md-6">
                                        <label for="name">{{ trans('translations.name') }}</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            value="{{ old('name') }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="image">{{ trans('translations.image') }}</label>
                                        <input type="text" class="form-control" name="image" id="image"
                                            value="{{ old('image') }}">
                                    </div>
                                </div>
                                <button type="submit"
                                    class="btn btn-primary mt-1 mb-0">{{ trans('translations.search') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!--page-header open-->
            <div class="page-header">
                <h4 class="page-title">{{ trans('translations.teams') }}</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/" class="text-light-color">{{ trans('translations.home') }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{ trans('translations.teams') }}</li>
                </ol>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <span class="table-add float-right">
                                    <a href="{{ route('admin.teams.create') }}" class="btn btn-icon">
                                        <i class="fa fa-plus fa-1x" aria-hidden="true"></i>
                                    </a>
                                </span>
                                <h4 id="totallll">
                                    {{ trans('translations.teams_list') }}
                                </h4>
                            </div>
                            <div class="card-body">
                                @if (session()->has('success'))
                                    <div class="alert alert-success alert-has-icon alert-dismissible show fade">
                                        <div class="alert-icon"><i class="ion ion-ios-lightbulb-outline"></i></div>
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert">
                                                <span>×</span>
                                            </button>
                                            <div class="alert-title">Success</div>
                                            {{ session('success') }}
                                        </div>
                                    </div>
                                @endif

                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover mb-0 text-nowrap">
                                        <thead>
                                            <tr>
                                                <th style="width: 1px">#</th>
                                                <th>{{ trans('translations.name') }}</th>
                                                {{-- <th>{{ trans('translations.description') }}</th>
                                                <th>{{ trans('translations.image') }}</th> --}}
                                                <th style="width: 1px">{{ trans('translations.actions') }}
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($list as $team)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $team->name_team }}</td>
                                                    {{-- <td>{{ $team->desc }}</td>
                                                    <td><img src="{{ asset($team->image) }}" class="rounded" width="100%" height="100" alt=""></td> --}}
                                                    <td>
                                                        <div class="btn-group dropdown">
                                                            <button type="button"
                                                                class="btn btn-sm btn-info m-b-5 m-t-5 dropdown-toggle"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                <i class="fa-cog fa"></i>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item has-icon"
                                                                    href="{{ route('admin.teams.edit', ['team' => $team->id]) }}">
                                                                    <i class="fa fa-edit">
                                                                    </i>
                                                                    {{ trans('translations.edit') }}
                                                                </a>

                                                                <button type="button" class="dropdown-item has-icon"
                                                                    data-toggle="modal"
                                                                    data-target="#delete_model_{{ $team->id }}">
                                                                    <i class="fa fa-trash"></i>
                                                                    {{ trans('translations.remove') }}
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-center">
                                    {{ $list->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </section>
        @foreach ($list as $team)
            <!-- Message Modal -->
            <div class="modal fade" id="delete_model_{{ $team->id }}" tabindex="-1" role="dialog"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="example-Modal3">{{ trans('translations.delete') }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('admin.teams.destroy', ['team' => $team->id]) }}" method="Post">
                            @method('DELETE')
                            @csrf
                            <div class="modal-body">

                                {{ trans('translations.delete_confirmation_message') }}

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success"
                                    data-dismiss="modal">{{ trans('translations.close') }}</button>
                                <button type="submit" class="btn btn-primary">{{ trans('translations.delete') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Message Modal closed -->
        @endforeach
    </div>
@stop
