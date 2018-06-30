@extends('layouts.base')
@section('title', 'Contact')
@section('content')

<!-- NavBar -->
@include('include.navbar')

<!-- Section Contact -->
<section id="contact">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card mb-3">
        <img class="card-img-top" src="{{ asset('img/contact.png') }}" alt="Card image cap">
          <div class="card-body">
            <h1>Contact Us</h1>
            <p>Thanks for your interest in GarageSaleFinder.com! We are very interested in your input (good or bad) and will respond within 24 hours. To contact us please fill out this form.</p>
            <form>
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" placeholder="Enter name">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Message</label>
                <textarea class="form-control" placeholder="Enter message"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@include('include.footer')

@endsection