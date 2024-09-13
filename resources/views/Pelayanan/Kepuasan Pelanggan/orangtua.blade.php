@extends('layouts.app')

@section('title', 'Kepuasan Orang Tua')

@section('content')
    <!-- Header Title -->
    <section class="pt-8 pt-md-11">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-9 col-xl-8">
                    <!-- Heading -->
                    <h1 class="display-4 text-center">Kepuasan Pelanggan</h1>
                    <!-- Text -->
                    <p class="lead mb-7 text-center text-body-secondary">ORANG TUA</p>
                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container -->
    </section>

    <!-- Content -->
    <section class="py-8 py-md-11">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <!-- Form -->
                <form class="rounded shadow" style="margin-bottom: 20px;" id="filterForm">
                    <div class="input-group input-group-lg">
                        <!-- Text -->
                        <span class="input-group-text border-0 pe-1">
                            <i class="fe fe-search"></i>
                        </span>
                        <!-- Dropdown (Select) -->
                        <select class="form-control border-0 px-1" aria-label="Pilih Tahun" id="yearSelect">
                            <option value="" disabled selected>Pilih Tahun</option>
                            <option value="2023">2023</option>
                            <option value="2022">2022</option>
                            <option value="2021">2021</option>
                            <option value="2020">2020</option>
                            <option value="2019">2019</option>
                        </select>
                        <!-- Text -->
                        <span class="input-group-text border-0 py-0 ps-1 pe-3">
                            <!-- Button -->
                            <button type="submit" class="btn btn-sm btn-primary" id="filterButton">Search</button>
                        </span>
                    </div>
                </form>
                <div class="col-12 col-md-5 order-md-2">
                    <!-- Heading -->
                    <h2>KARAKTERISTIK RESPONDEN</h2>
                    <!-- Figure 1 -->
                    <figure class="figure mb-7">
                        <img class="figure-img img-fluid rounded lift lift-lg" src="{{ asset('assets/img/kepuasan pelanggan/orangtua/Karakteristik_2023.png') }}" alt="Tidak Ada Informasi">
                    </figure>

                    <!-- Heading -->
                    <h2>UNSUR PELAYANAN</h2>
                    <!-- Figure 2 -->
                    <figure class="figure mb-7">
                        <img class="figure-img img-fluid rounded lift lift-lg" src="{{ asset('assets/img/kepuasan pelanggan/orangtua/Pelayanan_2023.png') }}" alt="Tidak Ada Informasi">
                    </figure>
                </div>
                <div class="col-12 col-md-5 order-md-2">
                    <!-- Heading -->
                    <h2>GRAFIK KARAKTERISTIK RESPONDEN</h2>
                    <!-- Figure 3 -->
                    <figure class="figure mb-7">
                        <img class="figure-img img-fluid rounded lift lift-lg" src="{{ asset('assets/img/kepuasan pelanggan/orangtua/Grafik_Karakteristik_2023.png') }}" alt="Tidak Ada Informasi">
                    </figure>

                    <!-- Heading -->
                    <h2>GRAFIK NILAI IKM</h2>
                    <!-- Figure 4-->
                    <figure class="figure mb-7">
                        <img class="figure-img img-fluid rounded lift lift-lg" src="{{ asset('assets/img/kepuasan pelanggan/orangtua/Grafik_IKM_2023.png') }}" alt="Tidak Ada Informasi">
                    </figure>
                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container -->
    </section>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Display the default images (latest year) on page load
            displayImages('2023');

            // Add event listener for the filter button
            document.getElementById('filterButton').addEventListener('click', function(event) {
                // Prevent the default form submission
                event.preventDefault();

                const selectedYear = document.getElementById('yearSelect').value;
                displayImages(selectedYear);
            });
        });

        // Function to display images based on the selected year
        function displayImages(year) {
            // Update the src for each image based on the year
            document.querySelector("img[src*='Karakteristik_']").src = `{{ asset('assets/img/kepuasan pelanggan/orangtua/Karakteristik_${year}.png') }}`;
            document.querySelector("img[src*='Pelayanan_']").src = `{{ asset('assets/img/kepuasan pelanggan/orangtua/Unsur_Pelayanan_${year}.png') }}`;
            document.querySelector("img[src*='Grafik_Karakteristik_']").src = `{{ asset('assets/img/kepuasan pelanggan/orangtua/Grafik_Karakteristik_${year}.png') }}`;
            document.querySelector("img[src*='Grafik_IKM_']").src = `{{ asset('assets/img/kepuasan pelanggan/orangtua/Grafik_IKM_${year}.png') }}`;
        }
    </script>
@endsection
