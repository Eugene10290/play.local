<div class="container">
    {!! Form::model($news,['method' => 'PATCH', 'action' => ['NewsController@update', $news->id], 'enctype' => 'multipart/form-data']) !!}
    {!! Form::token() !!}
    @include('news.form._newsForm', ['submitButtonText' => 'Обновить', 'publishedDate' => 0])
    {!! Form::close() !!}
</div>