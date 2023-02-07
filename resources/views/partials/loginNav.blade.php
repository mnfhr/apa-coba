<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar"">
    <div class="container">
        <a class="navbar-brand" href="/">HOTEL <br><p>Insitu Wikrama</p></a>
        <button class="navbar-toggler" type="button" data-target="#ftco-nav" aria-controls="ftco-nav" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span>
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <div class="navbar-nav ml-auto text-light">
                <a class="nav-link {{ ($title === "Home") ? 'active' : '' }}" href="/">Home</a>
                <a class="nav-link {{ ($title === "About") ? 'active' : '' }}" href="/about">Facillity</a>
                <a class="nav-link {{ ($title === "Kamar") ? 'active' : '' }}" href="/tipeKamar">Room</a>
                <a class="nav-link {{ ($title === "Contact") ? 'active' : '' }}" href="/kontak">Kontak</a>
            </div>

            @auth
            <div class="navbar-nav dropdown ms-auto">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Hi!, {{ auth()->user()->nama }}
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/#"><i class="bi bi-layout-text-sidebar-reverse"></i> User</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form action="/logout" method="post">
                            @csrf
                            <button class="dropdown-item" type="submit"><i class="bi bi-box-arrow-right"></i>
                                Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
            @else
            <div class="navbar-nav ms-auto">
                <a class="nav-link text-light" href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
            </div>
            @endauth

        </div>
    </div>
</nav>
