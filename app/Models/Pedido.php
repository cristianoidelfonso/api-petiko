<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Traits\TraitUuid;


class Pedido extends Model
{
    use HasFactory, TraitUuid;

    protected $table = 'pedidos';

    protected $fillable = [
        'nome',
        'email',
        'cpf',
        'cep',
        'rua',
        'numero',
        'bairro',
        'complemento',
        'cidade',
        'estado',
    ];

    // Um Pedido pertence a um usuário
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Um Pedido possui muitos produtos
    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }
}
