<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Papel;
use Illuminate\Support\Facades\Session;

class PapelController extends Controller
{
    public function index()
    {
        $registros = Papel::all();
        return view('admin.papel.index', compact('registros'));
    }

    public function adicionar()
    {
        return view('admin.papel.adicionar');
    }

    public function salvar(Request $request)
    {
        Papel::create($request->all());

        return redirect(route('admin.papel'));
    }

    public function editar($id)
    {
        if(Papel::find($id)->nome == 'admin'){
            return redirect(route('admin.papel'));
        }

        $registro = Papel::find($id);

        return view('admin.papel.editar', compact('registro'));
    }

    public function atualizar(Request $request, $id)
    {
        if(Papel::find($id)->nome == 'admin'){
            return redirect(route('admin.papel'));
        }

        Papel::find($id)->update($request->all());

        Session::flash('mensagem', [
            'msg'=>'Registro atualizado com sucesso!',
            'class'=>'green white-text'
        ]);

        return redirect(route('admin.papel'));
    }

    public function deletar($id)
    {
        if(Papel::find($id)->nome == 'admin'){
            return redirect(route('admin.papel'));
        }

        Papel::find($id)->delete();

        Session::flash('mensagem', [
            'msg'=>'Registro deletado com sucesso!',
            'class'=>'red white-text'
        ]);

        return redirect(route('admin.papel'));
    }
}
