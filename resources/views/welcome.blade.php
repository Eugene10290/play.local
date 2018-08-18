@extends('app')
@section('content')
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
        		<h3>Мега крутой заголовок1</h3>
        		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel unde impedit earum dicta veritatis odio facilis, consequatur culpa molestiae obcaecati! Quam saepe eum natus quos ipsa omnis at nostrum amet.</p>
        	</div>
      </div>
      <div class="slider__item">
        <img src="img/bg3.jpg" alt="1" class="slide-img">
        	<div class="slide-content">
        		<h3>Мега крутой заголовок1</h3>
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


    <div class="short-mnu">
    	<div class="block-mnu1">
    		<img src="img/promobox1.jpg" alt="">
    		<h3>Играй с душой</h3>
    	</div>
    	<div class="block-mnu2">
    		<img src="img/promobox2.jpg" alt="">
    		<h3>Заказать ноты</h3>
    	</div>
    	<div class="block-mnu3">
    		<img src="img/promobox3.jpg" alt="">
    		<h3>Блог</h3>
    	</div>	
    </div>
    <script src="{{ asset('public/js/jquery-3.3.1.min.js') }}"></script>
@endsection
