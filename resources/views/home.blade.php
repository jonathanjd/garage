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
            <form action="" class="form-inline justify-content-center my-4">
                <input type="text" class="form-control form-control-lg mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="City or Zip Code">
                <button class="btn btn-outline-primary mb-2">Buscar</button>
            </form>
            <p class="lead text-center">Having a sale of your own?
                <a href="#">List it here for free!</a>
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
                <h3>Find yard sales in these major cities</h3>
                <hr>
            </div>
            <div class="col-md-3">
                <ul class="list-group">
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/atlanta-ga/">Atlanta</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/austin-tx/">Austin</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/boise-id/">Boise</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/boston-ma/">Boston</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/buffalo-ny/">Buffalo</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/charlotte-nc/">Charlotte</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/chicago-il/">Chicago</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/colorado-springs-co/">Colorado Springs</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/columbus-oh/">Columbus</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/dallas-tx/">Dallas</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/denver-co/">Denver</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/detroit-mi/">Detroit</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/eugene-or/">Eugene</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul class="list-group">
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/fort-lauderdale-fl/">Fort Lauderdale</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/fresno-ca/">Fresno</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/honolulu-hi/">Honolulu</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/houston-tx/">Houston</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/indianapolis-in/">Indianapolis</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/irvine-ca/">Irvine</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/jacksonville-fl/">Jacksonville</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/kansas-city-mo/">Kansas City</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/las-vegas-nv/">Las Vegas</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/los-angeles-ca/">Los Angeles</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/miami-fl/">Miami</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/milwaukee-wi/">Milwaukee</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/minneapolis-mn/">Minneapolis</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul class="list-group">
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/nashville-tn/">Nashville</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/new-york-ny/">New York</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/orlando-fl/">Orlando</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/philadelphia-pa/">Philadelphia</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/phoenix-az/">Phoenix</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/pittsburgh-pa/">Pittsburgh</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/portland-or/">Portland</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/raleigh-nc/">Raleigh</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/reno-nv/">Reno</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/richmond-va/">Richmond</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/rochester-ny/">Rochester</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/sacramento-ca/">Sacramento</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/salem-or/">Salem</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul class="list-group">
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/salt-lake-city-ut/">Salt Lake City</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/san-antonio-tx/">San Antonio</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/san-diego-ca/">San Diego</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/san-francisco-ca/">San Francisco</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/seattle-wa/">Seattle</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/spokane-wa/">Spokane</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/st-louis-mo/">St Louis</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/tampa-fl/">Tampa</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/tucson-az/">Tucson</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/washington-dc/">Washington</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="/yard-sales/west-palm-beach-fl/">West Palm Beach</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

@include('include.footer')


@endsection