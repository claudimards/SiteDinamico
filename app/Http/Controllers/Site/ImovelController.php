<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Imovel;
use Illuminate\Http\Request;

class ImovelController extends Controller
{
    public function index($id)
    {
        $imovel = Imovel::find($id);
        $galeria = $imovel->galeria()->orderBy('ordem')->get();

        $seo = [
            'titulo' => $imovel->titulo,
            'descricao' => $imovel->descricao,
            'imagem' => asset($imovel->imagem),
            'url' => route('site.imovel', [$imovel->id, str_replace(' ', '_', $imovel->titulo)])
        ];

        return view('site.imovel', compact('imovel', 'galeria', 'seo'));
    }
}
