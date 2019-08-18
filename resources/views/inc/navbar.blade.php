<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="{{url('/')}}">
      {{config('app.name', 'Laravel')}}
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
            aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{route('pages.index')}}">
            Home <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('pages.about')}}">
            About
          </a>
        </li>
      </ul>

      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ml-auto">
        @auth
          <li class="nav-item">
            <a class="nav-link" href="{{route('todos.index')}}">
              Todos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('todos.create')}}">
              New Todo
            </a>
          </li>
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              <img
                src="{{asset('storage/pics/'.Auth::user()->image)}}"
                class="rounded-circle mr-1"
                height="30px"
                width="30px">{{ Auth::user()->name }} <span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{route('home')}}">
                Dashboard
              </a>
              <a class="dropdown-item" href="{{route('profile.index')}}">
                Profile
              </a>
              <a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}">
              Login
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('register')}}">
              Register
            </a>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>
