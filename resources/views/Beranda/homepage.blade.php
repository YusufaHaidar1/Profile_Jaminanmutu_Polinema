@extends('layouts.app')

@section('title', 'Home page')

@section('content')
    <!-- Content -->
    <section class="py-6 py-md-6">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <div class="col-12 col-md-6 order-md-2">
                    <img class="figure-img img-fluid rounded" src="{{ asset('assets/img/beranda/image.png') }}"
                        alt="Tidak Ada Informasi">
                </div>
                <div class="col-12 col-md-6 order-md-1 px-10 py-8">
                    <div class="row">
                        <h1 style="font-weight: bold; font-size: 50px;">
                            Pusat Penjaminan Mutu dan Pengembangan Pembelajaran
                            <span style="color: #FAD776;">(P2MPP)</span>
                        </h1>
                    </div>
                    <div class="row"
                        style="background-color: #F5C149; text-align: center;
                            border: none; border-radius: 8px; display: flex; width: 30%;
                            margin: 4px 2px;
                            cursor: pointer; padding: 5px 10px;">
                        <div class="col">
                            <a class="button"
                                style="
                            color: white;
                            text-decoration: none;
                            font-size: 16px;
                            ">Selengkapnya</a>
                            <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.624 6.30009H0.695598C0.511114 6.30009 0.334186 6.37383 0.203736 6.50509C0.0732862 6.63635 0 6.81437 0 7C0 7.18563 0.0732862 7.36365 0.203736 7.49491C0.334186 7.62617 0.511114 7.69991 0.695598 7.69991H13.624L8.55029 12.8037C8.41968 12.9351 8.3463 13.1133 8.3463 13.2992C8.3463 13.4851 8.41968 13.6633 8.55029 13.7947C8.68091 13.9262 8.85806 14 9.04278 14C9.22749 14 9.40464 13.9262 9.53526 13.7947L15.7956 7.49554C15.8604 7.43052 15.9118 7.35328 15.9469 7.26825C15.9819 7.18322 16 7.09206 16 7C16 6.90794 15.9819 6.81678 15.9469 6.73175C15.9118 6.64671 15.8604 6.56948 15.7956 6.50446L9.53526 0.205258C9.40464 0.0738335 9.22749 0 9.04278 0C8.85806 0 8.68091 0.0738335 8.55029 0.205258C8.41968 0.336683 8.3463 0.514933 8.3463 0.700796C8.3463 0.886658 8.41968 1.06491 8.55029 1.19633L13.624 6.30009Z"
                                    fill="white" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div> <!-- / .row -->

            <div class="container mt-5">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div class="d-flex align-items-center justify-content-center rounded"
                            style="background-color: #1B2A4E; height: 50px;">
                            <h3 class="text-center text-white">Data & Statistik</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="card h-100">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <h1 class="card-title text-center mb-4 fw-bolder">99</h1>
                                <div class="d-flex align-items-center justify-content-center rounded"
                                    style="background-color: #8ECAE6; height: 50px;">
                                    <h3 class="text-center text-white">Jurusan</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card h-100">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <h1 class="card-title text-center mb-4 fw-bolder">99</h1>
                                <div class="d-flex align-items-center justify-content-center rounded"
                                    style="background-color: #8ECAE6; height: 50px;">
                                    <h3 class="text-center text-white">Program Studi</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card h-100">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <h1 class="card-title text-center mb-4 fw-bolder">99</h1>
                                <div class="d-flex align-items-center justify-content-center rounded"
                                    style="background-color: #8ECAE6; height: 50px;">
                                    <h3 class="text-center text-white">Mahasiswa</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="container-fluid" style="background-color: #1B2A4E; height: 350px;">
                <div class="container">
                    <h1 class="text-center text-light mb-7 pt-3">Sistem Informasi Jaminan Mutu <span
                            style="color: #FAD776; font-weight: normal; ">(SIJAMU)</span></h1>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card text-light rounded-4" style="background-color: #5A80B5;">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48"
                                            fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 7a.5.5 0 0 1 .5.5v5.777a.5.5 0 0 1-.5.5H5a.5.5 0 0 1-.5-.5v-5.777a.5.5 0 0 1 .5-.5zm2.5.854v3.889c0 .276.226.5.5.5h3.717c.276 0 .5-.224.5-.5V8.854c0-.276-.224-.5-.5-.5H8.5z" />
                                            <path
                                                d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                                        </svg>
                                    </div>
                                    <h5 class="fw-bolder card-title text-center">Kuisioner Alumni</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-light rounded-4" style="background-color: #5A80B5;">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48"
                                            fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 7a.5.5 0 0 1 .5.5v5.777a.5.5 0 0 1-.5.5H5a.5.5 0 0 1-.5-.5v-5.777a.5.5 0 0 1 .5-.5zm2.5.854v3.889c0 .276.226.5.5.5h3.717c.276 0 .5-.224.5-.5V8.854c0-.276-.224-.5-.5-.5H8.5z" />
                                            <path
                                                d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                                        </svg>
                                    </div>
                                    <h5 class="fw-bolder card-title text-center">Audit Internal</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-light rounded-4" style="background-color: #5A80B5;">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48"
                                            fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 7a.5.5 0 0 1 .5.5v5.777a.5.5 0 0 1-.5.5H5a.5.5 0 0 1-.5-.5v-5.777a.5.5 0 0 1 .5-.5zm2.5.854v3.889c0 .276.226.5.5.5h3.717c.276 0 .5-.224.5-.5V8.854c0-.276-.224-.5-.5-.5H8.5z" />
                                            <path
                                                d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                                        </svg>
                                    </div>
                                    <h5 class="fw-bolder card-title text-center">Document Quality Assurance</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-light rounded-4" style="background-color: #5A80B5;">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48"
                                            fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 7a.5.5 0 0 1 .5.5v5.777a.5.5 0 0 1-.5.5H5a.5.5 0 0 1-.5-.5v-5.777a.5.5 0 0 1 .5-.5zm2.5.854v3.889c0 .276.226.5.5.5h3.717c.276 0 .5-.224.5-.5V8.854c0-.276-.224-.5-.5-.5H8.5z" />
                                            <path
                                                d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                                        </svg>
                                    </div>
                                    <h5 class="fw-bolder card-title text-center">Kuisioner Mitra</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row py-10 justify-content-center">
                <div class="col-3 mx-3">
                    <div class="card shadow-lg">
                        <img class="card-img-top" src="{{ asset('assets/img/berita/berita1.png') }}" style="width: 100%;"
                            alt="Tidak Ada Informasi">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                                <img src="{{ asset('assets/img/berita/berita1.png') }}" class="rounded-circle"
                                    alt="Profil" width="50" height="50">
                                <h3 class="px-2 mb-0"><span class="text-muted">Oleh</span> Pritantina</h3>
                                <p class="mb-0 text-muted ms-auto">07 August</p>
                            </div>
                            <h3 class="fw-bold mt-2">Polinema Terakreditasi Internasional ASIC</h3>
                            <div class="d-flex  cursor-pointer">
                                <a class="pe-2 text-decoration-none" href="#">Selengkapnya
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11.921 6.38758H0.608648C0.447225 6.38758 0.292413 6.4521 0.178269 6.56695C0.0641254 6.6818 0 6.83757 0 7C0 7.16242 0.0641254 7.3182 0.178269 7.43305C0.292413 7.5479 0.447225 7.61242 0.608648 7.61242H11.921L7.48151 12.0782C7.36722 12.1932 7.30301 12.3492 7.30301 12.5118C7.30301 12.6744 7.36722 12.8304 7.48151 12.9454C7.59579 13.0604 7.7508 13.125 7.91243 13.125C8.07406 13.125 8.22906 13.0604 8.34335 12.9454L13.8212 7.4336C13.8779 7.37671 13.9228 7.30912 13.9535 7.23472C13.9842 7.16032 14 7.08055 14 7C14 6.91945 13.9842 6.83968 13.9535 6.76528C13.9228 6.69088 13.8779 6.62329 13.8212 6.5664L8.34335 1.0546C8.22906 0.939604 8.07406 0.875 7.91243 0.875C7.7508 0.875 7.59579 0.939604 7.48151 1.0546C7.36722 1.1696 7.30301 1.32557 7.30301 1.4882C7.30301 1.65083 7.36722 1.80679 7.48151 1.92179L11.921 6.38758Z"
                                            fill="#5A80B5" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-3 mx-3">
                    <div class="card shadow-lg">
                        <img class="card-img-top" src="{{ asset('assets/img/berita/berita1.png') }}" style="width: 100%;"
                            alt="Tidak Ada Informasi">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                                <img src="{{ asset('assets/img/berita/berita1.png') }}" class="rounded-circle"
                                    alt="Profil" width="50" height="50">
                                <h3 class="px-2 mb-0"><span class="text-muted">Oleh</span> Pritantina</h3>
                                <p class="mb-0 text-muted ms-auto">07 August</p>
                            </div>
                            <h3 class="fw-bold mt-2">Polinema Terakreditasi Internasional ASIC</h3>
                            <div class="d-flex  cursor-pointer">
                                <a class="pe-2 text-decoration-none" href="#">Selengkapnya
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11.921 6.38758H0.608648C0.447225 6.38758 0.292413 6.4521 0.178269 6.56695C0.0641254 6.6818 0 6.83757 0 7C0 7.16242 0.0641254 7.3182 0.178269 7.43305C0.292413 7.5479 0.447225 7.61242 0.608648 7.61242H11.921L7.48151 12.0782C7.36722 12.1932 7.30301 12.3492 7.30301 12.5118C7.30301 12.6744 7.36722 12.8304 7.48151 12.9454C7.59579 13.0604 7.7508 13.125 7.91243 13.125C8.07406 13.125 8.22906 13.0604 8.34335 12.9454L13.8212 7.4336C13.8779 7.37671 13.9228 7.30912 13.9535 7.23472C13.9842 7.16032 14 7.08055 14 7C14 6.91945 13.9842 6.83968 13.9535 6.76528C13.9228 6.69088 13.8779 6.62329 13.8212 6.5664L8.34335 1.0546C8.22906 0.939604 8.07406 0.875 7.91243 0.875C7.7508 0.875 7.59579 0.939604 7.48151 1.0546C7.36722 1.1696 7.30301 1.32557 7.30301 1.4882C7.30301 1.65083 7.36722 1.80679 7.48151 1.92179L11.921 6.38758Z"
                                            fill="#5A80B5" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-3 mx-3">
                    <div class="card shadow-lg">
                        <img class="card-img-top" src="{{ asset('assets/img/berita/berita1.png') }}" style="width: 100%;"
                            alt="Tidak Ada Informasi">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                                <img src="{{ asset('assets/img/berita/berita1.png') }}" class="rounded-circle"
                                    alt="Profil" width="50" height="50">
                                <h3 class="px-2 mb-0"><span class="text-muted">Oleh</span> Pritantina</h3>
                                <p class="mb-0 text-muted ms-auto">07 August</p>
                            </div>
                            <h3 class="fw-bold mt-2">Polinema Terakreditasi Internasional ASIC</h3>
                            <div class="d-flex  cursor-pointer">
                                <a class="pe-2 text-decoration-none" href="#">Selengkapnya
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11.921 6.38758H0.608648C0.447225 6.38758 0.292413 6.4521 0.178269 6.56695C0.0641254 6.6818 0 6.83757 0 7C0 7.16242 0.0641254 7.3182 0.178269 7.43305C0.292413 7.5479 0.447225 7.61242 0.608648 7.61242H11.921L7.48151 12.0782C7.36722 12.1932 7.30301 12.3492 7.30301 12.5118C7.30301 12.6744 7.36722 12.8304 7.48151 12.9454C7.59579 13.0604 7.7508 13.125 7.91243 13.125C8.07406 13.125 8.22906 13.0604 8.34335 12.9454L13.8212 7.4336C13.8779 7.37671 13.9228 7.30912 13.9535 7.23472C13.9842 7.16032 14 7.08055 14 7C14 6.91945 13.9842 6.83968 13.9535 6.76528C13.9228 6.69088 13.8779 6.62329 13.8212 6.5664L8.34335 1.0546C8.22906 0.939604 8.07406 0.875 7.91243 0.875C7.7508 0.875 7.59579 0.939604 7.48151 1.0546C7.36722 1.1696 7.30301 1.32557 7.30301 1.4882C7.30301 1.65083 7.36722 1.80679 7.48151 1.92179L11.921 6.38758Z"
                                            fill="#5A80B5" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row"
                style="background-color: #F5C149; text-align: center;
                            border: none; border-radius: 8px; display: flex; width: 30%;
                            margin: 4px 2px;
                            cursor: pointer; padding: 5px 10px;">
                <div class="col">
                    <a class="button"
                        style="
                            color: white;
                            text-decoration: none;
                            font-size: 16px;
                            ">Selengkapnya</a>
                    <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M13.624 6.30009H0.695598C0.511114 6.30009 0.334186 6.37383 0.203736 6.50509C0.0732862 6.63635 0 6.81437 0 7C0 7.18563 0.0732862 7.36365 0.203736 7.49491C0.334186 7.62617 0.511114 7.69991 0.695598 7.69991H13.624L8.55029 12.8037C8.41968 12.9351 8.3463 13.1133 8.3463 13.2992C8.3463 13.4851 8.41968 13.6633 8.55029 13.7947C8.68091 13.9262 8.85806 14 9.04278 14C9.22749 14 9.40464 13.9262 9.53526 13.7947L15.7956 7.49554C15.8604 7.43052 15.9118 7.35328 15.9469 7.26825C15.9819 7.18322 16 7.09206 16 7C16 6.90794 15.9819 6.81678 15.9469 6.73175C15.9118 6.64671 15.8604 6.56948 15.7956 6.50446L9.53526 0.205258C9.40464 0.0738335 9.22749 0 9.04278 0C8.85806 0 8.68091 0.0738335 8.55029 0.205258C8.41968 0.336683 8.3463 0.514933 8.3463 0.700796C8.3463 0.886658 8.41968 1.06491 8.55029 1.19633L13.624 6.30009Z"
                            fill="white" />
                    </svg>
                </div>
            </div>
        </div> <!-- / .container -->
    </section>
@endsection
