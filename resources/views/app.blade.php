<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>head</title>
    <link href="{{ asset('public/css/home-page/style.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('public/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" >
    <link href="{{ asset('public/css/head/style.css') }}" rel="stylesheet" type="text/css" >
</head>
<body>
	<header>
		<div class="container">	
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-3 col-xs-4">
		  			<div class="logo">
		  				<h1><a href="#">Vitaliy Stulnev</a></h1>
		  			</div>
		  		</div>
		  		<div class="col-lg-8 col-md-8 col-sm-9 col-xs-8" style="height: 100%">
		    		<ul class="mnu">
			    		<li><a href="#">Играй с душой</a>
							<ul>
								<li><a href="#">Аудио</a></li>
								<li><a href="#">Видео</a></li>
							</ul>
			    		</li>
		        		<li><a href="#">Блог</a></li>
		    			<li><a href="#">Ноты</a>
		    				<ul>
								<li><a href="#">Бесплатные</a></li>
								<li><a href="#">Заказать</a></li>
							</ul>
						</li>
		    			<li><a href="#">Поддержка проекта</a></li>
		        	</ul>
		        	<div class="section">
						<a href="#" class="menu-btn">
							<span class="span"></span>
						</a>
					</div>
		        </div>
			</div>
		</div>
	</header>
	
	@yield('content')
		<div class="container">	
			<div class="row">

			</div>
		</div>

	<footer>
		<div class="container">
			<div class="row">
				<a href="#"><img src="{{ asset('public/img/facebook.png') }}" alt=""></a>
				<a href="#"><img src="{{ asset('public/img/youtube.png') }}" alt=""></a>
				<a href="#"><img src="{{ asset('public/img/Instagram.png') }}" alt=""></a>
				<a href="#"><img src="{{ asset('public/img/telegram.png') }}" alt=""></a>
				<a href="#"><img src="{{ asset('public/img/whatsapp.png') }}" alt=""></a>
				<a href="#"><img src="{{ asset('public/img/g+.png') }}" alt=""></a>
				<p>&#169; 2018 Stulnev Vitaliy. All rights reserved.</p>
			</div>	
		</div>
	</footer>

	<script src="{{ asset('public/js/home-page/script.js') }}"></script>
    
</body>
</html>