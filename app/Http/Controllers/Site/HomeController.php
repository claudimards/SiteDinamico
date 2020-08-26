<?php

namespace App\Http\Controllers\Site;

use App\Cidade;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imovel;
use App\Slide;
use App\Tipo;

class HomeController extends Controller
{
    public function index()
    {
        $imoveis = Imovel::where('publicar', '=', 'sim')->orderBy('id', 'desc')->paginate(8);
        $slides = Slide::where('publicado', '=', 'sim')->orderBy('ordem')->get();
        $paginacao = true;
        $tipos = Tipo::orderBy('titulo')->get();
        $cidades = Cidade::orderBy('nome')->get();

        return view('site.home', compact('imoveis', 'slides', 'paginacao', 'tipos', 'cidades'));
    }

    public function busca(Request $request)
    {
        $busca = $request->all();
        $imoveis = Imovel::where('publicar', '=', 'sim')->orderBy('id', 'desc')->get();
        $paginacao = false;
        $tipos = Tipo::orderBy('titulo')->get();
        $cidades = Cidade::orderBy('nome')->get();

        dd($busca);

        return view('site.busca', compact('busca', 'imoveis', 'paginacao', 'tipos', 'cidades'));
    }
}
