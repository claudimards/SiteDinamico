<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pagina;

class PaginaController extends Controller
{
    public function sobre()
    {
        $pagina = Pagina::where('tipo', '=', 'sobre')->first();
        return view('site.sobre', compact('pagina'));
    }

    public function contato()
    {
        $pagina = Pagina::where('tipo', '=', 'contato')->first();
        return view('site.contato', compact('pagina'));
    }

    public function enviarContato(Request $request)
    {
        
    }
}
