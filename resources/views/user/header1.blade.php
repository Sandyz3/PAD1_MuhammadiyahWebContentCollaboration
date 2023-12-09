<section class="ftco-section">
    <nav class="navbar navbar-expand-lg ftco-navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="/assets/img/logo.png" alt="" class="logo-navbar">
            </a>
<<<<<<< HEAD
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-light fw-bold me-5" aria-current="page" href="{{ route('homepage') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light fw-bold me-5" href="{{ route('vw_about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light fw-bold me-5" href="{{ route('vw_kajian') }}">Kajian</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control-sm me-2 small-placeholder" type="search" placeholder="Search"
                        aria-label="Search">
                    <img src="/assets/img/search.png" alt="" class="me-3" width="30px" height="30px">
                </form>

                <div class="d-flex akun">
=======
            <form action="#" class="searchform order-lg-last">
                <div class="form-group d-flex">
                    <input type="text" class="form-control" placeholder="Search">
                    <button type="submit" placeholder="" class="form-control search"><span
                            class="fa fa-search"></span></button>
                </div>
            </form>
            <div class="collapse navbar-collapse order-lg-last">
                <div class="d-flex order-lg-last akun">
>>>>>>> 82c7a56beca59860c061c7fd76b6b40690f994bd
                    <button class="sign-up me-3 fw-bolder" onclick="window.location.href='{{ route('register') }}'">
                        Sign Up
                    </button>
                    <button class="sign-in fw-bolder me-3" onclick="window.location.href='{{ route('login') }}'">
                        Sign In
                    </button>
                </div>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse nvbar" id="ftco-nav">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item {{ request()->is('homepage') ? 'active' : '' }}"><a href="{{ url('homepage') }}"
                            class="nav-link">Home</a></li>
                    <li class="nav-item {{ request()->is('about') ? 'active' : '' }}"><a href="{{ url('about') }}"
                            class="nav-link">About</a></li>
                    <li class="nav-item {{ request()->is('kajian') ? 'active' : '' }}"><a href="{{ url('kajian') }}"
                            class="nav-link">Kajian</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->
</section>