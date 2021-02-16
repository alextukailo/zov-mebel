@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Редактировать салон</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/salons') }}" title="Все салоны"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
                        <br />
                        <br />

                        {!! Form::model($salon, [
                            'method' => 'PATCH',
                            'url' => ['/admin/salons', $salon->id],
                            'class' => 'form-horizontal'
                        ]) !!}

                        @include ('admin.salons.form', [
                            'formMode' => 'edit',
                            'cities' => $cities,
                        ])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
