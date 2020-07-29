@extends('layouts.app')
@section('content')
    <div class="container">
        <h2 class="center">Lista de Usuários</h2>
        <div class="row">
            <nav>
                <div class="nav-wrapper green">
                <div class="col s12">
                    <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
                    <a href="#!" class="breadcrumb">Lista de Usuários</a>
                </div>
                </div>
            </nav>            
        </div>
        <div class="row">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>E-MAIL</th>
                        <th>AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->id }}</td>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>
                            <a class="btn orange" href="#">Editar</a>
                            <a class="btn red" href="#">Deletar</a>
                            <a></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection