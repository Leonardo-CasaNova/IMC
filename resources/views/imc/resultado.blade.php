<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado IMC</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
            font-size: 28px;
        }

        .resultado-box {
            background: #f8f9fa;
            padding: 25px;
            border-radius: 8px;
            border-left: 5px solid #667eea;
            margin-bottom: 20px;
            text-align: center;
        }

        .label {
            color: #666;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .valor {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
        }

        .classificacao {
            padding: 15px;
            border-radius: 5px;
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .abaixo-peso {
            background: #3498db;
            color: white;
        }

        .peso-normal {
            background: #2ecc71;
            color: white;
        }

        .sobrepeso {
            background: #f39c12;
            color: white;
        }

        .obesidade {
            background: #e74c3c;
            color: white;
        }

        .detalhes {
            background: #ecf0f1;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .detalhes-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid #bdc3c7;
        }

        .detalhes-row:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .detalhes-label {
            color: #7f8c8d;
            font-weight: 600;
        }

        .detalhes-valor {
            color: #333;
            font-weight: bold;
        }

        button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s;
        }

        button:hover {
            transform: translateY(-2px);
        }

        button:active {
            transform: translateY(0);
        }

        .info-box {
            background: #fff3cd;
            padding: 12px;
            border-radius: 5px;
            border-left: 4px solid #ffc107;
            margin-top: 20px;
            font-size: 13px;
            color: #856404;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>📊 Resultado IMC</h1>

        <div class="resultado-box">
            <div class="label">IMC</div>
            <div class="valor">{{ $imc }}</div>
        </div>

        @php
            $classe = 'abaixo-peso';
            if (str_contains($classificacao, 'normal')) {
                $classe = 'peso-normal';
            } elseif (str_contains($classificacao, 'Sobrepeso')) {
                $classe = 'sobrepeso';
            } elseif (str_contains($classificacao, 'Obesidade')) {
                $classe = 'obesidade';
            }
        @endphp

        <div class="classificacao {{ $classe }}">
            {{ $classificacao }}
        </div>

        <div class="detalhes">
            <div class="detalhes-row">
                <span class="detalhes-label">Peso:</span>
                <span class="detalhes-valor">{{ $peso }} kg</span>
            </div>
            <div class="detalhes-row">
                <span class="detalhes-label">Altura:</span>
                <span class="detalhes-valor">{{ $altura }} m</span>
            </div>
            <div class="detalhes-row">
                <span class="detalhes-label">IMC:</span>
                <span class="detalhes-valor">{{ $imc }}</span>
            </div>
        </div>

        <div class="info-box">
            <strong>Referência:</strong> Abaixo: &lt;18,5 | Normal: 18,5-24,9 | Sobrepeso: 25-29,9 | Obesidade: ≥30
        </div>

        <form action="{{ route('imc.index') }}" method="GET" style="margin-top: 20px;">
            <button type="submit">Calcular Novamente</button>
        </form>
    </div>
</body>
</html>
