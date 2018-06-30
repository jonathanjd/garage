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
            <form>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control">
              </div>
              <p>Forgot your password? <a href="#" class="">Recover Here.</a></p>
              <button type="button" class="btn btn-primary">Login</button>
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