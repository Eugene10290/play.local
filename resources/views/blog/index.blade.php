@extends('layouts.app')
@section('content')
<link href="{{ asset('public/css/blog-admin/style.css') }}" rel="stylesheet" type="text/css" >
    <a class="btn btn-primary back" href="{{ url('admin/') }}">Назад</a>
        <table class="table table-striped table-hover">
            <thead class="head-table-blog">
            <tr>

                <th>Название</th>
                <th>Текст</th>
                <th>Дата публикации</th>
                <th>Действие</th>
            </tr>
            </thead>
            <a class="btn btn-success" href="{{ url('admin/blog/create') }}">Создать запись</a>
            <tbody>
            @foreach($blog as $b)
                
                    <td>{{ $b->title }}</td>
                    <td>{{ mb_strimwidth($b->body, 0, 70, "...") }}</td>
                    <td>{{ $b->published_at }}</td>
                    <td>
                        <a class="btn btn-success button-view-news-admin" href="{{ url('blog/'.$b->slug) }}">Просмотр</a>
                        <a class="btn btn-primary button-edit-news-admin" href="{{ url('admin/blog/'.$b->id.'/edit') }}">Редактировать</a>
                        {!! Form::open(['url' => 'admin/blog/'.$b->id, 'action' => 'BlogController@destroy', 'method' => 'DELETE', 'class' => 'admin button'])!!}
                        {!! Form::token() !!}
                        {!! Form::submit('Удалить',
                             [
                                'class' => 'btn btn-danger btn-xs confirm delete',
                                'onclick' => 'return confirm("Удалить статью?")'
                             ])
                         !!}
                        {!! Form::close() !!}
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $blog->links() }}
@endsection