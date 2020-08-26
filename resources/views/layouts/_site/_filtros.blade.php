<div class="row">
    <form action="{{ route('site.busca') }}">
        <div class="input-field col s6 m4">
            <select name="status">
                <option value="todos">Alguel e Venda</option>
                <option value="aluga">Aluga</option>
                <option value="vende">Vende</option>
            </select>
            <label>Status</label>
        </div>
        <div class="input-field col s6 m4">
            <select name="tipo_id">
                <option value="todos">Todos</option>
                @foreach($tipos as $tipo)
                <option value="{{ $tipo->id }}">{{ $tipo->tipo }}</option>
                @endforeach
            </select>
            <label>Tipo de Imóvel</label>
        </div>
        <div class="input-field col s6 m4">
            <select name="cidade_id">
                <option value="todas">Todas</option>
                @foreach($cidades as $cidade)
                <option value="{{ $cidade->id }}">{{ $cidade->nome }}</option>
                @endforeach
            </select>
            <label>Cidade</label>
        </div>
        <div class="input-field col s6 m3">
            <select name="dormitorios">
                <option value="todos">Todos</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">Mais</option>
            </select>
            <label>Dormitórios</label>
        </div>
        <div class="input-field col s12 m4">
            <select name="valor">
                <option value="todos">Todos</option>
                <option value="1">Até R$ 500,00</option>
                <option value="2">R$ 500,00 a 1.000,00</option>
                <option value="3">R$ 1.001,00 a 5.000,00</option>
                <option value="4">R$ 5.001,00 a 10.000,00</option>
                <option value="5">R$ 10.001,00 a 50.000,00</option>
                <option value="6">R$ 50.001,00 a 100.000,00</option>
                <option value="7">R$ 100.001,00 a 200.000,00</option>
                <option value="8">R$ 200.001,00 a 300.000,00</option>
                <option value="9">R$ 300.001,00 a 500.000,00</option>
                <option value="10">R$ 500.001,00 a 1.000.000,00</option>
                <option value="11">Acima de R$ 1.000.000,00</option>
            </select>
            <label>Valor</label>
        </div>
        <div class="input-field col s12 m3">
            <input class="validate" type="text" name="bairro">
            <label for="bairro">Bairro</label>
        </div>
        <div class="input-field col s12 m2">
            <button class="btn deep-orange darken-1 right">Filtrar</button>
        </div>
    </form>
</div>