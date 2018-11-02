@extends('layouts\app')
@section('content')
    @foreach($blog as $n)
        <div class="img-blog-article"  alt="{{ $n->title }}")">
            <a href="{{ url('/blog', $n->slug) }}">
                <div class="bgc-img"></div>
                <img class="news-image"  src="{{ asset('images/uploads/blogImages/'.$n->wall) }}" alt="{{ $n->title }}">
             </a>
            <div class="news-description">
                <h3 class="article-title"><a href="{{ url('admin/blog', $n->slug) }}">{{ $n->title }}</a></h3>
                <time class="time-article" datetime="{{$n->published_at}}"><span class="fa fa-clock-o fa-1x"></span>{{$n->getBeautifulDateAttribute()}}</time>
                @permission('blog-edit')
                    <a class="button-edit admin btn btn-primary btn-xs" href="{{url('admin/blog/'.$n->id.'/edit')}}">Редактировать</a>
                @endpermission
                @unless($n->tags->isEmpty())
                <ul class="tag-common">
                    @foreach($n->tags as $tag)
                    <li class="tag-blog"><a href="{{ url('tags/'.$tag->name) }}">{{$tag->name}} </a></li>
                    @endforeach
                </ul>
                @endunless
                @permission('blog-delete')
                    {!! Form::open(['url' => 'admin/blog/'.$n->id, 'action' => 'BlogController@destroy', 'method' => 'DELETE', 'class' => 'admin button'])!!}
                    {!! Form::token() !!}
                    {!! Form::submit('Удалить',
                    [
                        'class' => 'delete-button btn btn-danger btn-xs confirm',
                        'onclick' => 'return confirm("Удалить статью?")'
                    ])
                    !!}
                    {!! Form::close() !!}
                @endpermission()
            </div>
</div>
    @endforeach
    {{ $blog->links() }}
    <script src="{{ asset('public/js/jquery-3.3.1.min.js') }}"></script>

@endsection