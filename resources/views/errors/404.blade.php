 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" ></script>
    <style type="text/css">
        body{
            margin-top: 150px;
            background-color: #C4CCD9;
        }
        .error-main{
            margin-top: 50px;
            margin-bottom: 100px;
            background-color: #fff;
        }
        .error-main h1{
            font-weight: bold;
            color: #444444;
            font-size: 100px;
        }
        .error-main h6{
            color: #42494F;
        }
        .error-main p{
            color: #9897A0;
            font-size: 14px;
        }
    </style>
    @extends('layouts.app')
    @section('content')
<div class="container">
    <div class="row text-center">
        <div class="col-lg-6 offset-lg-3 col-sm-6 offset-sm-3 col-12 p-3 error-main">
            <div class="row">
                    <img src="img/404.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
 @endsection