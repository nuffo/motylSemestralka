<div class="container-fluid footer">
    <div class="logo">
        <a href="{{ route("homepage") }}">
            <img src="{{ asset('images/logoWhite.png') }}" alt="">
        </a>
    </div>
    <div class="container">
        <div class="socials">
            <a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a>
            <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
            <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
        </div>
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs("homepage") ? "active" : ""}}" aria-current="page" href="{{ route("homepage") }}">Domov</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs("menu.index") ? "active" : ""}}" href="{{ route("menu.index") }}">Menu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs("contactpage") ? "active" : ""}}" href="{{ route("contactpage") }}">Kontakt</a>
            </li>
        </ul>
        <p class="copyright">©Copyright. All rights reserved.</p>
    </div>

</div>
