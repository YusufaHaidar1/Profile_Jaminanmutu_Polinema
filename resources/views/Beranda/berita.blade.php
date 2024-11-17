@extends('layouts.app')
@section('title', 'Berita')

@section('content')
<section class="pt-8 pt-md-11">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-9 col-xl-8">

          <!-- Heading -->
          <h1 class="display-4 text-center">
            BERITA
          </h1>

          <!-- Text -->
          <p class="lead mb-7 text-center text-body-secondary">
            Berikut ini berita-berita terkini dari KJM Politeknik Negeri Malang 
          </p>
        </div>
    </div> <!-- / .row -->
  </div> <!-- / .container -->
</section>

<!-- SECTION -->
<section class="pt-6 pt-md-8">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-9 col-xl-8">

        <figure class="figure mb-7">
            <img class="figure-img img-fluid rounded lift lift-lg" src="{{ asset($berita->gambar) }}" alt="Berita Image">
        </figure>
        
        <!-- Heading -->
        <h2 class="fw-bold">
            {{ $berita->judul }}
        </h2>
        
        <!-- Date and Author -->
        <time class="fs-sm text-body-secondary">
            Posted on {{ \Carbon\Carbon::parse($berita->tanggal)->isoFormat('D MMMM YYYY') }} by {{ $berita->penulis }}
        </time>
        
        <!-- Text -->
        <p style="text-align: justify;">
            {{ $berita->deskripsi }}
        </p>

        <div class="row align-items-center py-5">
        <!-- Share -->
        <span class="h6 text-uppercase text-body-secondary d-none d-md-inline me-4">
            Share:
        </span>

        <!-- Icons -->
        <ul class="d-inline list-unstyled list-inline list-social">
            <li class="list-inline-item list-social-item me-3">
              <a href="#!" class="text-decoration-none">
                <img src="{{ asset('assets/img/icons/social/instagram.svg') }}" class="list-social-icon" alt="...">
              </a>
            </li>
            <li class="list-inline-item list-social-item me-3">
              <a href="#!" class="text-decoration-none">
                <img src="{{ asset('assets/img/icons/social/facebook.svg') }}" class="list-social-icon" alt="...">
              </a>
            </li>
            <li class="list-inline-item list-social-item me-3">
              <a href="#!" class="text-decoration-none">
                <img src="{{ asset('assets/img/icons/social/twitter.svg') }}" class="list-social-icon" alt="...">
              </a>
            </li>
        </ul>
        </div>
        </div>
      </div> <!-- / .row -->
    </div> <!-- / .container -->
  </section>
@endsection