
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
            max-width: auto;
            margin: 0 auto;
            margin-bottom: 90px;
            flex-wrap: wrap;
            justify-content: left;
            
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
        .spacer {
            height: 40px;

        }
    </style>
</head>

<body>
    
    <h1 class="judul text-center">
        <span>Kepuasan Pelanggan</span>
        <span>MAHASISWA</span>
    </h1>
    <div class="spacer"></div>
    <!-- Text -->
    
    <div class="container">
    <div class="box-row">
        <a href="/assets/files/SPMI_2013.pdf" >
            <div class="box">
                <div class="icon-space"></div>
                <h3>ADMINISTRASI NIAGA</h3>
            </div>
        </a>
        <a href="./assets/files/SPMI_2015.pdf" >
            <div class="box">
                <div class="icon-space"></div>
                <h3>AKUNTANSI</h3>
            </div>
        </a>
        <a href="./assets/files/SPMI_2017.pdf" >
            <div class="box">
                <div class="icon-space"></div>
                <h3>TEKNIK ELEKTRO</h3>
            </div>
        </a>
        <a href="./assets/files/SPMI_2020.pdf" >
            <div class="box">
                <div class="icon-space"></div>
                <h3>TEKNIK KIMIA</h3>
            </div>
        </a>
        <a href="./assets/files/SPMI_2021.pdf" >
            <div class="box">
                <div class="icon-space"></div>
                <h3>TEKNIK MESIN</h3>
            </div>
        </a>
        <a href="./assets/files/aa.pdf" >
            <div class="box">
                <div class="icon-space"></div>
                <h3>TEKNIK SIPIL</h3>
            </div>
        </a>
        <a href="./assets/files/aa.pdf" >
            <div class="box">
                <div class="icon-space"></div>
                <h3>TEKNOLOGI INFORMASI</h3>
            </div>
        </a>
        <a href="./assets/files/aa.pdf" >
            <div class="box">
                <div class="icon-space"></div>
                <h3>PDD BLITAR</h3>
            </div>
        </a>
        <a href="./assets/files/aa.pdf" >
            <div class="box">
                <div class="icon-space"></div>
                <h3>PDD POLINEMA BOJONEGORO</h3>
            </div>
        </a>
        <a href="./assets/files/aa.pdf" >
            <div class="box">
                <div class="icon-space"></div>
                <h3>PDD POLINEMA JEPARA</h3>
            </div>
        </a>
        <a href="./assets/files/aa.pdf" >
            <div class="box">
                <div class="icon-space"></div>
                <h3>PDD POLINEMA LUMAJANG</h3>
            </div>
        </a>
        <a href="./assets/files/aa.pdf" >
            <div class="box">
                <div class="icon-space"></div>
                <h3>PDD POLINEMA PAMEKASAN</h3>
            </div>
        </a>
        <a href="./assets/files/aa.pdf" >
            <div class="box">
                <div class="icon-space"></div>
                <h3>PDD POLINEMA SUMBAWA BARAT</h3>
            </div>
        </a>
        <a href="./assets/files/aa.pdf" >
            <div class="box">
                <div class="icon-space"></div>
                <h3>PDD POLINEMA TRENGGALEK</h3>
            </div>
        </a>
        <a href="./assets/files/aa.pdf" >
            <div class="box">
                <div class="icon-space"></div>
                <h3>PSDKU KEDIRI</h3>
            </div>
        </a>
        <a href="./assets/files/aa.pdf" >
            <div class="box">
                <div class="icon-space"></div>
                <h3>PSDKU LUMAJANG</h3>
            </div>
        </a>
        <a href="./assets/files/aa.pdf" >
            <div class="box">
                <div class="icon-space"></div>
                <h3>PSDKU PAMEKASAN</h3>
            </div>
        </a>

    </div>
</div>  

  
</body>

</html>
    
@endsection
