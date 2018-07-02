@extends('layouts.base')
@section('title', 'Yard Sales')
@section('content')

<!-- NavBar -->
@include('include.navbar')

<!-- Section Yard-Sale -->
<section id="yard-sale">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <h1>I'm a Shopper</h1>
        <hr>
        <div id="yardSale"></div>
      </div>
    </div>
  </div>
</section>

@include('include.footer')

@endsection
@section('script')
<script src="{{ asset('js/app.js') }}"></script>
@endsection