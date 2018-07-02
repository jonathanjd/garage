@extends('layouts.base')
@section('title', 'Login')
@section('content')

<!-- NavBar -->
@include('include.navbar')

<!-- Section Contact -->
<section id="contact">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card mb-3">
        <img class="card-img-top" src="{{ asset('img/login.png') }}" alt="Card image cap">
          <div class="card-body">
            <h1>Sign In</h1>
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
              {{ csrf_field() }}
              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                  <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif
              </div>
              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" required>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group">
                <div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                        </label>
                    </div>
                </div>
            </div>
              <p>Forgot your password? <a href="{{ route('password.request') }}" class="">Recover Here.</a></p>
              <button type="submit" class="btn btn-primary">Login</button>
              <button type="button" class="btn btn-outline-primary">Cancel</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@include('include.footer')

@endsection