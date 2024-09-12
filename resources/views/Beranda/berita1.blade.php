<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita</title>
    <!-- Add other head elements -->
</head>
<body>
    {{-- Include the header --}}
    @include('header')

    {{-- Your main content goes here --}}
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
      
                <!-- Figure -->
                <figure class="figure mb-7">
                    <img class="figure-img img-fluid rounded lift lift-lg" src="assets/img/berita/berita1.png" alt="...">
                </figure>

                <!-- Heading -->
                <h2 class="fw-bold">
                    POLINEMA Terakreditasi Internasional ASIC
                </h2>

                <time class="fs-sm text-body-secondary">
                    Posted on 29 Desember 2022 by Priantina
                </time>
      
                <!-- Text -->
                <p style="text-align: justify;">
                    20 Program Studi di Politeknik Negeri Malang meraih predikat Premier Institution dari Lembaga Akreditasi Internasional ASIC (Accreditation Service for International Schools, Colleges, and Universities). Visitasi dilaksakan pada tanggal 15-17 November 2022, dan dihadiri oleh CEO ASIC, Lee Hammond dan Geoff Boston. Dengan diraihnya peringkat Premier ini diharapkan POLINEMA akan bisa bersaing di kawasan global.
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
                        <img src="./assets/img/icons/social/instagram.svg" class="list-social-icon" alt="...">
                      </a>
                    </li>
                    <li class="list-inline-item list-social-item me-3">
                      <a href="#!" class="text-decoration-none">
                        <img src="./assets/img/icons/social/facebook.svg" class="list-social-icon" alt="...">
                      </a>
                    </li>
                    <li class="list-inline-item list-social-item me-3">
                      <a href="#!" class="text-decoration-none">
                        <img src="./assets/img/icons/social/twitter.svg" class="list-social-icon" alt="...">
                      </a>
                    </li>
                </ul>
                </div>
                </div>
              </div> <!-- / .row -->
            </div> <!-- / .container -->
          </section>
    {{-- Include the footer --}}
    @include('footer')
</body>
</html>