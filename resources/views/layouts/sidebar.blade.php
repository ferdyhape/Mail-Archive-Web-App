<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 px-2">

        <div>
            <img src="{{asset('storage/' .auth()->user()->photo)}}"
                class="rounded-circle mx-auto mb-3 mt-2 d-block img-fluid" style="max-width: 70%;" alt="foto-user">

            <p class="text-center mb-0">{{ auth()->user()->name }}</p>
            <a href="/u/{{ auth()->user()->id }}/edit" class="text-decoration-none">
                <p class="text-center">Update profil</p>
            </a>

        </div>
        <div class="border-bottom my-2 mx-2"></div>
        <div></div>
        <ul class="nav flex-column ">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page"
                    href="/dashboard">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/barang*') ? 'active' : '' }}" href="/dashboard/barang">
                    <span data-feather="package"></span>
                    Barang
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/category*') ? 'active' : '' }}" href="/dashboard/category">
                    <span data-feather="tag"></span>
                    Kategori
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/transaksi-suplier*') ? 'active' : '' }}"
                    href="/dashboard/transaksi-suplier">
                    <span data-feather="shopping-cart"></span>
                    Transaksi Suplier
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">
                    <span data-feather="monitor"></span>
                    Guest Side
                </a>
            </li>
            <div class="border-bottom my-2 mx-2"></div>
            <li class="nav-item">
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="nav-link border-0 bg-transparent">
                        <i data-feather="log-out"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>
</nav>