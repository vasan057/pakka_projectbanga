@extends('layouts.app')

@section('content')
<div id="" style="min-height: 250px;margin-top:50px">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                 @if (\Session::has('status'))
                        <div class="alert alert-success">
                            <div style="text-align: center;"><strong>{{ \Session::get('status') }}</strong></div>
                        </div>
                    @endif
                <div class="panel-heading">Sign In</div>
                <div class="panel-body">
                    @if ($errors->has('error'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('error') }}</strong>
                        </div>
                    @endif
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('auth/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                            <label for="user_id" class="col-md-4 control-label"><i class="fa fa-user" style="font-size:1.8em;color:#4d4d4d"></i></label>

                            <div class="col-md-6">
                                <input id="user_id" type="user_id" class="form-control" name="user_id" value="{{ old('user_id') }}">

                                @if ($errors->has('user_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label"><i class="fa fa-lock" style="font-size:2em;color:#4d4d4d"></i></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/auth/reset') }}">Request Password</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
