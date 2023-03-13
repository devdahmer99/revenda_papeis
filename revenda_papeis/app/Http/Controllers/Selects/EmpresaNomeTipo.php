<?php 

namespace App\Http\Controllers\Selects;

use App\Models\Empresa;
use App\Models\Produto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmpresaNomeTipo extends Controller {
    public function __invoke(Request $request) 
    {
        $tipo = $request->tipo == 'entrada' ? 'cliente' : 'fornecedor';
        $nome = $request->nome ?? '';

        return Empresa::buscarPorNomeTipo($nome, $tipo);
    }
}