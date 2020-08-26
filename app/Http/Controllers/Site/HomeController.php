<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imovel;

class HomeController extends Controller
{
    public function index()
    {
        $imoveis = Imovel::orderBy('id', 'desc')->paginate(8);

        return view('site.home', compact('imoveis'));
    }
}
