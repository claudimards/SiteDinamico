<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pagina;

class PaginaController extends Controller
{
    public function index()
    {
        $paginas = Pagina::all();
        return view('admin.paginas.index', compact('paginas'));
    }

    public function editar($id)
    {
        $pagina = Pagina::find($id);
        return view('admin.paginas.editar', compact('pagina'));
    }

    public function atualizar(Request $request, $id)
    {

    }
}
