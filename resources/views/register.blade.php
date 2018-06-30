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
            <form>
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control">
              </div>
              <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" class="form-control">
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