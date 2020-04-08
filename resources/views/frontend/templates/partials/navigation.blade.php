<div class="navbar-fixed">
  <nav>
    <div class="container">
      <div class="nav-wrapper">
        <a href="{{ route('homepage') }}" class="brand-logo">Logo</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          @guest
          <li><a href="{{ route('login') }}">Login</a></li>
          <li><a href="{{ route('register') }}">Register</a></li>
          @else
          <ul id="dropdown1" class="dropdown-content">
            <li><a href="{{ route('homepage') }}">Home</a></li>            
            <li><a href="{{ route('logout') }}" 
              onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                     Logout
                </a>
            </li>
          </ul>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
          <li>
            <a href="#" class="dropdown-trigger" data-target="dropdown1">
              {{ auth()->user()->name }}
            </a>
          </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>  
</div>

<!-- Mobile Menu -->
<ul class="sidenav" id="mobile-demo">
  @guest
  <li><a href="{{ route('login') }}">Login</a></li>
  <li><a href="{{ route('register') }}">Register</a></li>
  @else
  <ul id="dropdown-mobile" class="dropdown-content">
    <li><a href="{{ route('homepage') }}">Home</a></li>
    <li><a href="{{ route('logout') }}" 
      onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
             Logout
        </a>
    </li>
  </ul>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
  </form>
  <li>
    <a href="#" class="dropdown-trigger" data-target="dropdown-mobile">
      {{ auth()->user()->name }}
    </a>
  </li>
  @endguest
</ul>