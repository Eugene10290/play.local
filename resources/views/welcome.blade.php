@extends('layouts\app')
@section('content')
	<link href="{{ asset('public/css/home-page/style.css') }}" rel="stylesheet" type="text/css" >
		<div id="slider" class="slider">
		    <ol class="slider__indicators">
		      <li class="slider__indicator slider__indicator_active" data-slide-to="0"></li>
		      <li class="slider__indicator" data-slide-to="1"></li>
		      <li class="slider__indicator" data-slide-to="2"></li>
		    </ol>
			<div class="slider__items">
			  <div class="slider__item slider__item_active">
			    <img src="img/bg1.jpg" alt="1" class="slide-img">
			    	<div class="slide-content">
			    		<h3>Мега крутой заголовок1</h3>
			    		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel unde impedit earum dicta veritatis odio facilis, consequatur culpa molestiae obcaecati! Quam saepe eum natus quos ipsa omnis at nostrum amet.</p>
			    	</div>
			  </div>
			  <div class="slider__item">
			    <img src="img/bg2.jpg" alt="1" class="slide-img">
			    	<div class="slide-content">
			    		<h3>Мега крутой заголовок2</h3>
			    		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel unde impedit earum dicta veritatis odio facilis, consequatur culpa molestiae obcaecati! Quam saepe eum natus quos ipsa omnis at nostrum amet.</p>
			    	</div>
			  </div>
			  <div class="slider__item">
			    <img src="img/bg3.jpg" alt="1" class="slide-img">
			    	<div class="slide-content">
			    		<h3>Мега крутой заголовок3</h3>
			    		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel unde impedit earum dicta veritatis odio facilis, consequatur culpa molestiae obcaecati! Quam saepe eum natus quos ipsa omnis at nostrum amet.</p>
			    	</div>
			  </div>
			</div>
			<div id="prev-btn">
				 <a class="slider__control slider__control_prev" href="#" role="button"></a>
			</div>
			<div id="next-btn">
				<a class="slider__control slider__control_next" href="#" role="button"></a>
			</div>
		</div>

	<div class="container">
		<div class="row">
			<div class="short-mnu">
		    	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<div class="block-mnu1">
						<img src="img/promobox1.jpg" alt="">
						<h3>Играй с душой</h3>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<a href="{{ url('shops') }}">
					<div class="block-mnu2">
						<img src="img/promobox2.jpg" alt="">
						<h3>Заказать ноты</h3>
					</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<a href="{{ url('blog/')}}">
			    	<div class="block-mnu3">
			    		<img src="img/promobox3.jpg" alt="">
			    		<h3>Блог</h3>
			    	</div>
					</a>
			    </div>
		    </div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="preview-news">
				@foreach($article as $a)
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="news">
							<div class="img-blog-article"  alt="">
									<div class="bgc-img"></div>
									<img src="{{ asset('images/uploads/blogImages/'.$a->wall) }}" alt="">
									<h4>{{ $a->title }}</h4>
									<p class="data1">{{ $a->published_at }}</p>
							</div>
							<p class="blog-text1">{!! strip_tags( mb_strimwidth($a->body, 0, 450, '...') ) !!}</p>
							<a class="button-link" href="{{ url('blog/'.$a->slug) }}">
								<div class="button">
									<span>Читать полностью</span>
								</div>
							</a>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="preview-sheets">
				@foreach($notes as $note)
					<div class="col-lg-8 col-md-8 col-sm-7 col-xs-12">
						<div class="div">
							<img src="{{ asset('images/uploads/notes/'.$note->wall) }}" alt="">
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
						<a href="#"><h4>{{ $note->title}}</h4></a>
						<div class="text">
							<p class="blog-text1">{{ $note->description }}</p>
							<a class="button-link" href="{{ url('shops')}}">
								<div class="button download-btn">
									<span>К покупкам</span>
								</div>
							</a>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="video-div">
				<!--<a href="#"><h4>Видео</h4></a>-->
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<iframe src="https://www.youtube.com/embed/i2Bj_rdZKA0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<p class="video-text1">
						Сильно вдохновил меня Simon Khorolskiy на написание переложения этого псалма. Я даже вступление "слизал", не мог ничего с собой поделать, уж очень по народному - баянному звучало!
						<br />
						Псалом предназначен для двух инструментов но его можно легко с играть и соло, можно убрать "лишние" части, на Ваш взгляд.
					</p>
			</div>
		</div>
	</div>

  <script src="{{ asset('public/js/jquery-3.3.1.min.js') }}"></script>
	<script src="{{ asset('public/js/header/script.js') }}"></script>
	<script src="{{ asset('public/js/home-page/script.js') }}"></script>
@endsection
