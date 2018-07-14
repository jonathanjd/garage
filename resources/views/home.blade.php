@extends('layouts.base')
@section('title', 'Home')
@section('content')

<!-- NavBar -->
@include('include.navbar')

<!--  Section Header -->
<section id="header" class="mt-5">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="text-center display-4">Find garage sales near you!</h1>
            <form action="{{ route('search') }}" method="GET" class="form-inline justify-content-center my-4">
                {{ csrf_field() }}
                <input type="text" name="search" class="form-control form-control-lg mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Address or Zip Code">
                <button class="btn btn-outline-primary mb-2">Buscar</button>
            </form>
            <p class="lead text-center">Having a sale of your own?
                <a href="{{ route('sale.manage') }}">List it here for free!</a>
            </p>
        </div>
    </div>
</section>

<!-- Section Contenido -->
<section id="Contenido" class="my-4">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia numquam accusamus ea, nam, amet tempora laborum illo, saepe
                ullam vel ipsam blanditiis possimus. Exercitationem inventore unde facere nobis earum ea. Lorem ipsum dolor
                sit amet consectetur adipisicing elit. Fuga recusandae perspiciatis enim, nemo minima voluptatibus neque
                assumenda voluptate nulla impedit, modi eaque autem aut facilis magni nihil quo necessitatibus dignissimos?
            </div>
        </div>
    </div>

</section>

<section id="last-garage" class="my-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Last Garage</h3>
                <hr>
                <div class="card-group">
                    @foreach ($garages as $garage)
                        <div class="card mx-1">
                            <img class="card-img-top" src="{{ asset('img/photos/'.$garage->images[0]->name) }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{ $garage->title }}</h5>
                                <p class="card-text">{{ str_limit($garage->description, 100) }}</p>
                                <p class="card-text"><strong>Hour:</strong> {{ Carbon\Carbon::parse($garage->starthour)->format('H:i A')  }} / {{ Carbon\Carbon::parse($garage->endhour)->format('H:i A') }}</p>
                                <p class="card-text"><strong>Address:</strong> {{ $garage->address }}</p>
                                <p class="card-text"><strong>City:</strong> {{ $garage->city }}</p>
                                <p class="card-text"><strong>State:</strong> {{ $garage->state->name }}</p>
                                <p class="card-text">
                                    @foreach ($garage->tags as $tag)
                                        <small class="badge badge-info text-uppercase mx-1">{{ $tag->name }}</small>
                                    @endforeach
                                </p>
                            <p class="card-text"><a href="{{ route('show', $garage->id) }}" class="btn btn-primary btn-block">More Info</a></p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section id="find-yard-sales" class="my-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>List of cities in Los Angeles County, California</h3>
                <hr>
            </div>
            <div class="col-md-3">
                <ul class="list-group">
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Agoura Hills') }}">Agoura Hills</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Alhambra') }}">Alhambra</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Arcadia') }}">Arcadia</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Artesia') }}">Artesia</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Avalon') }}">Avalon</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Azusa') }}">Azusa</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Bell') }}">Bell</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Bell Gardens') }}">Bell Gardens</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Bellflower') }}">Bellflower</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Beverly Hills') }}">Beverly Hills</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Bradbury') }}">Bradbury</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Burbank') }}">Burbank</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Carson') }}">Carson</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Cerritos') }}">Cerritos</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Claremont') }}">Claremont</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Commerce') }}">Commerce</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Compton') }}">Compton</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Covina') }}">Covina</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Cudahy') }}">Cudahy</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Culver City') }}">Culver City</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Diamond Bar') }}">Diamond Bar</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul class="list-group">
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Downey') }}">Downey</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Duarte') }}">Duarte</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'El Monte') }}">El Monte</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'El Segundo') }}">El Segundo</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Gardena') }}">Gardena</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Glendale') }}">Glendale</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Glendora') }}">Glendora</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Hawaiian Gardens') }}">Hawaiian Gardens</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Hawthorne') }}">Hawthorne</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Hermosa Beach') }}">Hermosa Beach</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Hidden Hills') }}">Hidden Hills</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Huntington Park') }}">Huntington Park</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Industry') }}">Industry</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Inglewood') }}">Inglewood</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Irwindale') }}">Irwindale</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'La Cañada Flintridge') }}">La Cañada Flintridge</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'La Habra Heights') }}">La Habra Heights</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'La Mirada') }}">La Mirada</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'La Puente') }}">La Puente</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'La Verne') }}">La Verne</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Lakewood') }}">Lakewood</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul class="list-group">
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Lancaster') }}">Lancaster</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Lawndale') }}">Lawndale</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Lomita') }}">Lomita</a>
                    </li>

                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Long Beach') }}">Long Beach</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Los Angeles') }}">Los Angeles</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Lynwood') }}">Lynwood</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Malibu') }}">Malibu</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Manhattan Beach') }}">Manhattan Beach</a>
                    </li>

                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Maywood') }}">Maywood</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Monrovia') }}">Monrovia</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Montebello') }}">Montebello</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Monterey Park') }}">Monterey Park</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Norwalk') }}">Norwalk</a>
                    </li>

                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Palmdale') }}">Palmdale</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Palos Verdes') }}">Palos Verdes</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Paramount') }}">Paramount</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Pasadena') }}">Pasadena</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Pico Rivera') }}">Pico Rivera</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Pomona') }}">Pomona</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Redondo Beach') }}">Redondo Beach</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Rolling Hills') }}">Rolling Hills</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul class="list-group">
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Rosemead') }}">Rosemead</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'San Dimas') }}">San Dimas</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'San Fernando') }}">San Fernando</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'San Gabriel') }}">San Gabriel</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'San Marino') }}">San Marino</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Santa Clarita') }}">Santa Clarita</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Santa Fe Springs') }}">Santa Fe Springs</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Santa Monica') }}">Santa Monica</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Sierra Madre') }}">Sierra Madre</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Signal Hill') }}">Signal Hill</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'El Monte') }}">El Monte</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'South Gate') }}">South Gate</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Temple City') }}">Temple City</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Torrance') }}">Torrance</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Vernon') }}">Vernon</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Walnut') }}">Walnut</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'West Covina') }}">West Covina</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Maywood') }}">Maywood</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'West Hollywood') }}">West Hollywood</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'West Hollywood') }}">Westlake Village</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="{{ route('address', 'Whittier') }}">Whittier</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

@include('include.footer')


@endsection