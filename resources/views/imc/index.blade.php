<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de IMC</title>
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

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            border: 1px solid #999;
            font-size: 14px;
            box-sizing: border-box;
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

        .error-message {
            color: red;
            font-size: 12px;
            margin-top: 3px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Calculadora de IMC</h1>

        <form action="{{ route('imc.calcular') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="peso">Peso (kg)</label>
                <input 
                    type="number" 
                    id="peso" 
                    name="peso" 
                    step="0.1"
                    required
                    value="{{ old('peso') }}"
                >
                @error('peso')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="altura">Altura (m)</label>
                <input 
                    type="number" 
                    id="altura" 
                    name="altura" 
                    step="0.01"
                    required
                    value="{{ old('altura') }}"
                >
                @error('altura')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">Calcular</button>
        </form>
    </div>
</body>
</html>
