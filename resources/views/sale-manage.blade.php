@extends('layouts.base')
@section('title', 'Sale Manage')
@section('content')

<!-- NavBar -->
@include('include.navbar')

<!-- Section Sale Manage -->
<section id="sale-manage">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Post Your Garage Sale For Free</h1>
        <hr>
        <sale-manage></sale-manage>
      </div>
    </div>
  </div>
</section>


@include('include.footer')

@endsection

@section('script')
<script src="{{ asset('js/app.js') }}"></script>
<script async defer
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZvuQnalxu6pzgdPVSpS2j3dEvP_hv8NM">
</script>
@endsection