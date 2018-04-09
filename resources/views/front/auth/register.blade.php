<!-- Modal Login -->
<div class="modal fade" id="register_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #3399ff;color: #fff">
        <h5 class="modal-title" id="exampleModalLabel">
          <img class="img-fluid" src="{{url('img/myworldhealth-logo-one.png')}}" width="60px" height="60px" class="rounded float-left" alt="..."><b>Register</b>
        </h5>
        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('register')}}" method="post">
        <div class="modal-body">
          {{ csrf_field() }}
          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <label for="name" class="col-md-12 control-label">Name</label>
              <div class="col-md-12">
                  <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                  @if ($errors->has('name'))
                      <span class="help-block">
                          <strong>{{ $errors->first('name') }}</strong>
                      </span>
                  @endif
              </div>
          </div>

          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="email" class="col-md-12 control-label">E-Mail Address</label>

              <div class="col-md-12">
                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
              </div>
          </div>

          <div class="form-row">
            <div class="col{{ $errors->has('password') ? ' has-error' : '' }}">
              <label for="password" class="col-md-12 control-label">Password</label>

              <div class="col-md-12">
                  <input id="password" type="password" class="form-control" name="password" required>

                  @if ($errors->has('password'))
                      <span class="help-block">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
              </div>
            </div>
            <div class="col">
              <label for="password-confirm" class="col-md-12 control-label">Confirm Password</label>

              <div class="col-md-12">
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-warning btn-block text-light">Register</button>
        </div>
      </form>
    </div>
  </div>
</div>