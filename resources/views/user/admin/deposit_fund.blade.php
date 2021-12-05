@extends('user.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Deposit Fund</h4></div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                    <li class="active">Deposit Fund</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    @include('user.partials._msg')
                    <h3 class="box-title m-b-0">Deposit Fund</h3>
                    <form class="form-horizontal" method="post" action="{{ route('deposit_fund') }}">
                        @csrf
                        <div class="form-group">
                            <label for="amount" class="col-sm-3 control-label">Amount</label>
                            <div class="col-sm-4">
                                <input type="text" name="amount"
                                       class="form-control @error('amount') is-invalid @enderror"
                                       required autocomplete="amount" value="{{ $deposit? $deposit->amount : '' }}"
                                       autofocus
                                       id="amount">
                                @error('amount')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="slip" class="col-sm-3 control-label">Deposit Slip</label>
                            <div class="col-sm-4">
                                <input type="file" name="slip"
                                       class="form-control @error('slip') is-invalid @enderror"
                                       autocomplete="slip" value="{{ $deposit? $deposit->slip : '' }}" autofocus
                                       id="slip">
                                @error('slip')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="remarks" class="col-sm-3 control-label">Remarks</label>
                            <div class="col-sm-4">
                                <input type="text" name="remarks"
                                       class="form-control @error('remarks') is-invalid @enderror"
                                       required autocomplete="remarks" value="{{ $deposit? $deposit->remarks : '' }}"
                                       autofocus
                                       id="remarks">
                                @error('remarks')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pin" class="col-sm-3 control-label">E-PIN</label>
                            <div class="col-sm-4">
                                <input type="text" name="pin"
                                       class="form-control @error('pin') is-invalid @enderror"
                                       required autocomplete="pin" value="{{ $deposit ? $deposit->pin : '' }}" autofocus
                                       id="pin">
                                @error('remarks')
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

