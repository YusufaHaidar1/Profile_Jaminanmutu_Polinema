<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Standart Kualitas Internal</title>
    <!-- Add other head elements -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .box {
            background-color: #B5D3FF;
            border-radius: 15px;
            padding: 20px;
            margin: 10px;
            text-align: left; /* Align text to the left */
            flex: 1; /* Allow boxes to grow */
            min-width: 250px; /* Set minimum width to ensure readability */
            max-width: 300px; /* Set maximum width for consistent appearance */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add shadow */
            display: flex;
            flex-direction: column;
            align-items: center; /* Center align items horizontally */
        }
        .box img {
            width: 100%;
            height: auto;
            border-radius: 15px;
            margin-bottom: 10px;
        }
        .top-row {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap; /* Allow wrapping to the next line */
            gap: 20px; /* Gap between boxes */
        }
        .bottom-row {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        h3 {
            margin: 40px 0;
        }
        ol {
            padding-left: 20px;
            margin: 0;
        }
        ol li {
            margin-bottom: 10px; /* Space between list items */
        }
    </style>
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
                Standart Kualitas Internal
              </h1>
  
              <!-- Text -->
              <p class="lead mb-7 text-center text-body-secondary">
              Politeknik Negeri Malang memiliki 42 standar mutu internal,
              sebagai berikut :
              </p>
              
            </div>
          </div> <!-- / .row -->

          <!-- Section for Boxes -->
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="top-row">
                <div class="box">
                  <img src="" alt="Gambar 1">
                  <h3>Standar Pembelajaran</h3>
                  <ol>
                      <li>Kompetensi Lulusan</li>
                      <li>Konten Pembelajaran</li>
                      <li>Proses Pembelajaran</li>
                      <li>Penilaian Pembelajaran</li>
                      <li>Dosen dan Tenaga Kependidikan</li>
                      <li>Sarana dan Prasarana Pembelajaran</li>
                      <li>Manajemen Pembelajaran</li>
                      <li>Pembiayaan Pembelajaran</li>
                  </ol>
                </div>
                <div class="box">
                  <img src="" alt="Gambar 2">
                  <h3>Standar Penelitian</h3>
                  <ol>
                      <li>Hasil Penelitian</li>
                      <li>Konten Penelitian</li>
                      <li>Proses Penelitian</li>
                      <li>Penilaian Penelitian</li>
                      <li>Peneliti</li>
                      <li>Sarana dan Prasarana Penelitian</li>
                      <li>Manajemen Riset</li>
                      <li>Pendanaan dan Pembiayaan Penelitian</li>
                  </ol>
                </div>
                <div class="box">
                  <img src="" alt="Gambar 3">
                  <h3>Standar Pelajaran Masyarakat</h3>
                  <ol>
                    <li>Hasil Pengabdian kepada Masyarakat</li>
                    <li>Standar Konten untuk Pengabdian kepada Masyarakat</li>
                    <li>Proses Pengabdian kepada Masyarakat</li>
                    <li>Penilaian Pengabdian kepada Masyarakat</li>
                    <li>Pelaksana/Tim Pengabdian kepada Masyarakat</li>
                    <li>Pelayanan dan Prasarana Masyarakat</li>
                    <li>Manajemen Pengabdian kepada Masyarakat</li>
                    <li>Pendanaan dan Pembiayaan Pengabdian kepada Masyarakat</li>
                  </ol>
                </div>
              </div>

              <div class="bottom-row">
                <div class="box">
                  <img src="" alt="Gambar 4">
                  <h3>Standar Internal Deriatif</h3>
                </div>
              </div>
            </div>
          </div> <!-- / .row -->

        </div> <!-- / .container -->
    </section>
  
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

    {{-- Include the footer --}}
    @include('footer')
</body>
</html>
