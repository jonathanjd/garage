@extends('layouts.base')
@section('title', 'Yard Sales')
@section('content')

<!-- NavBar -->
@include('include.navbar')

<!-- Section Yard-Sale -->
<section id="yard-sale">
  <yard-sale></yard-sale>
</section>

@include('include.footer')

@endsection
@section('script')
<script src="{{ asset('js/app.js') }}"></script>
<script async defer
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZvuQnalxu6pzgdPVSpS2j3dEvP_hv8NM">
</script>
@endsection