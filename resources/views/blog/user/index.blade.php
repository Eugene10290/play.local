@extends('layouts\app')
@section('content')
    @foreach($blog as $n)
        <a href="{{ url('admin/blog', $n->slug) }}"><img class="news-image"  src="{{ asset('images/uploads/blogImages/'.$n->wall) }}" alt="{{ $n->title }}"></a>
        <div class="news-description">
            <h3><a href="{{ url('admin/blog', $n->slug) }}">{{ $n->title }}</a></h3>
            <time datetime="{{$n->published_at}}"><span class="fa fa-clock-o fa-1x"></span>{{$n->getBeautifulDateAttribute()}}</time>
            @permission('blog-edit')
                <a class="admin btn btn-primary btn-xs" href="{{url('admin/blog/'.$n->id.'/edit')}}">Редактировать</a>
            @endpermission
            @unless($n->tags->isEmpty())
                <h5>Тэги</h5>
                <ul>
                    @foreach($n->tags as $tag)
                        <ul>{{ $tag->name }}</ul>
                    @endforeach
                </ul>
            @endunless
            @permission('blog-delete')
                {!! Form::open(['url' => 'admin/blog/'.$n->id, 'action' => 'BlogController@destroy', 'method' => 'DELETE', 'class' => 'admin button'])!!}
                {!! Form::token() !!}
                {!! Form::submit('Удалить',
                     [
                        'class' => 'btn btn-danger btn-xs confirm',
                        'onclick' => 'return confirm("Удалить статью?")'
                     ])
                 !!}
                {!! Form::close() !!}
            @endpermission()

        </div>
    @endforeach
    <script src="{{ asset('public/js/jquery-3.3.1.min.js') }}"></script>

@endsection