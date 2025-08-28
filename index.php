<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Calculadora</title>
</head>
<body>

<?php
    $resultado = null;
    $erro = null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $num1 = filter_input(INPUT_POST, 'num1', FILTER_VALIDATE_FLOAT);
        $num2 = filter_input(INPUT_POST, 'num2', FILTER_VALIDATE_FLOAT);
        $op = $_POST['op'] ?? '1';

        if ($num1 === null || $num1 === false || $num2 === null || $num2 === false) {
            $erro = 'Insira números válidos.';
        } else {
            switch ($op) {
                case '1': $resultado = $num1 + $num2; 
                echo "<p>Resultado: <strong>".$resultado."<strong></p>";
                break;
                case '2': $resultado = $num1 - $num2; 
                echo "<p>Resultado: <strong>".$resultado."<strong></p>";
                break;
                case '3': $resultado = $num1 * $num2; 
                echo "<p>Resultado: <strong>".$resultado."<strong></p>";
                break;
                case '4':
                    if ((float)$num2 == 0.0) {
                        $erro = 'Divisão por zero não é permitida.';
                    } else {
                        $resultado = $num1 / $num2;
                    }
                    echo "<p>Resultado: <strong>".$resultado."<strong></p>";
                    break;
                case '5': $resultado = $num1 ** $num2; break;
                case '6':
                    if ((float)$num2 == 0.0) {
                        $erro = 'Módulo por zero não é permitido.';
                    } else {
                        $resultado = fmod($num1, $num2);
                    }
                    echo "<p>Resultado: <strong>".$resultado."<strong></p>";
                    break;
                default: $erro = 'Operação inválida.'; break;
            }
        }
    }
?>

<form method="POST">
    <label for="op">Operação:</label><br>
    <select name="op" id="op">
        <option value="1">Soma</option>
        <option value="2">Subtração</option>
        <option value="3">Multiplicação</option>
        <option value="4">Divisão</option>
        <option value="5">Exponencial</option>
        <option value="6">Resto de Divisão</option>
    </select>
    <div class="number-box">
        <input type="number" step="any" name="num1" id="num1" placeholder="Num1" required>
        <input type="number" step="any" name="num2" id="num2" placeholder="Num2" required>
    </div><br>
    <div class="buttons">

    <input type="submit" value="Calcular">
    <button type="reset" onclick="window.location.href=window.location.pathname">Limpar</button>
    </div>
    
</form>

</body>
</html>
