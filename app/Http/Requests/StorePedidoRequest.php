<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StorePedidoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome'  => 'required',
            // 'email' => 'required|email|exists:users,email',
            'email' => 'required|email',
            'cpf'   => 'required',
            'cep'   => 'required',
            'logradouro'   => 'required',
            'numero'   => 'required',
            'bairro'   => 'required',
            // 'complemento'   => 'required',
            'localidade'   => 'required',
            'uf'   => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required'  => 'O campo :attribute é obrigatório.',
            'email.exists' => 'Email não cadastrado.'
        ];
    }

    public function withValidator($validator)
    {

        if ($validator->fails()) {
            throw new HttpResponseException(response()->json([
                'msg'   => 'Ops! Algum campo obrigatório não foi preenchido corretamente.',
                'status' => false,
                'errors'    => $validator->errors(),
                'url'    => route('pedidos.store')
            ], 403));
       }
    }
}
