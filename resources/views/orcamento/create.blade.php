<div id="create-orcamento-container" class="col-md-6 offset-md-3">
<h1> Cadastrar um novo orçamento </h1>
    <form action='/orcamento' method='post'>
        @csrf
        <div class='form-group'>
            <label for='title'>Cliente:</label>
            <input type='text' class='form-control' id='client' name='client' >
        </div>
        <div class='form-group'>
            <label for='title'>Vendedor:</label>
            <input type='text' class='form-control' id='vendedor' name='vendedor' >
        </div>
        <div class='form-group'>
            <label for='title'>Descricao:</label>
            <textarea name= 'description' id='description' class='form-control' > </textarea>
        </div>
        <div class='form-group'>
            <label for='title'>Valor:</label>
            <input type='number' step='0.01' class='form-control' id='valor' name='valor' >
        </div>
        <div class='form-group'>
            <label for='title'>Data e hora:</label>
            <input type='datetime-local' class='form-control' id='time' name='time' >
        </div>
        <input type='submit' class='btn btm primary' value='Cadastrar Orçamento'>
    </form>
</div>
<footer>
        <p> Oficina 2.0 &copy; 2022</p>
      </footer>     


