<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    protected $table = "imoveis";

    public function tipo()
    {
        // configurando o relacionamento da tabela
        return $this->belongsTo('App\Tipo', 'tipo_id');
    }

    public function cidade()
    {
        // configurando o relacionamento da tabela
        return $this->belongsTo('App\Cidade', 'cidade_id');
    }
}
