<!DOCTYPE html>
<html>
<head>
	<title>Administration</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" type="text/css" href="{{url('css/backend_login.css')}}">
</head>
<body>

<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-sm-6 col-md-6 col-12">
            <div class="d-flex justify-content-center">
                <div class="account-wall" style="background-color: #32d6cd;">
                    <div id="my-tab-content" class="tab-content">
                        <div class="clearfix">
                            <img class="img-fluid justify-content-center p-2 float-right" width="230px" height="230px" src="{{asset('img/myworldhealth-logo-admin.png')}}">
                        </div><br>
                        <form class="login-form" role="form" method="POST" action="{{ route('admin.login.submit') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-6 control-label text-light">E-Mail</label>

                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <label class="help-block">
                                            <small class="text-danger">{{ $errors->first('email') }}</small>
                                        </label>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-6 control-label text-light">Password</label>

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <label class="help-block">
                                            <small class="text-danger">{{ $errors->first('password') }}</small>
                                        </label>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
                                        </label>
                                    </div>
                                    {{-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Forgot Your Password?
                                    </a> --}}
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 col-12 col-md-offset-4">
                                    <button type="submit" class="btn btn-light btn-block" style="background-color: #17C4BB;color: #fff">
                                        Login
                                    </button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="col-12" style="background-color: #17C4BB;">
                            <small class="text-center text-light p-2">Copyright © 2018 MyWorldHealth</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>