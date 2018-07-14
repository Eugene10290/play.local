<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Новости</h1>
    @foreach($news as $n)
        <a href="{{ url('/news', $n->slug) }}"><img class="news-image"  src="{{ asset('images/uploads/newsImages/'.$n->news_wall) }}" alt="{{ $n->title }}"></a>
        <div class="news-description">
            <h3><a href="{{ url('/news', $n->slug) }}">{{ $n->title }}</a></h3>
            <time datetime="{{$n->published_at}}"><span class="fa fa-clock-o fa-1x"></span>{{$n->getBeautifulDateAttribute()}}</time>
            <a class="admin btn btn-primary btn-xs" href="{{url('news/'.$news->id.'/edit')}}">Редактировать</a>
        </div>
    @endforeach
</body>
</html>