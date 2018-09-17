@extends('app')
@section('content')
    @foreach($blog as $n)
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <a class="href-news-img" href="{{ url('/blog', $n->slug) }}">
                        <img class="news-image"  src="{{ asset('images/uploads/blogImages/'.$n->wall) }}" alt="{{ $n->title }}">
                        <div class="overlay"></div>
                        <div class="button-news">
                            <a class="button-news-a" href="{{ url('/blog', $n->slug) }}">Читать дальше</a>
                        </div>
                        <div class="news-description">
                            <h3><a class="h3" href="{{ url('/blog', $n->slug) }}">{{ $n->title }}</a></h3>
                            <time datetime="{{$n->published_at}}"><span class="fa fa-clock-o fa-1x"></span>{{$n->getBeautifulDateAttribute()}}</time>
                            @permission('blog-edit')
                            <a class="admin btn btn-primary btn-xs" href="{{url('admin/blog/'.$n->id.'/edit')}}">Редактировать</a>
                            @endpermission
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
                            @endpermission
                        </div>
                    </a>
                </div>
             </div>
        </div>
    @endforeach
    <script src="{{ asset('public/js/jquery-3.3.1.min.js') }}"></script>

@endsection