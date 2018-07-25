<h1>Создать новость</h1>
{!! Form::open(['url' => 'news', 'files' => 'true', 'enctype' => 'multipart/form-data', 'id' => 'send-form']) !!}
{{ csrf_field() }}
    @include('news.form._newsForm', ['submitButtonText' => 'Опубликовать', 'publishedDate' => 1])
{!! Form::close() !!}