@extends('layouts.backend')

@section('content')
    <div class="card">
        <div class="card-header">Пользователи</div>
        <div class="card-body">
            <a href="{{ url('/admin/users/create') }}" class="btn btn-success btn-sm" title="Добавить нового пользователя">
                <i class="fa fa-plus" aria-hidden="true"></i> Добавить
            </a>

            <form method="get" action="/admin/users" class="form-inline my-2 my-lg-0 float-right">
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
                        <th>Имя</th>
                        <th>Email</th>
                        <th>Роль</th>
                        <th>Операции</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td><a href="{{ url('/admin/users', $item->id) }}">{{ $item->name }}</a></td>
                            <td>{{ $item->email }}</td>
                            <td>{{ config('custom.roles')[$item->role_id] }}</td>
                            <td class="d-flex">
                                <a href="{{ url('/admin/users/' . $item->id . '/edit') }}" class="mr-2" title="Редактирование пользователя"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>

                                <form action="{{ url('/admin/users', ['id' => $item->id]) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Подтвердите удаление.')"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination"> {!! $users->appends(['search' => Request::get('search')])->render() !!} </div>
            </div>

        </div>
    </div>
@endsection
