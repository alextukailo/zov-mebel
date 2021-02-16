@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Создание нового салона
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/admin/salons') }}" title="Все салоны"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
                        <br />

                        {!! Form::open(['url' => '/admin/salons', 'class' => 'form-horizontal']) !!}

                        @include ('admin.salons.form', [
                            'formMode' => 'create',
                            'cities' => $cities,
                        ])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
