<div class="form-group">
    {!!   Form::label('title', 'Заголовок') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('body', 'Контент') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>
<?php echo date('Y-m-d\TH:i:s')?>
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
