@extends('app')
@section('content')
    <title>{{ $blog->title }}</title>
    <div class="container">
        <div class="row">
            <div class="news-body">
                <h1>{{ $blog->title }}</h1>
                <p class="data">{{ $blog->getBeautifulDateAttribute() }}</p>
                <p class="mainImg"><img src="{{ asset('images/uploads/blogImages/'.$blog->wall) }}"></p>
                <p class="text"> {!! $blog->body !!}</p>
                <p></p>
            </div>
        </div>
    </div>
    <script src="{{ asset('public/js/jquery-3.3.1.min.js') }}"></script>
@endsection