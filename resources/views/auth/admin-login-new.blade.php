<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Center</title>

    <!-- Styles -->
    @include('front.partials.assets.css')
    {{-- // --}}
    @include('front.partials.custom-style')
</head>
<body>
    <div class="content">
        <div id="">
            <div id="row">
                <!-- Navbar -->
                @include('auth.components.navbar-admin')
                {{-- Content --}}
                <div class="row">
                    <div class="col-sm-8 col-md-8 col-12">
                        <div class="d-flex justify-content-center">
                            <div class="p-5">
                                <div class="col-md-12 col-12">
                                    <div class="text-center mb-4">
                                        <i class="ion-ios-pulse" style="font-size: 120px;color: #17C4BB;"></i>
                                        <h1 class="h3 mb-3 font-weight-normal">Admin Center</h1>
                                        <p>Manage your data efficiently at MyworldHealth with <br>
                                        <em class="font-weight-bold"> MyworldHealth Admin Center</em> <br>
                                      </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-12">
                        <div class="d-flex justify-content-center p-5">
                            <div class="card">
                              <div class="card-body">
                                <div class="clearfix">
                                   {{--  <img class="img-fluid justify-content-left p-2 float-left" width="230px" height="230px" src="{{asset('img/myworldhealth-logo-admin-blue-s.png')}}"> --}}
                                </div><br>
                                <form class="login-form" role="form" method="POST" action="{{ route('admin.login.submit') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <div class="col-md-12">
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                  <div class="input-group-text"
                                                        style="background-color: #fff!important;">
                                                         <i class="ion-ios-email-outline" 
                                                            style="font-size: 20px;"></i>   
                                                    </div>
                                                </div>
                                                <input id="email" type="email" class="form-control" name="email" placeholder="E-Mail" value="{{ old('email') }}" required autofocus>
                                            </div>

                                            @if ($errors->has('email'))
                                                <label class="help-block">
                                                    <small class="text-danger">{{ $errors->first('email') }}</small>
                                                </label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <div class="col-md-12">
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                  <div class="input-group-text"
                                                        style="background-color: #fff!important;">
                                                         <i class="ion-ios-locked-outline" 
                                                            style="font-size: 20px;"></i>   
                                                    </div>
                                                </div>
                                                <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>
                                            </div>

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
                                                <label class="text-secondary">
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
                                            <button type="submit" class="btn btn-outline-light btn-block"
                                                    style="background-color: #17C4BB;">
                                                Login
                                            </button>
                                        </div>
                                    </div>
                                </form>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <footer class="footer">
      <div class="container">
        <small class="text-muted">Admin Center</small> <br>
        <small class="text-muted">Version: v1.0.0+</small>
      </div>
    </footer>

    <!-- Scripts -->
    @include('front.partials.assets.js')

</body>
</html>