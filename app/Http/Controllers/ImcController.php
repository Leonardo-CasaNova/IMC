<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imc;

class ImcController extends Controller
{
    public function index()
    {
        return view('imc.index');
    }

    public function calcular(Request $request)
    {
        $validated = $request->validate([
            'peso' => 'required|numeric|min:1',
            'altura' => 'required|numeric|min:0.5|max:3',
        ]);

        $peso = $validated['peso'];
        $altura = $validated['altura'];
        
        // Usa o model para calcular e classificar
        $resultado = Imc::processar($peso, $altura);

        return view('imc.resultado', [
            'peso' => $peso,
            'altura' => $altura,
            'imc' => number_format($resultado['imc'], 2, ',', '.'),
            'classificacao' => $resultado['classificacao']
        ]);
    }
}
