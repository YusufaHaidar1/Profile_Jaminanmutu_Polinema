@extends('layouts.app')

@section('title', 'Kepuasan Mitra')

@section('content')
    <!-- Content -->
    <section class="py-6 py-md-6">
        <div class="">
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
