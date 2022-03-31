<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuscaEnderecoCepController extends Controller
{
    public function buscaEnderecoPorCep($cep)
    {
        $url = "https://viacep.com.br/ws/{$cep}/json/";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $dados = json_decode(curl_exec($ch), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        curl_close($ch);

        return $dados;
    }
}
