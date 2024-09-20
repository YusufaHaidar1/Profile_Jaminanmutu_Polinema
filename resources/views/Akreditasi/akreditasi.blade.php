
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
            text-align: center;
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
        <span>Akreditasi</span>
        <span>Akreditasi Institusi</span>
    </h1>

    <!-- Text -->
    
    <div class="container">
        <table class="table">
            <thead>
                <tr style="background-color: #4270B0; color: #FFFFFF; font-weight: bold;">
                    <th style="border-radius: 10px 0 0 10px;">Dokumen</th>
                    <th>Institusi</th>
                    <th>Peringkat</th>
                    <th style="border-radius: 0 10px 10px 0;">Sertifikat & Masa Berlaku</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Sertifikat 1</td>
                    <td>Teknologi Informasi</td>
                    <td>Peringkat 1</td>
                    <td>21 Mei 2023</td>
                </tr>
                <tr>
                    <td>Sertifikat 2</td>
                    <td>Program Studi 2</td>
                    <td>Peringkat 2</td>
                    <td>Berlaku 2</td>
                </tr>
                <tr>
                    <td>Sertifikat 2</td>
                    <td>Program Studi 2</td>
                    <td>Peringkat 2</td>
                    <td>Berlaku 2</td>
                </tr>
                <tr>
                    <td>Sertifikat 2</td>
                    <td>Program Studi 2</td>
                    <td>Peringkat 2</td>
                    <td>Berlaku 2</td>
                </tr>
                <!-- Add more data here -->
            </tbody>
        </table>
        <div class="spacer"></div>
    </div>

    
</body>

</html>
@endsection