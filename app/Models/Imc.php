<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imc extends Model
{
    protected $fillable = ['peso', 'altura', 'imc', 'classificacao'];

    /**
     * Calcula o IMC baseado em peso e altura
     *
     * @param float $peso Peso em kg
     * @param float $altura Altura em metros
     * @return float
     */
    public static function calcularImc($peso, $altura)
    {
        return $peso / ($altura * $altura);
    }

    /**
     * Classifica o IMC conforme tabela da OMS
     *
     * @param float $imc Valor do IMC
     * @return string Classificação do IMC
     */
    public static function classificarImc($imc)
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

    /**
     * Processa o cálculo e classificação do IMC
     *
     * @param float $peso Peso em kg
     * @param float $altura Altura em metros
     * @return array Array com imc e classificacao
     */
    public static function processar($peso, $altura)
    {
        $imc = self::calcularImc($peso, $altura);
        $classificacao = self::classificarImc($imc);

        return [
            'imc' => $imc,
            'classificacao' => $classificacao
        ];
    }
}
