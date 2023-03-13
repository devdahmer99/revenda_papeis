<?php

namespace App\Models;

use App\Models\MovimentoEstoque;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Empresa extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'tipo',
        'nome',
        'razao_social',
        'documento',
        'ie_rg',
        'nome_contato',
        'celular',
        'email',
        'telefone',
        'cep',
        'logradouro',
        'bairro',
        'cidade',
        'estado',
        'observacao'
    ];

    protected $visible = [
        'id', 'text'
    ];

    protected $appends = [
        'text'
    ];

    public function movimentoEstoque() 
    {
        return $this->hasMany(MovimentoEstoque::class);
    }

    


}
