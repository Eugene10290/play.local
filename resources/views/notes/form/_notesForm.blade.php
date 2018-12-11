{{ csrf_field() }}
<div class="form-group">
    {!!   Form::label('title', 'Название') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('description', 'Описание') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'textarea']) !!}
</div>
<div class="form-group">
    {!! Form::label('wall', 'Главное изображение') !!}
    {!! Form::file('wall') !!}
</div>
<div class="form-group">
    {!! Form::label('pdf', 'PDF файл') !!}
    {!! Form::file('pdf') !!}
</div>
<div class="form-group">
    {!! Form::label('price', 'Цена') !!}
    {!! Form::number('price') !!} $
</div>
<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
