<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">
        <div class="container">
            <a class="navbar-brand logo" href="/">GSH</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
             {{-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @auth
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item mr-5 ml-5">
                        <a class="nav-item" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item" href="#">Link</a>
                    </li>
                </ul>

                @endauth
            </div> --}}
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    @auth
                    <li class="nav-item mr-5"><a href="/beranda" class="@yield('beranda')">Beranda</a></li>
                    <li class="nav-item mr-5"><a href="/biodata" class="@yield('biodata')">Biodata</a></li>
                    @if (auth()->user()->role=='admin')
                    <li class="nav-item mr-5"><a href="/daftar-anggota" class="@yield('daftar-anggota')">Daftar Anggota</a></li>
                    @endif
                    @if (auth()->user()->role=='member')
                    <li class="nav-item mr-5 " ><a href="/aktivitas" class="@yield('aktivitas')">Aktivitas</a></li>
                    @endif
                    <li class="nav-item mr-5"><a href="/ganti-password" class="@yield('ganti_password')">Ganti Password</a></li>
                    @endauth
                    @guest
                    <li class="nav-item ml-5"><a href="/login" class="@yield('login')"><i class="fas fa-sign-in-alt"></i> Login</a></li>
                    @endguest
                    @auth
                        <li class="nav-item ml-5"><a href="/out" class="@yield('login')"><i class="fas fa-sign-out-alt"></i>  Logout</a></li>
                    {{-- <li class="nav-item ml-5"><a href="/logout"><i class="fas fa-sign-in-alt"></i> Logout</a></li> --}}
                    @endauth
                </ul>
            </div>
        </div>
</nav>
