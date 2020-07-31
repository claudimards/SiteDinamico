<?php

use Illuminate\Database\Seeder;
use App\Pagina;

class PaginasSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $existe = Pagina::where('tipo', '=', 'sobre')->count();

        if($existe){
            $paginaSobre = Pagina::where('tipo', '=', 'sobre')->first();
        }else{
            $paginaSobre = new Pagina();
        }

        $paginaSobre->titulo = "Título da empresa";
        $paginaSobre->descricao = "Descrição breve sobre a empresa";
        $paginaSobre->texto = "Texto sobre a empresa";
        $paginaSobre->imagem = "img/modelo-img-home.bmp";
        $paginaSobre->mapa = '<iframe 
                src="https://www.google.com/maps/embed?
                pb=!1m18!1m12!1m3!1d3673.229275544551!2d-47.12888418558153!3d-22.
                978594984975327!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x
                94c8c9f1858984ad%3A0x94511e1cd69fe975!2sDic%20V%20
                (Conjunto%20Hab.%20Chico%20Mendes)%2C%20Campinas%20-%20SP%2C%2013054-500
                !5e0!3m2!1spt-BR!2sbr!4v1596138959120!5m2!1spt-BR!2sbr" width="450" height="300" 
                frameborder="0" style="border:0;" allowfullscreen="false" aria-hidden="false" tabindex="0">
            </iframe>';
        $paginaSobre->tipo = "sobre";
        $paginaSobre->save();
        echo "Página sobre criada com sucesso!\n";

        $existe = Pagina::where('tipo', '=', 'contato')->count();

        if($existe){
            $paginaContato = Pagina::where('tipo', '=', 'contato')->first();
        }else{
            $paginaContato = new Pagina();
        }

        $paginaContato->titulo = "Entre em contato";
        $paginaContato->descricao = "Preencha o formulário";
        $paginaContato->texto = "Contato";
        $paginaContato->imagem = "img/modelo-img-home.bmp";
        $paginaContato->email = "claudimards@gmail.com";
        $paginaContato->tipo = "contato";
        $paginaContato->save();
        echo "Página contato criada com sucesso!\n";
    }
}
