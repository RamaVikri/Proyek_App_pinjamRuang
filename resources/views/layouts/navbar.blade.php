<!-- navigation -->
<header class="navigation text-white bg-primary-light">
    <nav class="navbar navbar-expand-xl navbar-light text-center py-3">
        <div class="container ">
            <div class="nav-item">
                <a class="navbar-brand nav-link" href="index.html" style="font-size: 5vh">
                    Pinjam Ruang
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item "> <a class="nav-link" href="{{ route('room') }}">Room</a></li>
                    <li class="nav-item "> <a class="nav-link" href="{{ route('user.bookingform') }}">Booking</a></li>
                    @auth
                        @if (!auth()->user()->is_admin)
                            <li class="nav-item "> <a class="nav-link" href="{{ route('user.bookinghistory') }}">Booking History</a>
                            </li>
                            <li class="nav-item "> <a class="nav-link" href="{{ route('user.bookingform') }}">Dashboard</a>
                            </li>
                        @endif
                    @endauth
                </ul>
                @auth
                    <div class="navbar-nav m-auto mb-2 mb-lg-0 d-flex align-items-center">
                        @if (auth()->user()->is_admin)
                            <a class="btn bg-warning text-white m-2" href="{{ route('admin.dashboard') }}">Admin Panel</a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}">
                            {{-- <a href="{{ route('logout') }}" class="btn btn-outline-primary bg-danger text-white">Log Out</a> --}}
                            @csrf
                            <button type="submit" class="btn btn-outline-primary bg-danger text-white">Logout</button>
                        </form>
                    </div>
                @else
                    <div class="navbar-nav m-auto mb-2 mb-lg-0 d-flex align-items-center"></div>
                    <a href="{{ route('login') }}" class="btn btn-outline-primary text-white ">Login</a>
                </div>
            @endauth

        </div>
        </div>

    </nav>
</header>
<!-- /navigation -->
