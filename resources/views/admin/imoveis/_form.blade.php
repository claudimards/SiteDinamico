<div class="input-field">
    <input type="text" name="titulo" class="validate" 
        value="{{ isset($registro->titulo) ? $registro->titulo : '' }}">
    <label>Título</label>
</div>
<div class="input-field">
    <input type="text" name="descricao" class="validate" 
        value="{{ isset($registro->descricao) ? $registro->descricao : '' }}">
    <label>Descrição</label>
</div>
<div class="row">
    <div class="file-field input-field col m6 s12">
        <div class="btn">
            <span>Imagem</span>
            <input type="file" name="imagem">
        </div>
        <div class="file-path-wrapper">
            <input type="text" class="file-path validate">
        </div>
    </div>
    <div class="col m6 s12">
    @if(isset($registro->imagem))
        <img width="120" src="{{ asset($registro->imagem) }}">
    @endif
    </div>
</div>
<div class="input-field col s12">
    <select name="status">
        <option value="aluga" 
            {{ (isset($registro->status) && $registro->status === 'aluga' ? 'selected' : '') }}>Aluga</option>
        <option value="vende"
            {{ (isset($registro->status) && $registro->status === 'vende' ? 'selected' : '') }}>Vende</option>
    </select>
    <label for="status">Status</label>
</div>
<div class="input-field col s12">
    <select name="tipo_id">
        @foreach($tipos as $tipo)
        <option value="{{ $tipo->id }}" {{ (isset($registro->tipo_id) && $registro->tipo_id == $tipo->id ? 'selected' : '') }}>
            {{ $tipo->tipo }}
        </option>
        @endforeach
    </select>
    <label for="tipo_id">Tipo do Imóvel</label>
</div>
<div class="input-field col s12">
    <input type="text" name="endereco" class="validate"
        value="{{ (isset($registro->endereco) ? $registro->endereco : '') }}">
    <label for="endereco">Endereço</label>
</div>
<div class="input-field col s12">
    <input type="text" name="cep" class="validate"
        value="{{ (isset($registro->cep) ? $registro->cep : '') }}">
    <label for="cep">CEP (Ex: XXXXX-XXX)</label>
</div>
<div class="input-field col s12">
    <select name="cidade_id">
    @foreach($cidades as $cidade)
        <option value="{{ $cidade->id }}" {{ (isset($registro->cidade_id) && $registro->cidade_id == $cidade->id ? 'selected' : '') }}>
            {{ $cidade->nome }}
        </option>
    @endforeach
    </select>
    <label for="cidade_id">Cidade</label>
</div>
<div class="input-field col s12">
    <input type="text" name="valor" class="validate"
        value="{{ (isset($registro->valor) ? $registro->valor : '') }}">
    <label for="valor">Valor (Ex: 234.90)</label>
</div>
<div class="input-field col s12">
    <input type="text" name="dormitorios" class="validate"
        value="{{ (isset($registro->dormitorios) ? $registro->dormitorios : '') }}">
    <label for="dormitorios">Dormitórios (Ex: 3)</label>
</div>
<div class="input-field col s12">
    <input type="text" name="detalhes" class="validate"
        value="{{ (isset($registro->detalhes) ? $registro->detalhes: '') }}">
    <label for="detalhes">Detalhes</label>
</div>
<div class="input-field col s12">
    <textarea name="mapa" class="materialize-textarea">
        {{ (isset($registro->mapa) ? $registro->mapa : '') }}
    </textarea>
    <label for="mapa">Mapa (Cole o iframe do Google Maps)</label>
</div>
<div class="input-field col s12">
    <select name="publicar">
        <option value="nao" {{ (isset($registro->publicar) && $registro->publicar === 'nao' ? 'selected' : '') }}>Não</option>
        <option value="sim" {{ (isset($registro->publicar) && $registro->publicar === 'sim' ? 'selected' : '') }}>Sim</option>
    </select>
    <label for="publicar">Publicar?</label>
</div>