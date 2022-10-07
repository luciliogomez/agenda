<div>
    <h2>LISTA DE CONTACTOS</h2>
</div>

<div>
    @foreach($pessoas as $pessoa)
        <ul>
            <li>Id: {{$pessoa->id}}</li>
            <li>Nome: {{$pessoa->nome}}</li>
            <li>Endereco: {{$pessoa->endereco}}</li>
        </ul>
    @endforeach
</div>

