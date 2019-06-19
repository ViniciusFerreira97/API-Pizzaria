<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Cliente as cliente;

class ClienteController extends Controller
{
    public function inserirCliente(Request $request)
    {
        $rules = [
            'telefone' => 'required',
            'nome' => 'required',
        ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            $return['success'] = false;
            $return['data'] = $validator->errors()->all();
            return $return;
        }
        $return['success'] = true;

        $cliente = new cliente();
        $cliente->telefone = $request->telefone;
        $cliente->nome = $request->nome;
        $cliente->save();
        $return['data']= $cliente;

        return $return;
    }

    public function alterarCliente(Request $request)
    {
        $rules = [
            'telefone' => 'required',
            'nome' => 'required',
        ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            $return['success'] = false;
            $return['data'] = $validator->errors()->all();
            return $return;
        }
        $cliente = cliente::find($request->telefoneAntigo);
        if(!isset($cliente) || $cliente == ''){
            $return['success'] = false;
            return $return;
        }
        
        $return['success'] = true;
        $cliente->telefone = $request->telefoneNovo;
        $cliente->nome = $request->nome;
        $cliente->save();
        
        return $return;
    }

    public function getClientes()
    {
        $clientes = cliente::get();
        if(!isset($clientes) || $clientes == ''){
            $return['success'] = false;
            return $return;
        }
        $return['success'] = true;
        $return['data'] = [];
        $count = 0;
        foreach($clientes as $c)
        {
            $return['data'][$count]['telefone'] = $c->telefone;
            $return['data'][$count]['nome'] = $c->nome;
            $count ++;
        }

        return $return;
    }

    public function excluirCliente(Request $request)
    {
        $telefone = $request->query("telefone");

        $retorno['success'] = true;
        $cliente = cliente::find($telefone);
        if(!isset($cliente) || $cliente == ''){
            $return['success'] = false;
            return $return;
        }
        cliente::destroy($cliente);
        return $retorno;
    }
}
