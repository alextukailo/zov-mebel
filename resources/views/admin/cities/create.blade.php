@extends('layouts.backend')

@section('content')


    <div class="card">
        <div class="card-header">Добавление города
        </div>
        <div class="card-body">
            <a href="{{route('cities.index')}}" title="Все города"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
            <form id="createCity" action="{{route('cities.store')}}" method="post" >
                @csrf
                <label class="mt-2">Название города</label>
                <input required type="text" class="form-control col-4" name="name_city">
                <p class="text-danger">{{ $errors->first('name_city') }}</p>
                <button class="btn btn-success mt-2" type="submit" >Сохранить</button>
            </form>

        </div>
    </div>
@endsection
