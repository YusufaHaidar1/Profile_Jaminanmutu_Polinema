@extends('layouts.app')

@section('title', 'Mahasiswa Administrasi Niaga)

@section('content')
    <!-- Header Title -->
    <section class="pt-8 pt-md-11">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-9 col-xl-8">
                    <!-- Heading -->
                    <h1 class="display-4 text-center">Kepuasan Pelanggan</h1>
                    <!-- Text -->
                    <p class="lead mb-7 text-center text-body-secondary">MAHASISWA ADMINISTRASI NIAGA</p>
                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container -->
    </section>

    <!-- Content -->

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
            document.getElementById('dosenHeading').textContent = 'GRAFIK PROSENTASE KEPUASAN DOSEN';
        };
        tendikImage.onerror = function() {
            // Hide the staff section if the image is not found
            document.getElementById('staffSection').style.display = 'none';
            // Update the heading if staff section is hidden
            document.getElementById('dosenHeading').textContent = 'GRAFIK PROSENTASE KEPUASAN DOSEN & STAFF';
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
