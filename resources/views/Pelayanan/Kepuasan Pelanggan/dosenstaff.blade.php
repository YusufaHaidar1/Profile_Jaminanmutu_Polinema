@extends('layouts.app')

@section('title', 'Kepuasan Dosen & Staff Pendidikan')

@section('content')
    <!-- Header Title -->
    <section class="pt-8 pt-md-11">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-9 col-xl-8">
                    <!-- Heading -->
                    <h1 class="display-4 text-center">Kepuasan Pelanggan</h1>
                    <!-- Text -->
                    <p class="lead mb-7 text-center text-body-secondary">DOSEN & STAFF</p>
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
                    <h2>UNSUR IKM</h2>
                    <!-- Figure -->
                    <figure class="figure mb-7">
                        <img class="figure-img img-fluid rounded lift lift-lg" src="{{ asset('') }}" id="unsurImage" alt="Tidak Ada Informasi">
                    </figure>
                </div>
                <div class="col-12 col-md-10 col-lg-7">
                    <!-- Card -->
                    <div class="card card-border shadow-lg" style="background-color: #B5D3FF;">
                        <div class="card-body">
                            <!-- Form -->
                            <form class="rounded shadow" style="margin-bottom: 20px;" id="filterForm">
                                <div class="input-group input-group-lg mb-2">
                                    <!-- Text -->
                                    <span class="input-group-text border-0 pe-1">
                                        <i class="fe fe-search"></i>
                                    </span>
                                    
                                    <!-- Dropdown (Select) -->
                                    <select class="form-control border-0 px-1" aria-label="Pilih Kategori" id="categorySelect">
                                        <option value="" disabled selected>Pilih Kategori</option>
                                        <option value="hrm">Human Resource Management</option>
                                        <option value="finance">Finance Management</option>
                                        <option value="facilities">Facilities Management</option>
                                        <option value="riset">Riset Activities Management</option>
                                        <option value="community">Community Services Activities Management</option>
                                    </select>
                                </div>

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
                                        <option value="2018">2018</option>
                                        <option value="2017">2017</option>
                                    </select>
                                    <!-- Text -->
                                    <span class="input-group-text border-0 py-0 ps-1 pe-3">
                                        <!-- Button -->
                                        <button type="submit" class="btn btn-sm btn-primary" id="filterButton">Search</button>
                                    </span>
                                </div>
                            </form>
                            <!-- List group -->
                            <div id="dosenSection" class="list-group list-group-flush">
                                <div class="list-group-item d-flex align-items-center" style="background-color: #B5D3FF;">
                                    <div class="me-auto">
                                        <!-- Heading -->
                                        <p id="dosenHeading" class="fw-bold mb-1 text-center" style="background-color: #B5D3FF;">
                                            GRAFIK PROSENTASE KEPUASAN DOSEN & STAFF
                                        </p>
                                        <!-- Chart Container -->
                                        <div id="dosenChartContainer" style="background-color: #ffffff;">
                                            <canvas id="dosenChart" width="500" height="400"></canvas>
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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    let dosenChart; // Declare a global variable for the chart

    document.addEventListener('DOMContentLoaded', function() {
        const dataByCategoryAndYear = {
            hrm: {
                2023: [3.28, 3.25, 3.39, 3.4, 3.23, 3.12, 3.10, 3.34, 3.45, 3.3, 3.32, 3.34, 3.35],
                2022: [3.45, 3.53, 3.5, 3.49, 3.5, 3.49, 3.55, 3.5, 3.47, 3.5],
                2021: [3.28, 3.24, 3.4, 3.4, 3.23, 3.13, 3.13, 3.35, 3.47, 3.32],
                2020: [3.74, 3.7, 3.7, 3.8, 3.76, 3.6, 3.5, 3.7, 3.85, 3.8],
            },
            finance: {
                2023: [3.41, 3.39, 3.24, 3.21, 3.27, 3.34, 3.19, 3.19, 3.19, 3.31],
                2022: [3.49, 3.52, 3.5, 3.45, 3.48, 3.45, 3.47, 3.5, 3.44, 3.46],
                2021: [3.35, 3.35, 3.38, 3.44, 3.32, 3.2, 3.2, 3.4, 3.44, 3.41],
                2020: [3.74, 3.7, 3.7, 3.8, 3.76, 3.6, 3.5, 3.7, 3.85, 3.8]
            },
            facilities: {
                2023: [3.23, 3.52, 3.53, 3.54, 3.54, 3.55, 3.50, 3.42, 3.49],
                2022: [3.57, 3.48, 3.56, 3.55, 3.50, 3.52, 3.47, 3.53, 3.52],
                2021: [3.27, 3.34, 3.30, 3.36, 3.20, 3.24, 3.24, 3.35, 3.29]
            },
            riset: {
                2023: [3.4, 3.43, 3.41, 3.45, 3.36, 3.53, 3.52, 3.52, 3.54, 3.46, 3.47, 3.44, 3.46],
                2022: [3.47, 3.44, 3.49, 3.51, 3.48, 3.45, 3.49, 3.54, 3.49, 3.5, 3.51, 3.52, 3.49],
                2021: [3.51, 3.51, 3.51, 3.54, 3.56, 3.49, 3.41, 3.48, 3.40, 3.44, 3.41, 3.43, 3.38]
            },
            community: {
                2023: [3.4, 3.42, 3.31, 3.44, 3.33],
                2022: [3.48, 3.48, 3.54, 3.03, 3.5, 3.54, 3.47, 3.48, 3.55, 3.5, 3.53, 3.5, 3.54],
                2021: [3.55, 3.55, 3.53, 3.56, 3.48, 3.49, 3.46, 3.48, 3.43, 3.45, 3.32, 3.47, 3.35]
            }
        };

        function updateUnsurImage(category, year) {
        const imageBasePath = '{{ asset('assets/img/kepuasan pelanggan') }}';
        const categoryFolder = encodeURIComponent('dosen&staff'); // encode the folder name
        const imagePath = `${imageBasePath}/${categoryFolder}/${category}/Unsur_IKM.png`;
        console.log("Image Path:", imagePath);
        document.getElementById('unsurImage').src = imagePath;
        }

        // Event listener for the filter button
        document.getElementById('filterButton').addEventListener('click', function(event) {
            event.preventDefault();

            const selectedYear = document.getElementById('yearSelect').value;
            const selectedCategory = document.getElementById('categorySelect').value;

            if (selectedYear && selectedCategory) {
                displayChart(selectedCategory, selectedYear);
                updateUnsurImage(selectedCategory, selectedYear);
            }
        });

        function displayChart(category, year) {
            const data = dataByCategoryAndYear[category][year] || [];

            // Clear the previous chart instance if it exists
            if (dosenChart) {
                dosenChart.destroy();
            }

            // Create a new chart
            const ctx = document.getElementById('dosenChart').getContext('2d');
            dosenChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['U1', 'U2', 'U3', 'U4', 'U5', 'U6', 'U7', 'U8', 'U9', 'U10', 'U11', 'U12', 'U13'],
                    datasets: [{
                        label: 'Prosentase Kepuasan Dosen & Staff',
                        data: data,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: false,
                            min: 3.0,
                            max: 4.0,
                            ticks: {
                                stepSize: 0.1
                            }
                        }
                    }
                }
            });
        }
    });

    // Function to clear charts and reset the Unsur IKM image
    function clearCharts() {
        if (dosenChart) dosenChart.destroy();
        document.getElementById('unsurImage').src = '';
    }
</script>
@endsection
