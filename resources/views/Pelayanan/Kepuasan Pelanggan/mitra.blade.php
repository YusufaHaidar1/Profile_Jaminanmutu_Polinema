@extends('layouts.app')

@section('title', 'Kepuasan Mitra')

@section('content')
    <!-- Header Title -->
    <section class="pt-8 pt-md-11">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-9 col-xl-8">
                    <!-- Heading -->
                    <h1 class="display-4 text-center">Kepuasan Pelanggan</h1>
                    <!-- Text -->
                    <p class="lead mb-7 text-center text-body-secondary">MITRA</p>
                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container -->
    </section>

    <!-- Content -->
    <section class="py-8 py-md-11">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12 col-md-5 order-md-2">
                    <!-- Heading -->
                    <h2>INDIKATOR KEPUASAN PARTNER</h2>
                    <!-- Figure -->
                    <figure class="figure mb-7">
                        <img class="figure-img img-fluid rounded lift lift-lg" src="{{ asset('assets/img/kepuasan pelanggan/mitra/Indikator.png') }}" alt="...">
                    </figure>
                </div>
                <div class="col-12 col-md-6 order-md-1">
                    <!-- Card -->
                    <div class="card card-border shadow-lg" style="background-color: #B5D3FF;">
                        <div class="card-body">
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
                                    </select>
                                    <!-- Text -->
                                    <span class="input-group-text border-0 py-0 ps-1 pe-3">
                                        <!-- Button -->
                                        <button type="submit" class="btn btn-sm btn-primary" id="filterButton">Search</button>
                                    </span>
                                </div>
                            </form>
                            <!-- List group -->
                            <div class="list-group list-group-flush">
                                <div class="list-group-item d-flex align-items-center" style="background-color: #B5D3FF;">
                                    <div class="me-auto">
                                        <!-- Heading -->
                                        <p class="fw-bold mb-1 text-center" style="background-color: #B5D3FF;">
                                            GRAFIK PROSENTASE KEPUASAN PARTNER
                                        </p>
                                        <!-- Image Container -->
                                        <div id="imageContainer" class="figure" style="background-color: #B5D3FF; margin: 0; padding: 0;">
                                            <img id="filteredImage" src="{{ asset('assets/img/kepuasan pelanggan/mitra/IKM_2023.png') }}" alt="" class="figure-img img-fluid rounded" style="display: block; margin: 0; padding: 0; border: none;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container -->
    </section>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Display the default image (latest year) on page load
            displayImage('2023');
            
            // Add event listener for the filter button
            document.getElementById('filterButton').addEventListener('click', function(event) {
                // Prevent the default form submission
                event.preventDefault();
                
                const selectedYear = document.getElementById('yearSelect').value;
                displayImage(selectedYear);
            });
        });
        
        // Function to display the image based on the selected year
        function displayImage(year) {
            const imageFilename = `{{ asset('assets/img/kepuasan pelanggan/mitra/IKM_${year}.png') }}`;
            const image = document.getElementById('filteredImage');
            image.src = imageFilename;
            image.style.display = 'block'; // Ensure the image is displayed
        }
    </script>
@endsection
