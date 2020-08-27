@extends('layouts.app')
@section('content')
    <div class="container">
        <h2 class="center">Lista de Papéis</h2>
        <div class="row">
            <nav>
                <div class="nav-wrapper green">
                <div class="col s12">
                    <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
                    <a class="breadcrumb">Lista de Papéis</a>
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
                        <th>DESCRIÇÃO</th>
                        <th>AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($registros as $registro)
                    <tr>
                        <td>{{ $registro->id }}</td>
                        <td>{{ $registro->nome }}</td>
                        <td>{{ $registro->descricao }}</td>
                        <td>
                            @if($registro->nome != 'admin')
                            <a class="btn orange" href="{{ route('admin.papel.editar', $registro->id) }}">Editar</a>
                            @else
                            <a class="btn orange disabled">Editar</a>
                            @endif

                            @if($registro->nome != 'admin')
                            <a class="btn red" href="javascript: if(confirm('Deletar esse registro?')){
                                window.location.href = '{{ route('admin.papel.deletar', $registro->id) }}'
                            }">Deletar</a>
                            @else
                            <a class="btn orange disabled">Deletar</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <a class="btn blue" href="{{ route('admin.papel.adicionar') }}">Adicionar</a>
        </div>
    </div>
@endsection