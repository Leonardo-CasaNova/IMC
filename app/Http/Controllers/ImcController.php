<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        
        $imc = $peso / ($altura * $altura);
        
        $classificacao = $this->classificarImc($imc);

        return view('imc.resultado', [
            'peso' => $peso,
            'altura' => $altura,
            'imc' => number_format($imc, 2, ',', '.'),
            'classificacao' => $classificacao
        ]);
    }

    private function classificarImc($imc)
    {
        if ($imc < 18.5) {
            return 'Abaixo do peso';
        } elseif ($imc < 25) {
            return 'Peso normal';
        } elseif ($imc < 30) {
            return 'Sobrepeso';
        } else {
            return 'Obesidade';
        }
    }
}
