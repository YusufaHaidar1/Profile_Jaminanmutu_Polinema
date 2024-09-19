
@extends('layouts.app')

@section('title', 'Kepuasan Mahasiswa')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Standart Kualitas Internal</title>
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            margin-bottom: 40px;
        }

        .box-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: left;
            margin-bottom: 20px;
        }

        .box {
            width: 230px;
            height: 130px;
            background-color: #5A80B5;
            border-radius: 10px;
            margin: 10px;
            display: inline-block;
            vertical-align: top;
            text-align: center;
            padding: 20px;
            position: relative;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
            transform: scale();
        }

        .box:hover .icon-space {
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }

        .box:hover h3 {
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }

        .box:hover::after {
            content: "";
            background-image: url('./assets/img/aaa.png');
            background-size: 30px 30px;
            width: 30px;
            height: 30px;
            display: block;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            transition: opacity 0.3s ease-in-out 1ms;
        }

        .box .icon-space {
            background-image: url('./assets/img/logo.png');
            background-size: 50px 50px;
            width: 50px;
            height: 50px;
            margin: 10px auto;
           
            border-radius: 50%;
            display: block;
        }

        .box h3 {
            margin-top: 10px;
            color: #fff;
            font-size: 14px;
            font-weight: bold;
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
        <span>SPMI</span>
        <span>Sistem Penjaminan Mutu Internal</span>
    </h1>

    <!-- Text -->
    <p class="lead mb-7 text-center text-body-secondary">
        Berikut Sistem Penjaminan Mutu Internal di Politeknik Negeri Malang
    </p>
    <div class="container">
        <div class="row box-row">
            <div class="col-md-3">
                <a href="./assets/files/SPMI_2013.pdf">
                    <div class="box">
                        <div class="icon-space"></div>
                        <h3>SPMI 2013</h3>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="./assets/files/SPMI_2015.pdf">
                    <div class="box">
                        <div class="icon-space"></div>
                        <h3>SPMI 2015</h3>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="./assets/files/SPMI_2017.pdf">
                    <div class="box">
                        <div class="icon-space"></div>
                        <h3>SPMI 2017</h3>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="./assets/files/SPMI_2020.pdf">
                    <div class="box">
                        <div class="icon-space"></div>
                        <h3>SPMI 2020</h3>
                    </div>
                </a>
            </div>
        </div>
        <div class="row box-row">
            <div class="col-md-3">
                <a href="./assets/files/SPMI_2021.pdf">
                    <div class="box">
                        <div class="icon-space"></div>
                        <h3>SPMI 2021</h3>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="./assets/files/aa.pdf">
                    <div class="box">
                        <div class="icon-space"></div>
                        <h3>grgrg</h3>
                    </div>
                </a>
            </div>
        </div>
    </div>

   
</body>

</html>
@endsection