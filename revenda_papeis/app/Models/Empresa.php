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

    public static function buscarPorNomeTipo(string $nome, string $tipo)
    {
        $nome = '%' . $nome . '%';
        
        return self::where('nome', 'LIKE', $nome)
                    ->where('tipo', $tipo)
                    ->get();
    }

    public static function buscarPorId(int $id)
    {
        return self::with([
            'movimentosEstoque' => function($query) {
                $query->latest()->take(5);
            },
            'movimentosEstoque' => function($q) {
                $q->withTrashed();
            }
        ])
        ->findOrFail($id);
    }


    public function getTextAttribuite(): string
    {
        return \sprintf(
            '%s (%s)',
            $this->attributes['nome'],
            $this->attributes['razao_social']
        );
    }

}
