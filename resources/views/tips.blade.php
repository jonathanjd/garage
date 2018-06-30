@extends('layouts.base')
@section('title', 'Tips')
@section('content')

<!-- NavBar -->
@include('include.navbar')

<!-- Section Tips -->
<section id="tips">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Tips</h1>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card-columns">
          <div class="card">
            <img class="card-img-top" src="{{ asset('img/last-garage.png') }}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Tips title</h5>
              <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
              <p class="card-text">
                <small class="text-muted">Last updated 3 mins ago</small>
              </p>
            </div>
          </div>
          <div class="card">
            <img class="card-img-top" src="{{ asset('img/last-garage.png') }}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Tips title</h5>
              <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
              <p class="card-text">
                <small class="text-muted">Last updated 3 mins ago</small>
              </p>
            </div>
          </div>
          <div class="card">
            <img class="card-img-top" src="{{ asset('img/last-garage.png') }}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Tips title</h5>
              <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
              <p class="card-text">
                <small class="text-muted">Last updated 3 mins ago</small>
              </p>
            </div>
          </div>
          <div class="card">
            <img class="card-img-top" src="{{ asset('img/last-garage.png') }}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Tips title</h5>
              <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
              <p class="card-text">
                <small class="text-muted">Last updated 3 mins ago</small>
              </p>
            </div>
          </div>
          <div class="card">
            <img class="card-img-top" src="{{ asset('img/last-garage.png') }}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Tips title</h5>
              <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
              <p class="card-text">
                <small class="text-muted">Last updated 3 mins ago</small>
              </p>
            </div>
          </div>

      </div>
    </div>
    <div class="col-md-12">
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item"><a class="page-link" href="#">Previous</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
      </nav>
    </div>
  </div>
</section>

@include('include.footer') @endsection