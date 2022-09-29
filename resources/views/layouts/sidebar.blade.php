<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 px-2">

        {{-- <div>
            <img src="avatar.png" class="avatar rounded-circle mx-auto mb-3 mt-2 d-block img-fluid"
                style="max-width: 70%;" alt="foto-user">

            <p class="text-center mb-0">Ferdy Hahan Pradana</p>
            <a href="#" class="text-decoration-none">
                <p class="text-center">Update profil</p>
            </a>

        </div> --}}
        <div class="menu">
            <h3 class="fw-bold" style="margin-left: 16px">Menu</h3>
        </div>
        <div class="border-bottom my-2 mx-2"></div>
        {{-- <div></div> --}}
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('surat') ? 'active' : '' }}" aria-current="page" href="../surat">
                    <i class="bi bi-star-fill"></i>
                    Arsip
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="../about">
                    <i class="bi bi-info-circle-fill"></i>
                    About
                </a>
            </li>
        </ul>
    </div>
</nav>