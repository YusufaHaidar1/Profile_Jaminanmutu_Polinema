<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" href="./assets/favicon/favicon.ico" type="image/x-icon">

    <!-- Map CSS -->
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css">

    <!-- Libs CSS -->
    <link rel="stylesheet" href="./assets/css/libs.bundle.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="./assets/css/theme.bundle.css">

    <!-- Title -->
    <title>Header</title>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-white">
        <div class="container">

            <!-- Brand -->
            <a class="navbar-brand" href="./index.html">
                <img src="{{ asset('./assets/img/brand.png') }}" class="navbar-brand-img" alt="...">
            </a>

            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="navbarCollapse">

                <!-- Toggler -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fe fe-x"></i>
                </button>

                <!-- Navigation -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" id="navbarBeranda" href="/homepage" aria-haspopup="true"
                            aria-expanded="false">
                            Beranda
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarProfil" data-bs-toggle="dropdown" href="#"
                            aria-haspopup="true" aria-expanded="false">
                            Profil
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarProfil">
                            <div class="row gx-0">
                                <div class="col-1">
                                    <div class="row gx-0">
                                        <div class="col-5 col-lg-2">
                                            <!-- List -->
                                            <a class="dropdown-item" href="/visimisi"> Visi Misi </a>
                                            <a class="dropdown-item" href="/kebijakan mutu"> Kebijakan Mutu </a>
                                            <a class="dropdown-item" href="/tugas fungsi utama"> Tugas dan
                                                Fungsi Utama </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- / .row -->
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarSPMI" data-bs-toggle="dropdown" href="#"
                            aria-haspopup="true" aria-expanded="false">
                            SPMI
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarProfil">
                            <div class="row gx-0">
                                <div class="col-1">
                                    <div class="row gx-0">
                                        <div class="col-5 col-lg-2">
                                            <!-- List -->
                                            <a class="dropdown-item" href="./standarkualitas">
                                                Standar Kualitas Internal
                                            </a>
                                            <a class="dropdown-item" href="./SPMI">
                                                File SPMI
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarSPMI" data-bs-toggle="dropdown" href="#"
                            aria-haspopup="true" aria-expanded="false">
                            Akreditasi
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarProfil">
                            <div class="row gx-0">
                                <div class="col-1">
                                    <div class="row gx-0">
                                        <div class="col-5 col-lg-2">
                                            <!-- List -->
                                            <a class="dropdown-item" href="./Akreditasi">
                                                Akreditasi
                                            </a>
                                            <a class="dropdown-item" href="./Program">
                                                Program Studi
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarPelayanan" data-bs-toggle="dropdown"
                            href="#" aria-haspopup="true" aria-expanded="false">
                            Pelayanan
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarPelayanan">
                            <li class="dropdown-item dropend">
                                <a class="dropdown-link dropdown-toggle" data-bs-toggle="dropdown" href="#">
                                    Kepuasan Pelanggan
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item"
                                        href="{{ route('kepuasanpelanggan.mahasiswa') }}">Mahasiswa</a>
                                    <a class="dropdown-item"
                                        href="{{ route('kepuasanpelanggan.orangtua') }}">Orangtua</a>
                                    <a class="dropdown-item" href="{{ route('kepuasanpelanggan.dosenstaff') }}">Dosen
                                        & Staff Pendidikan</a>
                                    <a class="dropdown-item" href="{{ route('kepuasanpelanggan.mitra') }}">Mitra</a>
                                    <a class="dropdown-item" href="{{ route('kepuasanpelanggan.alumni') }}">Alumni</a>
                                </div>
                            </li>
                            <li class="dropdown-item dropend">
                                <a class="dropdown-link dropdown-toggle" data-bs-toggle="dropdown" href="#">
                                    Pelatihan
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="./Pelayanan/Pelatihan/pekerti.html">
                                        Pekerti
                                    </a>
                                    <a class="dropdown-item" href="./Pelayanan/Pelatihan/approach.html">
                                        Applied Approach
                                    </a>
                                    <a class="dropdown-item" href="./Pelayanan/Pelatihan/mediadosen.html">
                                        Perangkat & Media Pembelajaran Dosen
                                    </a>
                                    <a class="dropdown-item" href="./Pelayanan/Pelatihan/kurikulum.html">
                                        Penyusunan Kurikulum
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarSIJAMU" data-bs-toggle="dropdown"
                            href="#" aria-haspopup="true" aria-expanded="false">
                            SIJAMU
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarSIJAMU">
                            <div class="row gx-0">
                                <div class="col-1">
                                    <div class="row gx-0">
                                        <div class="col-5 col-lg-2">
                                            <!-- List -->
                                            <a class="dropdown-item" href="./SIJAMU/kalumni.html">
                                                Kuesioner Alumni
                                            </a>
                                            <a class="dropdown-item" href="./SIJAMU/audit.html">
                                                Audit Internal
                                            </a>
                                            <a class="dropdown-item" href="./SIJAMU/dckjm.html">
                                                DCKJM
                                            </a>
                                            <a class="dropdown-item" href="./SIJAMU/kmitra.html">
                                                Kuesioner Mitra
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>

                <!-- Button -->
                <a class="navbar-btn btn btn-sm btn-primary lift ms-auto"
                    href="https://themes.getbootstrap.com/product/landkit/" target="_blank">
                    Masuk
                </a>

            </div>

        </div>
    </nav>
    <!-- JAVASCRIPT -->
    <!-- Map JS -->
    <script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>

    <!-- Vendor JS -->
    <script src="./assets/js/vendor.bundle.js"></script>

    <!-- Theme JS -->
    <script src="./assets/js/theme.bundle.js"></script>

</body>

</html>
