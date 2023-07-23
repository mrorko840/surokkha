<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Surokkha Online</title>

    <!-- Old Script files Start-->
    <!-- Favicons -->
    <link href="{{asset('assets/image/logo/favicon.png')}}" rel="icon">
    <link href="{{asset('assets/image/logo/favicon.png')}}" rel="apple-touch-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Old Script files End-->

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        ::-webkit-scrollbar {
            width: 5px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #aab7cf;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #aab7cf transparent;
        }
        .logo img {
            max-height: 26px;
            margin-right: 6px;
        }
        .logo span {
            font-size: 26px;
            font-weight: 700;
            color: #012970;
            font-family: "Bangla259", sans-serif;
        }
        .text-orange {
            color:#ff5500!important ;
        }

        /* border-shadow */
        .border-primary {
            box-shadow: 0 3px 10px #0d6efd70 !important;
        }
        .border-warning {
            box-shadow: 0 3px 10px #ffc00870 !important;
        }
        .border-danger {
            box-shadow: 0 3px 10px #ed1d3270 !important;
        }
        .border-success {
            box-shadow: 0 3px 10px #19875470 !important;
        }
        .border-orange {
            box-shadow: 0 3px 10px #ff550070 !important;
        }
        .border-info {
            box-shadow: 0 3px 10px #0dcaf070 !important;
        }

        /* button-sections */
        .btn-orange{
            color: #fff;
            background: #ff5500;
            border: 1px solid #ff5500;
            box-shadow: 0 4px 5px rgb(255 86 2 / 70%) !important;
        }
        .btn-orange:hover {
            color: #fff;
            background: #d54700;
            border: 1px solid #d54700;
            box-shadow: 0 4px 5px #d5470096 !important;
        }
        .btn-success{
            color: #fff;
            background: #198754;
            border: 1px solid #198754;
            box-shadow: 0 4px 5px rgb(26 135 84 / 70%) !important;
        }
        .btn-success:hover {
            color: #fff;
            background: #12633d;
            border: 1px solid #12633d;
            box-shadow: 0 4px 5px #12633d96 !important;
        }
        .btn-danger{
            color: #fff;
            background: #ed1d32;
            border: 1px solid #ed1d32;
            box-shadow: 0 4px 5px rgb(237 28 49 / 70%) !important;
        }
        .btn-danger:hover {
            color: #fff;
            background: #bf1829;
            border: 1px solid #bf1829;
            box-shadow: 0 4px 5px #bf182996 !important;
        }
        .btn-info{
            color: #fff;
            background: #0dcaf0;
            border: 1px solid #0dcaf0;
            box-shadow: 0 4px 5px rgb(17 202 240 / 70%) !important;
        }
        .btn-info:hover {
            color: #fff;
            background: #0ba8c8;
            border: 1px solid #0ba8c8;
            box-shadow: 0 4px 5px #0ba8c896 !important;
        }
    </style>
</head>
