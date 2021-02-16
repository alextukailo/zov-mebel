@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Салон ({{$salon->name_salon}})</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/salons') }}" title="Все салоны"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
                        <a href="{{ url('/admin/salons/' . $salon->id . '/edit') }}" title="Редактировать салон"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Редактировать</button></a>
                        {!! Form::open([
                            'method' => 'DELETE',
                            'url' => ['/admin/salons', $salon->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Удалить', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Удалить салон',
                                    'onclick'=>'return confirm("Подтвердите удаление.")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Название</th>
                                        <th>Город</th>
                                        <th>Адрес</th>
                                        <th>Дата добаления</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $salon->id }}</td>
                                        <td> {{ $salon->name_salon }}</td>
                                        <td> {{ $salon->city->name_city }} </td>
                                        <td>{{$salon->address}}</td>
                                        <td>{{$salon->created_at}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
