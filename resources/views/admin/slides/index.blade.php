@extends('layouts.app')
@section('content')
    <div class="container">
        <h2 class="center">Lista de Slides</h2>
        <div class="row">
            <nav>
                <div class="nav-wrapper green">
                <div class="col s12">
                    <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
                    <a class="breadcrumb">Lista de Slides</a>
                </div>
                </div>
            </nav>            
        </div>
        <div class="row">
            <table>
                <thead>
                    <tr>
                        <th>ORDEM</th>
                        <th>TÍTULO</th>
                        <th>DESCRIÇÃO</th>
                        <th>PUBLICADO</th>
                        <th>IMAGEM</th>
                        <th>AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($registros as $registro)
                    <tr>
                        <td>{{ $registro->ordem }}</td>
                        <td>{{ $registro->titulo }}</td>
                        <td>{{ $registro->descricao }}</td>
                        <td>{{ $registro->publicado }}</td>
                        <td><img width="100" src="{{ asset($registro->imagem) }}"></td>
                        <td>
                            <a class="btn orange" href="{{ route('admin.slides.editar', $registro->id) }}">Editar</a>
                            <a class="btn red" href="javascript: if(confirm('Deletar esse registro?')){
                                window.location.href = '{{ route('admin.slides.deletar', $registro->id) }}'
                            }">Deletar</a>
                            <a></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <a class="btn blue" href="{{ route('admin.slides.adicionar') }}">Adicionar</a>
        </div>
    </div>
@endsection