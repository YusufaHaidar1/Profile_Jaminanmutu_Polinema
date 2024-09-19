
@extends('layouts.app')

@section('title', 'Kepuasan Mahasiswa')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title>Standart Kualitas Internal</title>
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            margin-bottom: 40px;
            flex-wrap: wrap;
        }

        .table {
            border-collapse: collapse;
            width: 100%;
        }

        .table thead th {
            padding: 10px;
            text-align: center;
            background-color: #4270B0;
            color: #FFFFFF;
            font-weight: bold;
        }

        .table tbody td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .spacer {
            height: 100px;

        }
        .judul span:first-child {
            font-size: 18px;
            color: #FAD776;
            font-weight: bold;
            display: block;
            margin-bottom: 10px;
        }

        .judul span:nth-child(2) {
            font-size: 34px;

            margin-right: 5px;
        }
    </style>
</head>

<body>
   
    <h1 class="judul text-center">
        <span>Akreditasi </span>
        <span>Program Studi</span>
    </h1>

    <!-- Text -->
    
    <div class="container">
        <table class="table">
            <thead>
                <tr style="background-color: #4270B0; color: #FFFFFF; font-weight: bold;">
                    <th style="border-radius: 10px 0 0 10px;">Sertifikat</th>
                    <th>Program Studi</th>
                    <th>Peringkat</th>
                    <th style="border-radius: 0 10px 10px 0;">Berlaku</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Sertifikat 2018</td>
                    <td>Politeknik Negeri Malang</td>
                    <td>A</td>
                    <td>19 Mei 2025 - 19 Desember 2029</td>
                </tr>
                <tr>
                    <td>Sertifikat 2016</td>
                    <td>Politeknik Negeri Malang</td>
                    <td>A</td>
                    <td>21 Agustus 2025 - 21 Agustud 2027</td>
                </tr>
                <tr>
                    <td>Surat Keterangan Akreditasi 2016</td>
                    <td>Politeknik Negeri Malang</td>
                    <td>A</td>
                    <td>3 Maret 2021 - 3 April 2026</td>
                </tr>
                <tr>
                    <td>1222/SK/BAN-PT/PEPA-Ppj/PT/XII/2023</td>
                    <td>Politeknik Negeri Malang</td>
                    <td>A</td>
                    <td>5 Januari 2021 - 4 Juli 2026</td>
                </tr>
                <!-- Add more data here -->
            </tbody>
        </table>
        <div class="spacer"></div>
    </div>

    
</body>

</html>
@endsection