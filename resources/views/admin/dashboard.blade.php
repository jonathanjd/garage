@extends('layouts.base')
@section('title', 'DashBoard')
@section('content')

<!-- NavBar -->
@include('include.navbar')

<!-- Section Sale Manage -->
<section id="sale-manage">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>DashBoard</h1>
        <p>Welcome, {{ auth()->user()->name }}</p>
        <hr>
        <div id="dashBoardClient"></div>
      </div>
    </div>
  </div>
</section>


@include('include.footer')

@endsection

@section('script')
<script src="{{ asset('js/app.js') }}"></script>
@endsection