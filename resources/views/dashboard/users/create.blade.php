@extends('layouts.dashboard.master')

@inject('user', 'App\Models\User')

@section('title', 'Create User')

@section('content')
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Create User</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form action="{{ route('users.store') }}" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        @csrf
                        @include('dashboard.users.form')
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <a href="{{ route('users.index') }}" class="btn btn-dark">Cancel</a>
                                <button class="btn btn-info" type="reset">Reset</button>
                                <button type="submit" class="btn btn-success">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- @extends('layouts.dashboard.master')

@inject('user', 'App\Models\User')
@section('title', 'Create User')

@section('content')
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Create User</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form action="{{ route('users.store') }}" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        @csrf
                        @include('dashboard.users.form')
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <a href="{{ route('users.index') }}" class="btn btn-dark">Cancel</a>
                                <button class="btn btn-info" type="reset">Reset</button>
                                <button type="submit" class="btn btn-success">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
