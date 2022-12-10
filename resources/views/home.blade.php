<body>
        <h1> Oficina 2.0 </h1>
        <div> 
            <ul class= 'navbar-nav'>
                <li class='nav-item'>
                    <a href='/orcamento/create' class='nav-link'> Cadastrar Orçamento</a>
                </li>  
                <li class='nav-item'>
                    <a href='/orcamento/busca' class='nav-link'> Buscar orçamentos</a>
                </li>
            </ul>
        </div>
     </body>  

     <maiin>
        <div class='container-fluid'>
            <div class='row'>
                @if(session('msg'))
                 <p class='msg'>{{ session('msg') }} </p>
                @endif
                @yield('content')
            </div>
            
        </div>
     </maiin>
    <footer>
        <p> Oficina 2.0 &copy; 2022</p>
      </footer>     
