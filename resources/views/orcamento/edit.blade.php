<div id="create-orcamento-container" class="col-md-6 offset-md-3">
    <h1> Editando orçamento: {{$orcamento -> id}}</h1>
        <form action='/orcamento/update/ {{ $orcamento->id }}' method='post'>
            @csrf
            @method('PUT')
            <div class='form-group'>
                <label for='title'>Cliente:</label>
                <input type='text' class='form-control' id='client' name='client' value= '{{$orcamento->client}}' >
            </div>
            <div class='form-group'>
                <label for='title'>Vendedor:</label>
                <input type='text' class='form-control' id='vendedor' name='vendedor' value= '{{$orcamento->vendedor}}'>
            </div>
            <div class='form-group'>
                <label for='title'>Descricao:</label>
                <textarea name= 'description' id='description' class='form-control' value= '{{$orcamento->description}}'> </textarea>
            </div>
            <div class='form-group'>
                <label for='title'>Valor:</label>
                <input type='number' step='0.01' class='form-control' id='valor' name='valor' value= '{{$orcamento->valor}}'>
            </div>
            <div class='form-group'>
                <label for='title'>Data e hora:</label>
                <input type='datetime-local' class='form-control' id='time' name='time' >
            </div>
            <input type='submit' class='btn btm primary' value='Editar orçamento' value= '{{$orcamento->time}}'>
        </form>
    </div>
</div>
<footer>
        <p> Oficina 2.0 &copy; 2022</p>
      </footer>     
