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
                        <img class="figure-img img-fluid rounded lift lift-lg" src="{{ asset('assets/img/kepuasan pelanggan/mitra/Indikator.png') }}" alt="Tidak Ada Informasi">
                    </figure>
                </div>
                <div class="col-12 col-md-10 col-lg-7">
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
                                        <!-- Chart Container -->
                                        <div id="chartContainer" class="figure" style="background-color: #ffffff; margin: 0; padding: 0;">
                                            <canvas id="myBarChart" width="500" height="400"></canvas> <!-- Chart goes here -->
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
    // Define your data based on the year
    const dataByYear = {
        2023: [3.51, 3.482, 3.518, 3.479, 3.505, 3.523, 3.481, 3.55, 3.5],
        2021: [3.88, 3.85, 3.9, 3.8, 3.98, 3.98, 3.75, 3.88, 3.98],
        2020: [3.9, 3.82, 3.88, 3.82, 3.98, 3.98, 3.72, 3.84, 3.98],
        2022: [] // No data for 2022
    };

    const ctx = document.getElementById('myBarChart').getContext('2d');

    // Initialize the chart with empty data (or default to the latest year)
    let myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['U1', 'U2', 'U3', 'U4', 'U5', 'U6', 'U7', 'U8', 'U9'],
            datasets: [{
                label: 'Nilai Kepuasan Partner',
                data: [], // Empty initially
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(199, 199, 199, 0.2)',
                    'rgba(83, 102, 255, 0.2)',
                    'rgba(255, 99, 71, 0.2)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(199, 199, 199, 1)',
                    'rgba(83, 102, 255, 1)',
                    'rgba(255, 99, 71, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: false,   // Prevents the scale from starting at 0
                    min: 3.4,             // Start the Y-axis at 3.4
                    max: 4,               // End the Y-axis at 4
                    ticks: {
                    stepSize: 0.1,
                    } 
                }
            }
        }
    });

    // Function to update chart data based on selected year
    function updateChartData(year) {
        const selectedData = dataByYear[year] || [];
        myBarChart.data.datasets[0].data = selectedData; // Update data
        myBarChart.update(); // Refresh the chart
    }

    // Listen for year selection changes
    document.getElementById('yearSelect').addEventListener('change', function() {
        const selectedYear = this.value;
        updateChartData(selectedYear); // Update chart based on selected year
    });

    // Set default year to 2023
    updateChartData('2023');
</script>
@endsection
