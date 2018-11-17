@extends('layouts\app')
@section('content')
<link href="{{ asset('public/css/blog-page/style.css') }}" rel="stylesheet" type="text/css" >
    <title>{{ $blog->title }}</title>
    <div class="container">
        <div class="row">
            <div class="news-body">
                <h1>{{ $blog->title }}</h1>
                <p class="data">{{ $blog->getBeautifulDateAttribute() }}</p>
                <div class="mainImg"><img src="{{ asset('images/uploads/blogImages/'.$blog->wall) }}"></div>
                <div class="text"> {!! $blog->body !!}</div>
            </div>
        </div>
    </div>
    <script src="{{ asset('public/js/jquery-3.3.1.min.js') }}"></script>
@endsection