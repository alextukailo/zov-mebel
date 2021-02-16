@extends('layouts.backend')

@section('content')
    <div class="card">
        <div class="card-header">Города</div>
        <div class="card-body">
            <a href="{{ route('cities.create') }}" class="btn btn-success btn-sm" title="Добавить новый город">
                <i class="fa fa-plus" aria-hidden="true"></i> Добавить
            </a>

            <form method="get" action="{{route('cities.index')}}" class="form-inline my-2 my-lg-0 float-right">
                <div class="input-group">
                    <input type="text" class="form-control" value="{{Request::get('search')}}" name="search" placeholder="Искать...">
                    <span class="input-group-append">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                </div>
            </form>

            <br/>
            <br/>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Название</th>
                        <th>Операции</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cities as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name_city }}</td>
                            <td class="d-flex">
                                <a href="{{ route('cities.edit', $item->id) }}" class="mr-2" title="Редактирование города"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>

                                <form action="{{  url('/admin/cities', ['id' => $item->id]) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Подтвердите удаление.')"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination"> {!! $cities->appends(['search' => Request::get('search')])->render() !!} </div>
            </div>

        </div>
    </div>
@endsection
