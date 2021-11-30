<div class="container-fluid">
    <div class="row justify-content-between header">
        <div class="col logo">
            <a href="index.php">
                {{--<h1>MOTYLPUB</h1>
                <h2>RESTAURANT</h2>--}}
                <img src="{{ asset('images/logoBlack.png') }}" alt="">
            </a>
        </div>
        <ul class="nav justify-content-end col">
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs("homepage") ? "active" : "" }}" aria-current="page" href="{{ route("homepage") }}">Domov</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs("menu.index") ? "active" : "" }}" href="{{ route("menu.index") }}">Menu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs("contactpage") ? "active" : "" }}" href="{{ route("contactpage") }}">Kontakt</a>
            </li>
        </ul>
        <div class="dropdownnav col">
            <button class="btn" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-bars"></i>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                <li><a class="dropdown-item {{ Request::routeIs("homepage") ? "active" : "" }}" href="{{ route("homepage") }}">Domov</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item {{ Request::routeIs("menu.index") ? "active" : "" }}" href="{{ route("menu.index") }}">Menu</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item {{ Request::routeIs("contactpage") ? "active" : "" }}" href="{{ route("contactpage") }}">Kontakt</a></li>
            </ul>
        </div>
    </div>
</div>
