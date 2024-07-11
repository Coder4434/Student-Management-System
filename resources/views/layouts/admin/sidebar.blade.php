<style>
    body {
        background-color: #fbfbfb;
    }

    @media (min-width: 991.98px) {
        main {
            padding-left: 240px;
        }
    }

    .dropdown-menu.show {
        display: block;
    }

    .dropdown-item.btn-sm {
        padding: 0.25rem 0.5rem;
        /* Butonun iç dolgusunu küçültür */
        font-size: 0.875rem;
        /* Yazı boyutunu küçültür */
    }

    .dropdown-menu {
        min-width: auto;
        /* Menünün minimum genişliğini ayarlar */
    }




    .sidebar {
        background-color: rgb(1, 1, 39);
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        padding: 5px 0 0;

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

    }

    .sidebar-sticky {
        position: relative;
        top: 0;
        height: calc(100vh - 48px);
        padding-top: 0.5rem;
        overflow-x: hidden;
        overflow-y: auto;

    }


    .navbar {

        top: 0;
        right: 0;
        left: auto;
        z-index: 1000;
    }


    .navbar-brand {
        margin-right: 240px;
    }

    .dropdown-menu-end {
        right: 0;

        left: auto;
    }
</style>


<header>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-e8+YoFtjH2xQ5X8Tl7ZkC3n8OgpqQw9NgCQ0gveMqGvXo+0wAHbW4Zd7Ff8pFryQsKuRv7f8tC7xL6rZo6eGzA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">


    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
        <div class="position-sticky">
            <div class="list-group list-group-flush mx-3 mt-4">
                <a class="navbar-brand" href="#">
                    <img src="https://iste.edu.tr/files/iste_arma.png" height="75" style="margin-left:60px"
                        alt="İste" loading="lazy" />
                </a>
                <a href="{{ route('common-infos') }}"
                    class="list-group-item list-group-item-action py-2 ripple {{ Request::route()->getName() == 'common-infos' ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Admin Bilgisi</span>
                </a>
                <a href="{{ route('not-giris') }}"
                    class="list-group-item list-group-item-action py-2 ripple {{ Request::route()->getName() == 'not-giris' ? 'active' : '' }}">
                    <i class="fas fa-chart-area fa-fw me-3"></i><span>Not girişi</span>
                </a>
                <a href="{{ route('ders-islemleri') }}"
                    class="list-group-item list-group-item-action py-2 ripple {{ Request::route()->getName() == 'ders-islemleri' ? 'active' : '' }}">
                    <i class="fas fa-lock fa-fw me-3"></i><span>Ders İşlemleri</span>
                </a>
                <a href="{{ route('ogrenci-islemleri') }}"
                    class="list-group-item list-group-item-action py-2 ripple {{ Request::route()->getName() == 'ogrenci-islemleri' ? 'active' : '' }}">
                    <i class="fas fa-chart-line fa-fw me-3"></i><span>Öğrenci İşlemleri</span>
                </a>
                <a href="{{ route('sinav-takvimi') }}"
                    class="list-group-item list-group-item-action py-2 ripple {{ Request::route()->getName() == 'sinav-takvimi' ? 'active' : '' }}">
                    <i class="fas fa-chart-pie fa-fw me-3"></i><span>Sınav Takvimi</span>
                </a>
                <a href="{{ route('ders-onay') }}"
                    class="list-group-item list-group-item-action py-2 ripple {{ Request::route()->getName() == 'ders-onay' ? 'active' : '' }}">
                    <i class="fas fa-chart-bar fa-fw me-3"></i><span>Ders Onay</span>
                </a>
                <a href="{{ route('sifre-degisikligi') }}"
                    class="list-group-item list-group-item-action py-2 ripple {{ Request::route()->getName() == 'sifre-degisikligi' ? 'active' : '' }}">
                    <i class="fas fa-globe fa-fw me-3"></i><span>Şifre Değişikliği</span>
                </a>

            </div>
        </div>
    </nav>



    <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top"
        style=" color:rgb(1, 1, 39);;">

        <div class="container-fluid">
            <ul class="navbar-nav ms-auto d-flex flex-row">
                <li class="nav-item dropdown">
                    <a class="nav-link hidden-arrow d-flex align-items-center" href="#"
                        id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        <img src="https://designs.planiteasy.com/img/avatar-1-256.png" class="rounded-circle"
                            height="34" alt="Avatar" loading="lazy" />
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <a class="dropdown-item btn btn-sm"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Çıkış
                                Yap</a>
                            <form action="{{ route('logout') }}" method="POST" id="logout-form"
                                style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

    </nav>

</header>



<main style="margin-top: 58px;">
    <div class="container pt-4"></div>
</main>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropdownToggle = document.getElementById('navbarDropdownMenuLink');
        const dropdownMenu = dropdownToggle.nextElementSibling;

        dropdownToggle.addEventListener('click', function(event) {
            event.preventDefault();
            dropdownMenu.classList.toggle('show');
        });

        document.addEventListener('click', function(event) {
            if (!dropdownToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.remove('show');
            }
        });
    });
</script>
