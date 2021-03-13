<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title>Marigondon</title>
    
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            .background {
                background-image: url("/images/lands.jpg");
                background-repeat: no-repeat;
                background-size: cover;
            }
            .title {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 60pt;
                color: white;
            }
            .container-fluid {
                background-color: white;
            }
        </style>
    </head>
    </head>
    <body class="background">
        <div style="padding: 10%; padding-bottom: 20px">
            <div class="justify-content-between d-flex">
                <div class="col-md-6">
                    <h1 class="title">Welcome to Marigondon Police Station 4</h1>
                </div>
                <div class="col-md-6">
                    <div class="text-center" style="padding: 20%">
                        <a href="{{ route('dashboard.index') }}" class="btn btn-outline-primary btn-lg" style="font-family: Arial, Helvetica, sans-serif">HOME</a>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <a href="{{ route('login') }}" class="btn btn-outline-primary btn-lg" style="font-family: Arial, Helvetica, sans-serif">LOGIN</a>                    
                    </div>
                </div>
            </div>
        </div>
    </body>
    <div class="container-fluid">
        <div class="container">
            <div class="row justify-content-around d-flex" style="padding: 30px">
                    <div class="col-xs-6">
                        <img src="{{url("images/announcement.jpg")}}" alt="" style="height: 180px; width: 180px; margin-right: 30px">
                        <h4 style="margin-left: 20px; padding-top: 20px;">Annoucements</h4>
                        <p style="margin-left: 20px;">Some</p>
                    </div>
                    <div class="col-xs-6">
                        <img src="{{url("images/report.jpg")}}" alt="" style="height: 180px; width: 180px">
                        <h4 style="margin-left: 50px; padding-top: 20px;">Reports</h4>
                        <p style="margin-left: 20px;">Some</p>
                    </div>
                </div>
            </div>
        </div>
    </html>
