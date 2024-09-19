
@extends('layouts.app')

@section('title', 'Kepuasan Mahasiswa')

@section('content')
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
      max-width: 800px;
      margin: 0 auto;
      margin-bottom: 40px;
      flex-wrap: wrap;
    }

    .box {
      background-color: #B5D3FF;
      border-radius: 15px;
      padding: 10px;
      margin: 10px;
      text-align: left;
      flex: 3;
      min-width: 250px;
      max-width: 400px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      display: flex;
      flex-direction: column;
      align-items: center;
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
      flex-wrap: wrap;
      gap: 20px;
    }

    .bottom-row {
      display: flex;
      justify-content: left;
      margin-top: 20px;
    }

    h3 {
      margin: 40px 0;
      font-weight: bold;
    }

    .box h3,
    .box-bawah h3 {
      margin-left: 10px;
    }


    ol {
      padding-left: 20px;
      margin: 0;
    }

    ol li {
      margin-bottom: 10px;
    }

    .box-bawah {
      background-color: #B5D3FF;
      border-radius: 15px;
      padding: 10px;
      margin: 10px;
      flex: 3;
      width: 250px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      display: flex;
      flex-direction: column;
      align-items: left;
    }

    

    .custom-image {
      width: 100%;
      height: 150px;
      object-fit: cover;
      border-radius: 15px;
      margin-bottom: 10px;
    }

    .left-list {
      float: left;
      width: 45%;
      margin-left: 20px;
    }

    .right-list {
      float: right;
      width: 45%;
      margin-left: 20px;
    }

    .judul span:first-child {
      font-size: 18px;
      color: #FAD776;
      font-weight: bold;
      display: block;
      margin-bottom: 10px;
    }

    .judul span:nth-child(2) {
      font-size: 34px;

      margin-right: 5px;
    }

    .box:hover {
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      background-color: #C5E1F5;
      transition: all 0.3s ease-in-out;
    }

    .box-bawah:hover {
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      background-color: #C5E1F5;
      transition: all 0.3s ease-in-out;
    }
  </style>
</head>

<body>
  

  <h1 class="judul text-center">
    <span>SPMI</span>
    <span>Standart Kualitas Internal</span>
  </h1>

  <!-- Text -->
  <p class="lead mb-7 text-center text-body-secondary">
    Berikut Sistem Penjaminan Mutu Internal di Politeknik Negeri Malang
  </p>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-md-10 col-lg-9 col-xl-8">

        <!-- Heading -->


      </div>
    </div> <!-- / .row -->

    <!-- Section for Boxes -->
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="top-row">
          <div class="box">
            <img src="./assets/img/polinema.png" alt="Gambar 1">
            <h3>8 Standar Pembelajaran</h3>
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
            <img src="./assets/img/polinema.png" alt="Gambar 2">
            <h3>8 Standar Penelitian</h3>
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
            <img src="./assets/img/polinema.png" alt="Gambar 3">
            <h3>8 Standar Pelajaran Masyarakat</h3>
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
          <div class="box-bawah">
            <img src="./assets/img/polinema.png" alt="Gambar 4" class="custom-image">
            <h3>18 Standar Internal Deriatif</h3>
            <ol>
              <li class="left-list">Perpustakaan</li>
              <li class="left-list">Sistem Informasi</li>
              <li class="left-list">Penerimaan Siswa</li>
              <li class="left-list">Kemahasiswaan</li>
              <li class="left-list">Proses Kelulusan</li>
              <li class="left-list">Alumni</li>
              <li class="left-list">Visi, Misi, Sasaran, dan Sasaran</li>
              <li class="left-list">Sehat</li>
              <li class="left-list">Jaminan Kualitas</li>
              <li class="left-list">Manajemen Institusi/Organisasi</li>
              <li class="left-list">Kerjasama</li>
              <li class="left-list">Kesejahteraan</li>
              <li class="left-list">Transfer</li>
              <li class="left-list">Pengalaman Belajar Sebelumnya</li>
              <li class="left-list">Kompetensi Bahasa Inggris Lulusan</li>
              <li class="left-list">E-Learning</li>
              <li class="left-list">Kompetensi Kerja Nasional</li>
              <li class="left-list">Kompetensi Aplikasi Perkantoran Lulusan</li>
            </ol>
          </div>
        </div>
      </div>
    </div> <!-- / .row -->

  </div> <!-- / .container -->


  <!-- Icons -->


</body>

</html>
@endsection