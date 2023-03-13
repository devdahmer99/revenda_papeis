<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $visible = ['id', 'text'];

    protected $appends = ['text'];

    protected $table = 'produtos';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nome',
        'descricao'
    ];

    public function buscarPorNome(string $nome) 
    {
        $nome = '%' . $nome . '%';

        return self::where('nome', 'LIKE', $nome)->get();
    }

    public function getTextAttribute(): string
    {
        return $this->attributes['nome'];
    }
}
