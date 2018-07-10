<h1>Создать новость</h1>
{!! Form::open(['url' => 'news', 'files' => 'true', 'enctype' => 'multipart/form-data', 'id' => 'send-form']) !!}
    @include('news.form._newsForm', ['submitButtonText' => 'Опубликовать'])
{!! Form::close() !!}