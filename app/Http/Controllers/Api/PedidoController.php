<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePedidoRequest;
use App\Models\User;
use App\Models\Pedido;

class PedidoController extends Controller
{
    public function __construct(public Pedido $pedido)
    {

    }

    public function index()
    {
        $pedidos = Pedido::get(['nome', 'email', 'cpf', 'created_at']);
        return response($pedidos, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePedidoRequest $request)
    {
        try{
            $data = $this->pedido->create($request->all());
            return response()->json($data, 201);

        }catch(\Throwable|\Exception $e){
            return response()->json($e);
            // return ResponseService::exception('pedido.store', null, $e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
