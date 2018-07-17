<div class="form-group">
    {!!   Form::label('title', 'Заголовок') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('body', 'Контент') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('published_at',"Дата публикации :") !!}
    {!! Form::input('datetime-local', 'published_at', date('Y-m-d H:i'), ['class' => 'form-control', 'min' => date('Y-m-d') ]) !!}
</div>
<div class="form-group">
    {!! Form::label('news_wall', 'Главное изображение') !!}
    {!! Form::file('news_wall') !!}
</div>
<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
