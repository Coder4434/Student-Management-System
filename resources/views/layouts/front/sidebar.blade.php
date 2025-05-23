<!--Main Navigation-->
<style>
    body {
        background-color: #fbfbfb;
    }

    @media (min-width: 991.98px) {
        main {
            padding-left: 240px;
        }
    }

    /* Sidebar */
    .sidebar {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        padding: 58px 0 0;
        /* Height of navbar */
        box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
        width: 240px;
        z-index: 600;
    }

    @media (max-width: 991.98px) {
        .sidebar {
            width: 100%;
        }
    }

    .sidebar .active {
        border-radius: 5px;
        box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
    }

    .sidebar-sticky {
        position: relative;
        top: 0;
        height: calc(100vh - 48px);
        padding-top: 0.5rem;
        overflow-x: hidden;
        overflow-y: auto;
        /* Scrollable contents if viewport is shorter than content. */
    }
</style>
<header>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-e8+YoFtjH2xQ5X8Tl7ZkC3n8OgpqQw9NgCQ0gveMqGvXo+0wAHbW4Zd7Ff8pFryQsKuRv7f8tC7xL6rZo6eGzA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- Sidebar -->
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
        <div class="position-sticky">
            <div class="list-group list-group-flush mx-3 mt-4">
                <a href="{{ route('Genel-Bilgiler') }}"
                    class="list-group-item list-group-item-action py-2 ripple {{ Request::route()->getName() == 'Genel-Bilgiler' ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Genel Bilgiler</span>
                </a>
                <a href="{{ route('Ders-Programı') }}"
                    class="list-group-item list-group-item-action py-2 ripple {{ Request::route()->getName() == 'Ders-Programı' ? 'active' : '' }}">
                    <i class="fas fa-chart-area fa-fw me-3"></i><span>Ders Programı</span>
                </a>
                <a href="{{ route('Not') }}"
                    class="list-group-item list-group-item-action py-2 ripple {{ Request::route()->getName() == 'Not' ? 'active' : '' }}">
                    <i class="fas fa-lock fa-fw me-3"></i><span>Notlar</span>
                </a>
                <a href="{{ route('sınav-takvimi') }}"
                    class="list-group-item list-group-item-action py-2 ripple {{ Request::route()->getName() == 'sınav-takvimi' ? 'active' : '' }}">
                    <i class="fas fa-chart-line fa-fw me-3"></i><span>Sınav Takvimi</span>
                </a>
                <a href="{{ route('ders-listesi') }}"
                    class="list-group-item list-group-item-action py-2 ripple {{ Request::route()->getName() == 'ders-listesi' ? 'active' : '' }}">
                    <i class="fas fa-chart-pie fa-fw me-3"></i><span>Ders Listesi</span>
                </a>
                <a href="{{ route('ders-ekle') }}"
                    class="list-group-item list-group-item-action py-2 ripple {{ Request::route()->getName() == 'ders-ekle' ? 'active' : '' }}">
                    <i class="fas fa-chart-bar fa-fw me-3"></i><span>Ders Ekle</span>
                </a>
                <a href="{{ route('my-route') }}"
                    class="list-group-item list-group-item-action py-2 ripple {{ Request::route()->getName() == 'my-route' ? 'active' : '' }}">
                    <i class="fas fa-globe fa-fw me-3"></i><span>International</span>
                </a>
                <a href="{{ route('my-route') }}"
                    class="list-group-item list-group-item-action py-2 ripple {{ Request::route()->getName() == 'my-route' ? 'active' : '' }}">
                    <i class="fas fa-building fa-fw me-3"></i><span>Partners</span>
                </a>
                <a href="{{ route('my-route') }}"
                    class="list-group-item list-group-item-action py-2 ripple {{ Request::route()->getName() == 'my-route' ? 'active' : '' }}">
                    <i class="fas fa-calendar fa-fw me-3"></i><span>Calendar</span>
                </a>
                <a href="{{ route('my-route') }}"
                    class="list-group-item list-group-item-action py-2 ripple {{ Request::route()->getName() == 'my-route' ? 'active' : '' }}">
                    <i class="fas fa-users fa-fw me-3"></i><span>Users</span>
                </a>
                <a href="{{ route('my-route') }}"
                    class="list-group-item list-group-item-action py-2 ripple {{ Request::route()->getName() == 'my-route' ? 'active' : '' }}">
                    <i class="fas fa-money-bill fa-fw me-3"></i><span>Sales</span>
                </a>
            </div>
        </div>
    </nav>
    <!-- Sidebar -->

    <!-- Navbar -->
    <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-collapse-init data-mdb-target="#sidebarMenu"
                aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Brand -->
            <a class="navbar-brand" href="#">
                <img src="https://iste.edu.tr/files/iste_arma.png" height="55" style="margin-left:40px"
                    alt="İskenderun Teknik" loading="lazy" />
            </a>
            <!-- Search form -->
            <form class="d-none d-md-flex input-group w-auto my-auto">
                <input autocomplete="off" type="search" class="form-control rounded"
                    placeholder='Search (ctrl + "/" to focus)' style="min-width: 225px;" />
                <span class="input-group-text border-0"><i class="fas fa-search"></i></span>
            </form>

            <!-- Right links -->
            <ul class="navbar-nav ms-auto d-flex flex-row">
                <!-- Notification dropdown -->
                <li class="nav-item dropdown">
                    <a data-mdb-dropdown-init class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow" href="#"
                        id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bell"></i>
                        <span class="badge rounded-pill badge-notification bg-danger">1</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <a class="dropdown-item" href="#">Some news</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Another news</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </li>
                    </ul>
                </li>

                <!-- Icon -->
                <li class="nav-item">
                    <a class="nav-link me-3 me-lg-0" href="#">
                        <i class="fas fa-fill-drip"></i>
                    </a>
                </li>
                <!-- Icon -->
                <li class="nav-item me-3 me-lg-0">
                    <a class="nav-link" href="#">
                        <i class="fab fa-github"></i>
                    </a>
                </li>

                <!-- Icon dropdown -->
                <li class="nav-item dropdown">
                    <a data-mdb-dropdown-init class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow" href="#"
                        id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        <i class="flag-united-kingdom flag m-0"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="#"><i class="flag-united-kingdom flag"></i>English
                                <i class="fa fa-check text-success ms-2"></i></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"><i class="flag-poland flag"></i>Polski</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"><i class="flag-china flag"></i>中文</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"><i class="flag-japan flag"></i>日本語</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"><i class="flag-germany flag"></i>Deutsch</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"><i class="flag-france flag"></i>Français</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"><i class="flag-spain flag"></i>Español</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"><i class="flag-russia flag"></i>Русский</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"><i class="flag-portugal flag"></i>Português</a>
                        </li>
                    </ul>
                </li>

                <!-- Avatar -->
                <li class="nav-item dropdown">
                    <a data-mdb-dropdown-init class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center"
                        href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown"
                        aria-expanded="false">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img (31).webp" class="rounded-circle"
                            height="22" alt="Avatar" loading="lazy" />
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <a class="dropdown-item" href="#">My profile</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Settings</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
</header>
<!--Main Navigation-->

<!--Main layout-->
<main style="margin-top: 58px;">
    <div class="container pt-4"></div>
</main>
<!--Main layout-->
