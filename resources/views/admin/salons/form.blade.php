<div class="form-group{{ $errors->has('name_salon') ? ' has-error' : ''}}">
    {!! Form::label('name_salon', 'Название Салона: ', ['class' => 'control-label']) !!}
    {!! Form::text('name_salon', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('name_salon', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('city_id') ? ' has-error' : ''}}">
    {!! Form::label('city_id', 'Город', ['class' => 'control-label']) !!}
    {!! Form::select('city_id', [null=>'Выберите город...'] + $cities, null, ['class' => 'form-control','required' => 'required']) !!}
    {!! $errors->first('city_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('address') ? ' has-error' : ''}}">
    {!! Form::label('address', 'Адрес Салона: ', ['class' => 'control-label']) !!}
    {!! Form::text('address', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Обновить' : 'Создать', ['class' => 'btn btn-primary']) !!}
</div>
