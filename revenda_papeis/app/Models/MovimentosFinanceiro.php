<?php

namespace App\Models;

use App\Models\Saldo;
use App\Models\Empresa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MovimentosFinanceiro extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'movimentos_financeiros';

    protected $primaryKey = 'id';

    protected $fillable = [
        'descricao',
        'valor',
        'tipo',
        'empresa_id'
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function saldo() 
    {
        return $this->morphOne(Saldo::class, 'movimento');
    }
}
