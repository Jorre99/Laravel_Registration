<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="/"><img src="" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/lessonpref">Zwemlessen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/poolparties">Zwemfeesten</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact-us">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/faq">FAQ</a>
                </li>
            </ul>
            {{--  Admin navigation  --}}
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="/login">login</a>
                    </li>
                @endguest

                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#!" data-toggle="dropdown">
                            {{ auth()->user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">


                            <a class="dropdown-item" href="/auth/swimminglessonslists"><i class="fas fa-swimmer"></i> Zwemlessen</a>
                            <a class="dropdown-item" href="/auth/swimmers"><i class="far fa-address-card"></i> Klanten</a>
                            @if(auth()->user()->admin)
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/admin/swimminglesson"><i class="fas fa-swimmer"></i> Zwemlessen toevoegen</a>
                                <a class="dropdown-item" href="/admin/poolparties"><i class="fas fa-birthday-cake"></i> Zwemfeesten</a>
                                <a class="dropdown-item" href="/admin/schools"><i class="p-1 fas fa-graduation-cap"></i> Scholen</a>
                                <a class="dropdown-item" href="/admin/prices"><i class="p-1 fas fa-euro-sign"></i> Prijzen</a>
                                <a class="dropdown-item" href="/admin/users"><i class="p-1 fas fa-users"></i> Gebruikers</a>
                            @endif
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/user/password"><i class="p-1 fas fa-key"></i> Nieuw wachtwoord</a>
                            <a class="dropdown-item" href="/user/profile"><i class="p-1 fas fa-id-badge"></i> Profiel</a>

                            <a class="dropdown-item" href="/logout"><i class="p-1 fas fa-sign-out-alt"></i> Logout</a>

                        </div>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
