<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tipo;
use Illuminate\Support\Facades\Session;

class TipoController extends Controller
{
    public function index()
    {
        $registros = Tipo::all();
        return view('admin.tipos.index', compact('registros'));
    }

    public function adicionar()
    {
        return view('admin.tipos.adicionar');
    }

    public function salvar(Request $request)
    {
        $dados = $request->all();
        $registro = new Tipo();
        $registro->tipo = $dados['tipo'];
        $registro->save();

        Session::flash('mensagem', [
            'msg'=>'Registro adicionado com sucesso!',
            'class'=>'green white-text'
        ]);

        return redirect(route('admin.tipos'));
    }

    public function editar($id)
    {
        $registro = Tipo::find($id);
        return view('admin.tipos.editar', compact('registro'));
    }

    public function atualizar(Request $request, $id)
    {
        $registro = Tipo::find($id);
        $dados = $request->all();
        $registro->tipo = $dados['tipo'];
        $registro->update();

        Session::flash('mensagem', [
            'msg'=>'Registro atualizado com sucesso!',
            'class'=>'green white-text'
        ]);

        return redirect(route('admin.tipos'));
    }

    public function deletar($id)
    {
        Tipo::find($id)->delete();

        Session::flash('mensagem', [
            'msg'=>'Registro deletado com sucesso!',
            'class'=>'green white-text'
        ]);

        return redirect(route('admin.tipos'));
    }
}
