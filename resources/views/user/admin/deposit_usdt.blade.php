@extends('user.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Deposit USDT</h4></div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                    <li class="active">Deposit USDT</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    @include('user.partials._msg')
                    <h3 class="box-title m-b-0">Deposit USDT</h3>
                    <form class="form-horizontal" method="post" action="{{ route('deposit_usdt') }}">
                        @csrf
                        <div class="form-group">
                            <label for="network" class="col-sm-3 control-label">Network</label>
                            <div class="col-sm-4">
                                <input type="text" name="network"
                                       class="form-control @error('network') is-invalid @enderror"
                                       required autocomplete="network" value="{{ $deposit? $deposit->network : '' }}"
                                       autofocus
                                       id="network">
                                @error('network')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="wallet_address" class="col-sm-3 control-label">Wallet Address</label>
                            <div class="col-sm-4">
                                <input type="text" name="wallet_address"
                                       class="form-control @error('wallet_address') is-invalid @enderror"
                                       autocomplete="wallet_address" value="{{ $deposit? $deposit->wallet_address : '' }}" autofocus
                                       id="wallet_address">
                                @error('wallet_address')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="selected_wallet" class="col-sm-3 control-label">Selected Wallet</label>
                            <div class="col-sm-4">
                                <input type="text" name="selected_wallet"
                                       class="form-control @error('selected_wallet') is-invalid @enderror"
                                       required autocomplete="selected_wallet" value="{{ $deposit? $deposit->selected_wallet : '' }}"
                                       autofocus
                                       id="selected_wallet">
                                @error('selected_wallet')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="form-group m-b-0">
                            <div class="col-sm-offset-3 col-sm-4 text-center">
                                <a href="{{ route('user.dashboard') }}" class="btn btn-info waves-effect waves-light
                                 m-t-10"><i class="fa fa-backward"></i> Back</a>
                                <button type="submit" class="btn btn-success waves-effect waves-light m-t-10">Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </div>
@endsection

