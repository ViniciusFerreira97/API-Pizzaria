<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Pizza as pizza;
use App\Pedido as pedido;

class PedidoController extends Controller
{
    public function novoPedido(Request $request)
    {
        $rules = [
            'telefone'  => 'required',
            'ids_pizza' => 'required',
        ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            $return['success'] = false;
            $return['data'] = $validator->errors()->all();
            return $return;
        }
        $pedido = new pedido();
        $pedido->telefone = $request->telefone;
        $pedido->save();
        foreach ($request->ids_pizza as $pizza)
            PizzaEmPedidoController::novoPizzaEmPedido($pedido->id_pedido,$pizza);
        $return['success'] = true;
        $return['data'] = $pedido;
        return $return;
    }

    public function alterarPedido(Request $request)
    {
        $rules = [
            'id_pedido' => 'required',
            'ids_pizza' => 'required'
        ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            $return['success'] = false;
            $return['data'] = $validator->errors()->all();
            return $return;
        }
        PizzaEmPedidoController::deletarPizzaEmPedido($request->id_pedido);
        foreach ($request->ids_pizza as $pizza)
            PizzaEmPedidoController::novoPizzaEmPedido($request->id_pedido,$pizza);
        $return['success'] = true;
        return $return;
    }

    public function getPedidos()
    {
        $pedidos = Pedido::get();
        $return['success'] = true;
        $return['data'] = $pedidos;
        return $return;
    }

    public function excluirPedido(Request $request)
    {
        $id_pedido = $request->query("id_pedido");
        
        $retorno['success'] = true;
        $pedido = pedido::where('id_pedido', '=', $id_pedido)->get();
        if(!isset($pedido) || $pedido == ''){
            $return['success'] = false;
            return $return;
        }
        PizzaEmPedidoController::deletarPizzaEmPedido($pedido);
        pedido::destroy($pedido);
        return $retorno;
    }
}
