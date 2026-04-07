<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado IMC</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 20px;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border: 1px solid #ccc;
        }

        h1 {
            font-size: 20px;
            margin-bottom: 15px;
        }

        .resultado-box {
            background: #f9f9f9;
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 15px;
            text-align: center;
        }

        .valor {
            font-size: 28px;
            font-weight: bold;
            margin: 10px 0;
        }

        .classificacao {
            padding: 10px;
            border: 1px solid #999;
            margin-bottom: 15px;
            font-weight: bold;
            text-align: center;
        }

        .detalhes {
            background: #f9f9f9;
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .detalhes-row {
            display: flex;
            justify-content: space-between;
            padding: 5px 0;
            border-bottom: 1px solid #ddd;
        }

        .detalhes-row:last-child {
            border-bottom: none;
        }

        button {
            width: 100%;
            padding: 8px;
            background: #666;
            color: white;
            border: 1px solid #333;
            font-size: 14px;
            cursor: pointer;
        }

        button:hover {
            background: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Resultado IMC</h1>

        <div class="resultado-box">
            <div>IMC</div>
            <div class="valor">{{ $imc }}</div>
        </div>

        <div class="classificacao">
            {{ $classificacao }}
        </div>

        <div class="detalhes">
            <div class="detalhes-row">
                <span>Peso:</span>
                <span>{{ $peso }} kg</span>
            </div>
            <div class="detalhes-row">
                <span>Altura:</span>
                <span>{{ $altura }} m</span>
            </div>
            <div class="detalhes-row">
                <span>IMC:</span>
                <span>{{ $imc }}</span>
            </div>
        </div>

        <form action="{{ route('imc.index') }}" method="GET">
            <button type="submit">Calcular Novamente</button>
        </form>
    </div>
</body>
</html>
