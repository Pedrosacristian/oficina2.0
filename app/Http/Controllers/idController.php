<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orcamento;
use Illuminate\Support\Facades\Redis;

class idController extends Controller
{
    public function index(Request $request)
    {
        $date1 = ($request -> searchDate);           
        $date2 = ($request -> searchDate2);   
        $orcamentos = Orcamento::WHERE('id' , $request->search)
                                        ->orWHERE('client' , 'LIKE', "%{$request->search}%")
                                        ->orderby('time', 'desc')
                                        ->get();
               if ($request->searchv) {              
        $orcamentos = Orcamento::WHERE('vendedor' , 'LIKE', "%{$request->searchv}%")
                                ->orderby('time', 'desc')
                                ->get();
               }
               if ($request->searchDate) {
                $orcamentos = Orcamento::WhereBetween('time', [$date1, $date2])->get();
            }
               return view('orcamento.busca', compact('orcamentos'));
    }

    public function search(Request $request)
    {
        $orcamentos = Orcamento::WhereBetween('time', [$request->searchDate, $request->searchDate2])->get();
        return view('orcamento.busca', compact('orcamentos'));
    }
    
    public function create(){
        return view('orcamento.create');
    }


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

    public function destroy($id) {
        
        Orcamento::findOrFail($id)->delete();

        return redirect('/orcamento/busca')->with('msg', 'Orçamento excluído com sucesso!');
    }

    public function edit($id) {
        
        $orcamento = Orcamento::findOrFail($id);
        return view('orcamento.edit', ['orcamento' => $orcamento]);
    }
    
    public function update(Request $request) {

        Orcamento::findOrFail($request->id)->update($request->all());

        return redirect('/orcamento/busca')->with('msg', 'Orcamento editado com sucesso!');
    }
}


        