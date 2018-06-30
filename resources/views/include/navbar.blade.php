<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="{{ route('home') }}">Garage Sale</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item {{ url()->current() == url('/') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('home') }}">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item {{ url()->current() == url('yard-sales') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('yard.sales') }}">I'm a Shopper</a>
      </li>
      <li class="nav-item {{ url()->current() == url('sale-manage') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('sale.manage') }}">I'm a Seller</a>
      </li>
      <li class="nav-item {{ url()->current() == url('tips') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('tips') }}">Tips</a>
      </li>
      <li class="nav-item {{ url()->current() == url('contact') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('contact') }}">Contact</a>
      </li>

    </ul>
    <ul class="navbar-nav justify-content-end">
      <li class="nav-item">
      <a class="nav-link" href="{{ url('login') }}">Sign In</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="{{ url('register') }}">Register</a>
      </li>
    </ul>
  </div>
</nav>