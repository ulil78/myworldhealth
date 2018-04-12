<!-- Modal Login -->
<div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #3399ff;color: #fff">
        <h5 class="modal-title" id="exampleModalLabel">
          <img class="img-fluid" src="{{url('img/myworldhealth-logo-one.png')}}" width="60px" height="60px" class="rounded float-left" alt="..."><b>Login</b>
        </h5>
        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('login')}}" method="post">
        <div class="modal-body">
          {{ csrf_field() }}
          <div class="input-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm" style="background-color: #fff!important;">
                <i class="ion-ios-email-outline" style="font-size: 20px;"></i>
              </span>
            </div>
            <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>

            @if ($errors->has('email'))
                <small class="text-danger">
                    <b>{{ $errors->first('email') }}</b>
                </small>
            @endif
          </div>
          <br>
          <div class="input-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm" style="background-color: #fff!important;">
                <i class="ion-ios-locked-outline" style="font-size: 20px;"></i>
              </span>
            </div>
            <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

            @if ($errors->has('password'))
                <small class="text-danger">
                    <b>{{ $errors->first('password') }}</b>
                </small>
            @endif
          </div>
          <br>
          <div class="form-group">
              <div class="col-md-12 col-md-offset-4">
                  <div class="checkbox">
                      <label>
                          <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                      </label>
                  </div>
              </div>
          </div>
          <div class="form-group">
              <div class="col-md-12">
                <button type="submit" class="btn btn-warning btn-block text-light">Login</button>
              </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>