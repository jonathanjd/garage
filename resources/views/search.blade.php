@extends('layouts.base')
@section('title', 'Search Garage Sale')
@section('content')

<!-- NavBar -->
@include('include.navbar')

<!-- Section Search Garage Sale -->
<section id="search-garage-sale">
  <search-garage search="{{ $search }}"></search-garage>
</section>

@include('include.footer')

@endsection
@section('script')
<script src="{{ asset('js/app.js') }}"></script>
<script async defer
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZvuQnalxu6pzgdPVSpS2j3dEvP_hv8NM">
</script>
@endsection