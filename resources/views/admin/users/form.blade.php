
<div class="row">
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
            {!! Form::label('name', 'Имя пользователя: ', ['class' => 'control-label']) !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('role_id') ? ' has-error' : ''}}">
            {!! Form::label('role_id', 'Роль', ['class' => 'control-label']) !!}
            {!! Form::select('role_id', [null=>'Выберите роль...'] + $roles, null, ['class' => 'form-control','required' => 'required']) !!}
            {!! $errors->first('role_id', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('email') ? ' has-error' : ''}}">
            {!! Form::label('email', 'Email: ', ['class' => 'control-label']) !!}
            {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('password') ? ' has-error' : ''}}">
            {!! Form::label('password', 'Пароль: ', ['class' => 'control-label']) !!}
            <span class="copied-text">Скопировано</span>
            @php
                $passwordOptions = ['class' => 'form-control'];
                if ($formMode === 'create') {
                    $passwordOptions = array_merge($passwordOptions, ['required' => 'required']);
                }
            @endphp
            <div class="position-relative">
                <i class="fa fa-eye show-hide-password" title="Показать пароль" data-state="show" aria-hidden="true"></i>
                <i class="fa fa-clone copy-password" title="Скопировать" aria-hidden="true"></i>
                {!! Form::password('password', $passwordOptions) !!}
            </div>
            {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('salons') ? ' has-error' : ''}}">
            {!! Form::label('salons', 'Салоны', ['class' => 'control-label']) !!}
            {!! Form::select('salons', [null=>'Выберите салоны...'] + $salons, null, ['class' => 'form-control','required' => 'required']) !!}
            {!! $errors->first('salons', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="checked-salons" style="display: block">

        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Обновить' : 'Создать', ['class' => 'btn btn-primary']) !!}
    <a class="btn btn-danger generate-user">Сгенерировать пользователя</a>
</div>
