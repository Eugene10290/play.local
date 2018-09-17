@section('header')
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
    <
@endsection
<div class="form-group">
    {!!   Form::label('title', 'Заголовок') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('body', 'Контент') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('tag_list', 'Добавить тэги') !!}
    {!! Form::select('tag_list[]', $tags, null, ['id' => 'tag_list', 'class' => ' ','multiple']) !!}
</div>

@if($publishedDate === 1)
    <div class="form-group">
        {!! Form::label('published_at',"Дата публикации :") !!}
        {!! Form::input('datetime-local', 'published_at', '{{ \Carbon\Carbon::now()  }}', [
            'class' => 'form-control',
             'min' => date('Y-m-d')
         ]) !!}
    </div>
@elseif($publishedDate === 0)
        {{ Form::hidden('updated_at', date('Y-m-d\TH:i:s')) }}
@endif
<div class="form-group">
    {!! Form::label('news_wall', 'Главное изображение') !!}
    {!! Form::file('wall') !!}
</div>
<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
@section('footer')
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
    <script>
        $('#tag_list').select2();
    </script>


@endsection
