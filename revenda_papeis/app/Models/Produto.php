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
}
