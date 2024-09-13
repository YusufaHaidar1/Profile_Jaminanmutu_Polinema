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
                        <img class="figure-img img-fluid rounded lift lift-lg" src="{{ asset('assets/img/kepuasan pelanggan/dosen&staff/hrm/Unsur_IKM_2023.png') }}" id="unsurImage" alt="Tidak Ada Informasi">
                    </figure>
                </div>
                <div class="col-12 col-md-6 order-md-1">
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
                                            GRAFIK PROSENTASE KEPUASAN DOSEN
                                        </p>
                                        <!-- Image Container -->
                                        <div id="imageContainer" class="figure" style="background-color: #B5D3FF; margin: 0; padding: 0;">
                                            <img id="dosenImage" src="{{ asset('assets/img/kepuasan pelanggan/dosen&staff/hrm/Dosen_2023.png') }}" alt="Tidak Ada Informasi" class="figure-img img-fluid rounded" style="display: block; margin: 0; padding: 0; border: none;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- List group -->
                            <div id="staffSection" class="list-group list-group-flush">
                                <div class="list-group-item d-flex align-items-center" style="background-color: #B5D3FF;">
                                    <div class="me-auto">
                                        <!-- Heading -->
                                        <p id="staffHeading" class="fw-bold mb-1 text-center" style="background-color: #B5D3FF;">
                                            GRAFIK PROSENTASE KEPUASAN STAFF
                                        </p>
                                        <!-- Image Container -->
                                        <div id="imageContainer" class="figure" style="background-color: #B5D3FF; margin: 0; padding: 0;">
                                            <img id="tendikImage" src="{{ asset('assets/img/kepuasan pelanggan/dosen&staff/hrm/Tendik_2023.png') }}" alt="Tidak Ada Informasi" class="figure-img img-fluid rounded" style="display: block; margin: 0; padding: 0; border: none;">
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
        displayImages('2023', 'default');
        
        // Add event listener for the filter button
        document.getElementById('filterButton').addEventListener('click', function(event) {
            // Prevent the default form submission
            event.preventDefault();
            
            const selectedYear = document.getElementById('yearSelect').value;
            const selectedCategory = document.getElementById('categorySelect').value;
            
            // Display images based on selected category and year
            if (selectedYear && selectedCategory) {
                displayImages(selectedYear, selectedCategory);
            } else {
                // If no selection, clear the images and headings
                clearImages();
            }
        });
    });

    // Function to display the images based on the selected category and year
    function displayImages(year, category) {
        const baseDirectory = category === 'default' ? '' : `assets/img/kepuasan pelanggan/dosen&staff/${category}`;
        
        // Set image for UNSUR IKM
        const unsurImageFilename = category === 'default' ? '' : `Unsur_IKM_${year}.png`;
        const unsurImageSrc = unsurImageFilename ? `{{ asset('${baseDirectory}/${unsurImageFilename}') }}` : '';
        const unsurImage = document.getElementById('unsurImage');
        unsurImage.src = unsurImageSrc;

        // Debugging
        console.log('UNSUR IKM Image Path:', unsurImageSrc);

        // Set image for KEPUASAN DOSEN
        const dosenImageFilename = category === 'default' ? '' : `Dosen_${year}.png`;
        const dosenImageSrc = dosenImageFilename ? `{{ asset('${baseDirectory}/${dosenImageFilename}') }}` : '';
        const dosenImage = document.getElementById('dosenImage');
        dosenImage.src = dosenImageSrc;

        // Debugging
        console.log('KEPUASAN DOSEN Image Path:', dosenImageSrc);

        // Set image for KEPUASAN STAFF and check if it exists
        const tendikImageFilename = category === 'default' ? '' : `Tendik_${year}.png`;
        const tendikImageSrc = tendikImageFilename ? `{{ asset('${baseDirectory}/${tendikImageFilename}') }}` : '';
        const tendikImage = new Image();
        tendikImage.src = tendikImageSrc;

        // Debugging
        console.log('KEPUASAN STAFF Image Path:', tendikImageSrc);

        tendikImage.onload = function() {
            document.getElementById('tendikImage').src = tendikImage.src;
            document.getElementById('staffSection').style.display = 'block';
            document.getElementById('dosenHeading').textContent = 'GRAFIK PROSENTASI KEPUASAN DOSEN';
        };
        tendikImage.onerror = function() {
            // Hide the staff section if the image is not found
            document.getElementById('staffSection').style.display = 'none';
            // Update the heading if staff section is hidden
            document.getElementById('dosenHeading').textContent = 'GRAFIK PROSENTASI KEPUASAN DOSEN & STAFF';
        };
    }

    // Function to clear all images and headings
    function clearImages() {
        // Clear UNSUR IKM image
        document.getElementById('unsurImage').src = '';
        
        // Clear KEPUASAN DOSEN image
        document.getElementById('dosenImage').src = '';
        
        // Hide KEPUASAN STAFF section
        document.getElementById('staffSection').style.display = 'none';
        
        // Set default heading text for KEPUASAN DOSEN
        document.getElementById('dosenHeading').textContent = '';
    }
</script>
@endsection
