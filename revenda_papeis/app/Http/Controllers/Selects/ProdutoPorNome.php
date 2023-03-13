<?php 

namespace App\Http\Controllers\Selects;

use App\Models\Produto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class produtoPorNome extends Controller {
    public function __invoke(Request $request) 
    {
        $nome = $request->nome ?? '';
        return Produto::buscarPorNome($nome);
    }
}