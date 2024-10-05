<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visi, Misi, dan Tujuan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #F1F4F8;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        /* h1 {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
        } */

        p {
            text-align: center;
        }

        .box {
            background-color: #5A80B5;
            padding: 20px;
            border-radius: 16px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .box h2 {
            margin-top: 0;
            color: #F1F4F8;
        }



        .box ul {
            list-style: none;
            padding: 0;
            color: #F1F4F8;
        }

        .box p2 {
            margin-bottom: 10px;
            color: #F1F4F8;
        }

        .box li {
            margin-bottom: 10px;
            color: #F1F4F8;
        }

        .content {
            display: flex;
            grid-template-columns: 1fr 1fr;
            /* Kolom sama besar */
            gap: 20px;
        }

        .left-side,
        .right-side {
            width: 50%;
            /* Membuat lebar kedua sisi sama */
        }

        .padding {
            padding: 50px;
        }
    </style>
</head>

<body>
    {{-- Include the header --}}
    @include('header')

    <div class="container">
        <h1 class="text-center mt-5 fw-bolder">Visi, Misi, dan Tujuan</h1>
        <p class="text-center" style="color: #9B9B9B">Politeknik Negeri Malang memiliki tujuan sebagai berikut:</p>

        <div class="padding">

        </div>
        <div class="content">
            <div class="left-side">
                <div class="box">
                    <h2>Visi</h2>
                    <ul>
                        <p2>Menjadi organisasi penjaminan mutu yang profesional dan sekaligus membantu POLINEMA menjadi
                            lembaga pendidikan tinggi vokasi yang unggul dalam persaingan global</p2>
                    </ul>
                </div>
            </div>

            <div class="right-side">
                <div class="box">
                    <h2>Tujuan</h2>
                    <ul>
                        <li>1. Melaksanakan evaluasi mutu internal secara menyeluruh, konsisten, berkala, dan
                            profesional.</li>
                        <li>2. Mengevaluasi kualitas kinerja layanan secara keseluruhan dengan metode yang valid, data
                            yang akurat, dan analisis yang tepat.</li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="box">
            <h2>Misi</h2>
            <ul>
                <li>1. Menerapkan Sistem Penjaminan Mutu POLINEMA secara komprehensif, bertahap dan berkelanjutan.</li>
                <li>2. Meningkatkan kesadaran dan tanggung jawab budaya mutu bagi seluruh civitas akademika POLINEMA
                    melalui peningkatan kompetensi dan pelatihan.</li>
                <li>3. Terus meningkatkan kinerja KJM dalam menangani penjaminan mutu terpadu secara profesional.</li>
                <li>4. Mendorong program studi dan unit pendukung di POLINEMA untuk selalu berinovasi dan meningkatkan
                    kreativitas dalam upayanya untuk terus meningkatkan kualitas.</li>
            </ul>
        </div>

    </div>
    {{-- Include the footer --}}
    @include('footer')

</body>

</html>
