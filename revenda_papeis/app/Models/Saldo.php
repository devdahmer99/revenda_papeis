<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Saldo extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'saldo';

    protected $fillable = [
        'valor', 
        'empresa_id'
    ];

    public function movimento() 
    {
        return $this->morphTo();
    }
}
