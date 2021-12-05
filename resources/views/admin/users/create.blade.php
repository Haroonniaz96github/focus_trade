@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Dashboard</h4></div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('users.index') }}">Manage Users</a></li>
                    <li class="active">Add User</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    @include('admin.partials._msg')
                    <h3 class="box-title m-b-0">Add User</h3>
                    {{ Form::open([ 'route' => 'users.store','class'=>'form-horizontal']) }}
                    <div class="form-group">
                        <label for="sponser_id" class="col-sm-3 control-label">Sponser Id</label>
                        <div class="col-sm-4">
                            <input type="text" name="sponser_id"
                                   class="form-control @error('sponser_id') is-invalid @enderror"
                                   required autocomplete="sponser_id" autofocus
                                   id="sponser_id">
                            @error('sponser_id')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="first_name" class="col-sm-3 control-label">First Name</label>
                        <div class="col-sm-4">
                            <input type="text" name="first_name"
                                   class="form-control @error('first_name') is-invalid @enderror"
                                   required autocomplete="first_name" autofocus
                                   id="first_name">
                            @error('first_name')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="last_name" class="col-sm-3 control-label">Last Name</label>
                        <div class="col-sm-4">
                            <input type="text" name="last_name"
                                   class="form-control @error('last_name') is-invalid @enderror"
                                   required autocomplete="last_name" autofocus
                                   id="last_name">
                            @error('last_name')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">User Name</label>
                        <div class="col-sm-4">
                            <input type="text" name="user_name"
                                   class="form-control @error('user_name') is-invalid @enderror"
                                   required autocomplete="user_name" autofocus
                                   id="user_name">
                            @error('user_name')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-4">
                            <input type="email" name="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   required autocomplete="email" autofocus id="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone_number" class="col-sm-3 control-label">Phone Number</label>
                        <div class="col-sm-4">
                            <input type="phone_number" name="phone_number"
                                   class="form-control @error('phone_number') is-invalid @enderror"
                                   required autocomplete="phone_number" autofocus
                                   id="phone_number">
                            @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                   name="password"
                                   placeholder="if you won't change password, leave it empty.."
                                   autocomplete="current-password" id="password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Status</label>
                        <div class="col-sm-4">
                            <input type="checkbox" checked class="js-switch" data-color="#99d683" name="active"
                                   value="1"/>
                        </div>
                    </div>

                    <div class="form-group m-b-0">
                        <div class="col-sm-offset-3 col-sm-4 text-center">
                            <a href="{{ route('users.index') }}" class="btn btn-info waves-effect waves-light
                                 m-t-10"><i class="fa fa-backward"></i> Back</a>
                            <button type="submit" class="btn btn-success waves-effect waves-light m-t-10">
                                <i class="fa fa-check"></i> Save
                            </button>
                        </div>
                    </div>
                    {{Form::close()}}

                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
@stop
