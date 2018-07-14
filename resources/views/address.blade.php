@extends('layouts.base')
@section('title', 'Address')
@section('content')

<!-- NavBar -->
@include('include.navbar')

<!-- Section Contact -->
<section id="contact">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card border-primary mb-3">
          <div class="card-header">List Garages</div>
          <div class="card-body">
              <div class="text-right">
              <a href="{{ route('home') }}" class="btn btn-primary">Back</a>
              </div>
              <div>
              <app-address address="{{ $address }}"></app-address>
              </div>
              <div class="text-right">
                <a href="{{ route('home') }}" class="btn btn-primary">Back</a>
              </div>
          </div>
        </div>
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