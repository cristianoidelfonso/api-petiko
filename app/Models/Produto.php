<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Traits\TraitUuid;

class Produto extends Model
{
    use HasFactory, TraitUuid;

    protected $table = 'produtos';

    protected $fillable = ['nome', 'preco', 'descricao'];

    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class);
    }

}
