@extends('layouts.base')
@section('title', 'Register')
@section('content')

<!-- NavBar -->
@include('include.navbar')

<!-- Section Contact -->
<section id="contact">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card mb-3">
        <img class="card-img-top" src="{{ asset('img/register.png') }}" alt="Card image cap">
          <div class="card-body">
            <h1>Register</h1>
            <p>Register for a free account now and enjoy these benefits:</p>
            <ul>
              <li>Add your sale to garagesale.com</li>
              <li>Save favorite sales for the week</li>
            </ul>
            <form class="form-horizontal" method="POST" action="{{ route('register') }}">

              {{ csrf_field() }}

              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required autofocus>
                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
              </div>


              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
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
                  <div class="invalid-feedback">
                      <strong>{{ $errors->first('password') }}</strong>
                  </div>
                @endif
              </div>

              <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
              </div>

              <button type="submit" class="btn btn-primary">Register</button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@include('include.footer')

@endsection