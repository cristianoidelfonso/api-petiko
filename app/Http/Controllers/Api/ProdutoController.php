<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $produtos = Produto::get()->toJson(JSON_PRETTY_PRINT);
        $produtos = Produto::latest()->get();
        return response($produtos, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produto = new Produto;
        $produto->nome = $request->nome;
        $produto->preco = $request->preco;
        $produto->descricao = $request->descricao;
        $produto->save();

        return response()->json([
            "message" => "Produto cadastrado com sucesso",
            $produto
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Produto::where('id', $id)->exists()) {
            $produto = Produto::where('id', $id)->get();
            return response($produto, 200);
        } else {
            return response()->json([
            "message" => "Produto não encontrado"
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Produto::where('id', $id)->exists()) {
            $produto = Produto::find($id);
            $produto->nome = is_null($request->nome) ? $produto->nome : $request->nome;
            $produto->preco = is_null($request->preco) ? $produto->preco : $request->preco;
            $produto->descricao = is_null($request->descricao) ? $produto->descricao : $request->descricao;
            $produto->save();

            return response()->json([
                "message" => "Produto atualizado com sucesso"
            ], 200);

        } else {
            return response()->json([
                "message" => "Produto não encontrado"
            ], 404);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Produto::where('id', $id)->exists()) {
            $produto = Produto::find($id);
            $produto->delete();

            return response()->json([
                "message" => "Produto deletado com sucesso"
            ], 202);
        } else {
            return response()->json([
                "message" => "Produto não encontrado"
            ], 404);
        }
    }
}
