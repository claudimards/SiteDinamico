<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tipo;
use Illuminate\Support\Facades\Session;
use App\Imovel;

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
        if(Imovel::where('tipo_id', '=', $id)->count()){
            $msg = "Não é possível deletar esse TIPO de imóvel! Os imóveis (";
            $imoveis = Imovel::where('tipo_id', '=', $id)->get();
            foreach($imoveis as $imovel){
                $msg.= "nome: ". $imovel->titulo .", ";
            }
            $msg.= ") estão relacionados.";

            Session::flash('mensagem', [
                'msg'=> $msg,
                'class'=>'red white-text'
            ]);
            
            return redirect(route('admin.tipos'));
        }

        Tipo::find($id)->delete();

        Session::flash('mensagem', [
            'msg'=>'Registro deletado com sucesso!',
            'class'=>'green white-text'
        ]);

        return redirect(route('admin.tipos'));
    }
}
