<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orcamento;
use Illuminate\Support\Facades\Redis;

class idController extends Controller
{
    // Função do filtro de pesquisa
    public function index(Request $request)
    {
        // Atribuindo os valores das datas para utilizar na query
        $date1 = ($request -> searchDate);           
        $date2 = ($request -> searchDate2); 
        // Filtro de id e cliente
        $orcamentos = Orcamento::WHERE('id' , $request->search)
                                        ->orWHERE('client' , 'LIKE', "%{$request->search}%")
                                        ->orderby('time', 'desc')
                                        ->get();
        // Filtro de vendedor
               if ($request->searchv) {              
        $orcamentos = Orcamento::WHERE('vendedor' , 'LIKE', "%{$request->searchv}%")
                                ->orderby('time', 'desc')
                                ->get();
               }
        // Filtro de datas (onde usamos os valores atribuidos acima)
               if ($request->searchDate) {
                $orcamentos = Orcamento::WhereBetween('time', [$date1, $date2])->get();
            }
               return view('orcamento.busca', compact('orcamentos'));
    }

    public function create(){
        return view('orcamento.create');
    }

    // Função de receber dados para inseri-los na data base
    public function store(Request $request){
        
        $orcamento = new Orcamento;

        $orcamento-> client = $request->client;
        $orcamento-> vendedor = $request->vendedor;
        $orcamento-> description = $request->description;
        $orcamento-> valor = $request->valor;
        $orcamento-> time = $request->time;

        $orcamento->save();

        return redirect('/')->with('msg', 'Orcamento cadastrado com sucesso!');
    }   
    // Função de exclusão de orçamentos
    public function destroy($id) {
        
        Orcamento::findOrFail($id)->delete();

        return redirect('/orcamento/busca')->with('msg', 'Orçamento excluído com sucesso!');
    }
    // Função de edição de orçamentos    
    public function edit($id) {
        
        $orcamento = Orcamento::findOrFail($id);
        return view('orcamento.edit', ['orcamento' => $orcamento]);
    }
    // Função de atulaização de orçamentos no banco de dados
    public function update(Request $request) {

        Orcamento::findOrFail($request->id)->update($request->all());

        return redirect('/orcamento/busca')->with('msg', 'Orcamento editado com sucesso!');
    }
}


        
