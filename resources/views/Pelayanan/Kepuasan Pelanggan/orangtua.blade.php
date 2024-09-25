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
                    <!-- Grafik Karakteristik Responden Chart -->
                    <canvas id="karakteristikChart" width="400" height="400"></canvas>
                
                    <!-- Heading -->
                    <h2>GRAFIK NILAI IKM</h2>
                    <!-- Grafik Nilai IKM Chart -->
                    <canvas id="ikmChart" width="400" height="400"></canvas>
                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container -->
    </section>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        let karakteristikChart, ikmChart;

        const karakteristikData = {
            2023: {
                data: [67, 33, 2.4, 30.9, 64.6, 8, 5, 42, 10, 30, 5, 24.3, 18.6, 26.5, 2.9, 26.2, 28, 54.3, 14.2, 1.5]
            },
            2022: {
                data: [67, 33, 2.4, 30.9, 64.6, 8, 5, 42, 10, 30, 5, 24.3, 18.6, 26.5, 2.9, 26.2, 28, 54.3, 14.2, 1.5]
            },
            2021: {
                data: [67, 33, 2.4, 30.9, 64.6, 8, 5, 42, 10, 30, 5, 24.3, 18.6, 26.5, 2.9, 26.2, 28, 54.3, 14.2, 1.5]
            },
            2020: {
                data: [67, 33, 2.4, 30.9, 64.6, 8, 5, 42, 10, 30, 5, 24.3, 18.6, 26.5, 2.9, 26.2, 28, 54.3, 14.2, 1.5]
            },
            2019: {
                data: [71.9, 29.9, 2.4, 30.9, 64.6, 9.5, 9.8, 44.9, 7.3, 25.3, 4.2, 24.3, 18.6, 26.5, 2.9, 26.2, 28, 54.3, 14.2, 1.5]
            }
        };

        const ikmData = {
            2023: {
                data: [3.9, 3.43, 3.47, 3.39, 3.38, 3.441, 3.443, 3.461, 3.461, 3.39, 3.37, 3.375]
            },
            2020: {
                data: [85, 84.8, 86.8, 86.1, 84.2, 86.4, 86.8, 86.9, 89, 88, 83, 84.3],
            },
            2019: {
                data: [71.9, 74.1, 74.2, 72.2, 71.6, 78.4, 76.3, 78.1, 78, 75, 76, 70.3],
            }
        };

        // Function to initialize or update charts
        function displayCharts(year) {
            const karakteristikYearData = karakteristikData[year] || { labels: [], data: [] };
            const ikmYearData = ikmData[year] || { labels: [], data: [] };

            // Destroy previous charts if they exist
            if (karakteristikChart) karakteristikChart.destroy();
            if (ikmChart) ikmChart.destroy();

            // Create the Karakteristik Chart
            const ctx1 = document.getElementById('karakteristikChart').getContext('2d');
            karakteristikChart = new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: ['Laki - Laki', 'Perempuan', '<40 Tahun', '40 - 49 Tahun', '> 50 Tahun', 'SD / MI', 'SMP/MTS', 'SMA / MA', 'Diploma', 'Sarjana', 'Pasca Sarjana', 'PNS', 'Karyawan Swasta', 'Wiraswasta', 'TNI / Polri', 'Lainnya', '< 2,5jt', '2,5 - 5jt', '5 - 10jt', '>10jt'],
                    datasets: [{
                        data: karakteristikYearData.data,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            display: false // This hides the dataset label
                        }
                    },
                    scales: {
                        y: {
                            ticks: {
                                callback: function(value) {
                                    return value + '%'; // Add "%" to the y-axis labels
                                }
                            }
                        }
                    }
                }
            });

            // Create the IKM Chart
            const ctx2 = document.getElementById('ikmChart').getContext('2d');
            ikmChart = new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: ['U1', 'U2', 'U3', 'U4', 'U5', 'U6', 'U7', 'U8', 'U9', 'U10', 'U11', 'U12'],
                    datasets: [{
                        data: ikmYearData.data,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            display: false // This hides the dataset label
                        }
                    },
                    y: {
                    beginAtZero: true
                }
                }
            });
        }

        // Display default charts (latest year) on page load
        displayCharts('2023');

        // Add event listener for the filter button
        document.getElementById('filterButton').addEventListener('click', function(event) {
            event.preventDefault();
            const selectedYear = document.getElementById('yearSelect').value;
            if (selectedYear) {
                displayCharts(selectedYear);
            }
        });
    });
    </script>
@endsection
