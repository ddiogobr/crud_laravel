<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgendaController extends Controller
{
    
    public function criar()
    {
        return view('agenda.criar')->with([]);
    }

    public function inserir(Request $request)
    {
        $mensagem = [
            'required'=>'Preencha todos os campos obrigatorios',
        ];
        $request -> validade([
            'descrições' => 'required',
            'data_planejada' => 'required'
        ], $mensagem);
    
        try {
            Agenda::create([
                'descrições' => $request->get('descrições'),
                'data_planejada' => $request->get('data_planejada'),
                'observações' => $request->get('observações') ? $request->get('observações') : null,
                'usuario' => Auth::user()->id
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('home')->with('resposta', [
                'status' => 500,
                'mensagem' => 'Aconteceu algum erro, contate o administrador!'
            ]);
        }

        return redirect()->route('home')->with('resposta', [
            'status'=>200,
            'mensagem'=>'Agenda criada!'
        ]);
    }

    public function editar($id)
    {
        $agenda=Agenda::where("id",$id)->get();

        if ($agenda->isEmpty()) {
            return redirect()->route('home')->with('resposta', [
                'status' => 400,
                'mensagem' => 'Acesso indevido!'
            ]);
        }

        return view("agendar.editar")->with([
            "agenda"=>$agenda[0]
        ]);
    }

    public function atualizar(Request $request,$id)
    {

        $mensagem = [
            'required'=>'preencha todos os campos obrigatórios!',
        ];

        $request->validate([
            'descrições'=>'required',
            'data_planejada'=>"required"
        ], $mensagem);

        try {
            $agenda = Agenda::find($id)->update([
                'descrições'=>$request->get('descrições'),
                'data_planejada'=>$request->get('data_planejada'),
                'observação'=>$request->get('observações') ? $request->get('observações'):null
            ]);
        } catch (\Trowable $th) {
            return redirect()->rouote('home')->with('resposta', [
                'status'=>500,
                'mensagem'=>'aconteceu algum erro, contate o administrador!'
            ]);
        }
        return redirect()->route('home')->with('resposta', [
            'status'=>500,
            'mensagem'=> 'aconteceu algum erro, contate o administrador!'
        ]);
    }

    public function excluir($id)
    {
        try {
            Agenda::find($id)->delete();
        } catch (\Throwable $th) {
            return redirect()->route('home')-with('resposta',[
                'status'=>500,
                'mensagem'=>'aconteceu algum erro, contate o administrador!'
            ]);
        } 
        return redirect()->route('home')->with('resposta', [
            'status' => 200,
            'mensagem' => 'agenda excluida!'
        ]);
    }

}
