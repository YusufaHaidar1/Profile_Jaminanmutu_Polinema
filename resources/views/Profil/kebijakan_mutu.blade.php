@extends('layouts.app')

@section('title', 'kebijakan mutu')

@section('content')

    <section class="py-6 py-md-6">
        <div class="container">
            <h2 class="text-center mt-5 fw-bolder">Kebijakan Mutu</h2>
            <p class="text-center" style="color: #9B9B9B">Politeknik Negeri Malang (POLINEMA) bertekad untuk memberikan
                kepuasan kepada para
                pemangku kepentingan dengan selalu menjaga komitmen yang tinggi terhadap kualitas melalui kebijakan di
                bidang:</p>

            <div class="text-center mt-1">
                <img src="{{ asset('assets/img/Kebijakan mutu/image.png') }}" class="img-fluid"
                    style="max-width: 80%; height: auto;">
            </div>

            <div class="row mt-10">
                <div class="col-md-12">
                    <h4 class="mb-3 fw-bolder">Pendidikan</h4>
                    <ol class=" " style="color: #9B9B9B">
                        <li>Pelaksanaan pendidikan meliputi perencanaan, pelaksanaan, pemantauan, evaluasi sistem, dan
                            perbaikan terus-menerus.</li>
                        <li>Peningkatan kualitas program studi secara simultan dan komprehensif yang ditunjukkan dengan
                            peningkatan Key Performance Indicator (KPI), peringkat akreditasi nasional dan reputasi
                            internasional.</li>
                        <li>Meningkatkan kualitas civitas akademika dengan membangun karakter profesional.</li>
                    </ol>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <h4 class="mb-3 fw-bolder">Penelitian, Pengabdian kepada Masyarakat, dan Kerjasama</h4>
                    <ol class=" " style="color: #9B9B9B">
                        <li>Pengembangan penelitian, dan pengabdian kepada masyarakat yang inovatif, kreatif, dan
                            berkualitas, berbasis penerapan teknologi.</li>
                        <li>Meningkatkan jejaring dan kerjasama dengan pemangku kepentingan di bidang pendidikan,
                            penelitian, dan pengabdian kepada masyarakat yang melibatkan sivitas akademika.</li>
                    </ol>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <h4 class="mb-3 fw-bolder">Kemahasiswaan</h4>
                    <ol class=" " style="color: #9B9B9B">
                        <li>Peningkatan kemampuan akademik dan non akademik, serta pelayanan kesejahteraan mahasiswa.</li>
                        <li>Meningkatkan akses dan media pengembangan diri, bakat, dan kepribadian melalui kegiatan
                            kemahasiswaan dan pengembangan karir.</li>
                        <li>Meningkatkan jaringan alumni dan mengoptimalkan kinerja Job Arrangement System yang ditunjukkan
                            dengan berkurangnya masa tunggu lulusan untuk mendapatkan pekerjaan.</li>
                    </ol>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <h4 class="mb-3 fw-bolder">Manajemen, Pencitraan, dan Layanan</h4>
                    <ol class=" " style="color: #9B9B9B">
                        <li>Setiap program kerja dan rencana kegiatan harus mengacu pada sasaran mutu, rencana strategis,
                            dan capaian mutu/kinerja POLINEMA.</li>
                        <li>Peningkatan kualitas tata kelola melalui kejelasan SOP dan implementasinya, serta pengendalian
                            dokumen dan catatan.</li>
                        <li>Meningkatkan kualitas pelayanan melalui peningkatan kualitas SDM dan infrastruktur.</li>
                        <li>Menciptakan citra merek POLINEMA sehingga mendapatkan kepercayaan pemangku kepentingan.</li>
                        <li>Pengembangan sistem informasi yang berkualitas, informatif, akuntabel dan terintegrasi.</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

@endsection
