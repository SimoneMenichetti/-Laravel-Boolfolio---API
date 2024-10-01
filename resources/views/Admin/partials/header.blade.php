<header>
    <div class="container-fluid text-bg-dark d-flex">
        <div>
            <a href="{{ route('home') }}" target=""></a>
        </div>
        <div>
            <ul class="navbar">
                @guest
                    <li class="nav-item pe-3"><a href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item pe-3"><a href="{{ route('register') }}">Registrati</a></li>
                @else
                    <li class="nav-item dropdown ">
                        <a id ='navbarDropdown' class="nav-link dropdown-toggle " href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown"
                            aria-labelledby="navbarDropdown">
                            <a class="text-dark" href="{{ route('admin.home') }}">Admin</a>
                            <a class="text-dark" href="#"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                        </div>
                        <form action="{{ route('logout') }}" id="logout-form" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>

                @endguest
            </ul>

        </div>
    </div>
</header>
