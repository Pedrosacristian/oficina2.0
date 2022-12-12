
       <h1> Busque Orçamentos </h1>
           // Entrada de dados para a execução da pesquisa
           // nome ou id
            <div id="search-container" class="col-md-12">
            <form action='/orcamento/busca' method="get">
                @csrf
                <input type='text' id='search' name='search' class='form-control'> 
                <button type='submit'>Buscar Por ID ou cliente</button>
            </form>
        </div>
        // vendedor
        <div id="search-container" class="col-md-12">
            <form action='/orcamento/busca' method="get">
                @csrf
                <input type='text' id='search' name='searchv' class='form-control'> 
                <button type='submit'>Buscar por vendedor</button>
            </form>
        </div>
        // intervalo de datas
        <div id="search-container" class="col-md-12">
            <form action='/orcamento/busca' method="get">
                @csrf
                <input type='datetime-local' id='searchDate' name='searchDate' class='form-control'> 
                <input type='datetime-local' id='searchDate2' name='searchDate2' class='form-control'> 
                <button type='submit'>Filtrar por datas:</button>
            </form>
        </div>
        // Simples tabela para apresentar os orçamentos 
        <table>
        <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width, initial-scale=1.0'>
    
            <thead>
                <tr>
                    <th> ID  /</th> 
                    <th> Cliente  /</th> 
                    <th> Vendedor  /</th> 
                    <th> Descrição  /</th> 
                    <th> Data e hora </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orcamentos as $orcamento)
                    <tr>
                    <td>{{$orcamento->id}}</td>
                    <td>{{$orcamento->client}}</td>
                    <td>{{$orcamento->vendedor}}</td>
                    <td>{{$orcamento->description}}</td>
                    <td>{{$orcamento->time}}</td>
                    <td>
                    <a href='/orcamento/edit/{{ $orcamento->id }}' class='btn btn-info edit-btn' >Editar </a>
                    <form action='/orcamento/{{ $orcamento->id }}' method='post'>
                    @csrf
                    @method('DELETE')
                    <button type='submit' class='btn btn-danger delete-btn' name='trash-outline'> Deletar </button>
                    </form>                  
                         </td>
</tr>
                @endforeach
            </tbody>
        </table>
        <footer>
        <p> Oficina 2.0 &copy; 2022</p>
      </footer>     
 
