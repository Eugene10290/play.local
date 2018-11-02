@extends('layouts.app')
@section('content')
        <table class="table table-striped table-hover">
            <thead>
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
                <tr>
                    <td>{{ $b->title }}</td>
                    <td>{{ mb_strimwidth($b->body, 0, 70, "...") }}</td>
                    <td>{{ $b->published_at }}</td>
                    <td>
                        <a class="btn btn-success" href="{{ url('blog/'.$b->slug) }}">Просмотр</a>
                        <a class="btn btn-primary" href="{{ url('admin/blog/'.$b->id.'/edit') }}">Редактировать</a>
                        {!! Form::open(['url' => 'admin/blog/'.$b->id, 'action' => 'BlogController@destroy', 'method' => 'DELETE', 'class' => 'admin button'])!!}
                        {!! Form::token() !!}
                        {!! Form::submit('Удалить',
                             [
                                'class' => 'btn btn-danger btn-xs confirm',
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