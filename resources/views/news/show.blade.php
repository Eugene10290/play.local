<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="news-body">
        <p>{{ $news->title }}</p>
        <p><img src="{{ asset('images/uploads/newsImages/'.$news->news_wall) }}"></p>
        <p>{{ $news->getBeautifulDateAttribute() }}</p>
        <p> {{ $news->body }}</p>
        <p></p>
    </div>
</body>
</html>