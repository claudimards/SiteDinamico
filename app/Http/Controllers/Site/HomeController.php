<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imovel;
use App\Slide;

class HomeController extends Controller
{
    public function index()
    {
        $imoveis = Imovel::orderBy('id', 'desc')->paginate(8);
        $slides = Slide::where('publicado', '=', 'sim')->orderBy('ordem')->get();

        return view('site.home', compact('imoveis', 'slides'));
    }
}
