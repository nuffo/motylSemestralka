<div class="container-fluid">
    <div class="row justify-content-between header">
        <div class="col-3 logo">
            <a href="{{ route("index") }}">
                {{--<h1>MOTYLPUB</h1>
                <h2>RESTAURANT</h2>--}}
                <img src="{{ asset('images/logoBlack.png') }}" alt="">
            </a>
        </div>
        <ul class="nav justify-content-end col-9">
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs("index") ? "active" : "" }}" aria-current="page" href="{{ route("index") }}">Domov</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs("menu.index") ? "active" : "" }}" href="{{ route("menu.index") }}">Menu</a>
            </li>
            @auth
            @if(Auth::user()->role === 'user')
            <li class="nav-item">
                <a class="nav-link" href="{{ route("order.index") }}">Objednávka</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route("order-history.index") }}">História objednávok</a>
            </li>
            @endif
            @endauth
            @if(Auth::check())
            @if(Auth::user()->role === 'admin')
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs("question.index") ? "active" : "" }}" href="{{ route("question.index") }}">Dotazy</a>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs("contactpage") ? "active" : "" }}" href="{{ route("contactpage") }}">Kontakt</a>
            </li>
            @endif
            @else
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs("contactpage") ? "active" : "" }}" href="{{ route("contactpage") }}">Kontakt</a>
            </li>
            @endif
            <li class="nav-item">
                @guest
                <a class="nav-link {{ Request::routeIs("loginpage") ? "active" : "" }}" href="{{ route("loginpage") }}">Prihlásenie</a>
                @endguest
                @auth
                
                <form id="logout-form" method="post"  action="{{ route("logout") }}">
                    @csrf
                    <a class="nav-link" href="#" onclick="submitForm()">Odhlásenie</a>
                </form>
                <script>
                    function submitForm() {
                        let form = document.getElementById("logout-form");
                        form.submit();
                    }
                </script>
                @endauth
            </li>
        </ul>
        <div class="dropdownnav col">
            <button class="btn" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-bars"></i>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                <li><a class="dropdown-item {{ Request::routeIs("index") ? "active" : "" }}" href="{{ route("index") }}">Domov</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item {{ Request::routeIs("menu.index") ? "active" : "" }}" href="{{ route("menu.index") }}">Menu</a></li>
                <li><hr class="dropdown-divider"></li>
                @auth
                <li><a class="dropdown-item {{ Request::routeIs("order.index") ? "active" : "" }}" href="{{ route("order.index") }}">Objednávka</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item {{ Request::routeIs("order-history.index") ? "active" : "" }}" href="{{ route("order-history.index") }}">História objednávok</a></li>
                <li><hr class="dropdown-divider"></li>
                @endauth
                @if(Auth::check())
                @if(Auth::user()->role === 'admin')
                <li><a class="dropdown-item {{ Request::routeIs("qeustion.index") ? "active" : "" }}" href="{{ route("question.index") }}">Dotazy</a></li>
                <li><hr class="dropdown-divider"></li>
                @else
                <li><a class="dropdown-item {{ Request::routeIs("contactpage") ? "active" : "" }}" href="{{ route("contactpage") }}">Kontakt</a></li>
                <li><hr class="dropdown-divider"></li>
                @endif
                @else
                <li><a class="dropdown-item {{ Request::routeIs("contactpage") ? "active" : "" }}" href="{{ route("contactpage") }}">Kontakt</a></li>
                <li><hr class="dropdown-divider"></li>
                @endif
                @guest
                <li><a class="dropdown-item {{ Request::routeIs("loginpage") ? "active" : "" }}" href="{{ route("loginpage") }}">Prihlásenie</a></li>
                @endguest
                @auth
                <form id="logout-form" method="post"  action="{{ route("logout") }}">
                    @csrf
                    <a class="dropdown-item" href="#" onclick="submitForm()">Odhlásenie</a>
                </form>
                @endauth
            </ul>
        </div>
    </div>
</div>
