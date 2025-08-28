<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php
        $resultado = null;
        $erro = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $num1 = filter_input(INPUT_POST, 'num1', FILTER_VALIDATE_FLOAT);
            $num2 = filter_input(INPUT_POST, 'num2', FILTER_VALIDATE_FLOAT);
            $op = $_POST['op'] ?? '+';

            if ($num1 === null || $num1 === false || $num2 === null || $num2 === false) {
                $erro = 'Insira números de verdade rapá.';
            } else {
                switch ($op) {
            case '1': $resultado = $num1 + $num2; break;
            case '2': $resultado = $num1 - $num2; break;
            case '3': $resultado = $num1 * $num2; break;
            case '4':
                if ((float)$b == 0.0) {
                    $erro = 'Divisão por zero não é permitida.';
                } else {
                    $resultado = $a / $b;
                }
                break;
            case '%':
                if ((float)$b == 0.0) {
                    $erro = 'Módulo por zero não é permitido.';
                } else {
                    // Em PHP, % opera sobre inteiros; para comportamento consistente:
                    $resultado = fmod($a, $b);
                }
                break;
            case '^': $resultado = $a ** $b; break;
            default:  $erro = 'Operação inválida.';
        }
    }
}
    ?>


    <label for="op">Operação:</label><br>
    <select name="Operação" id="op">
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
    <input type="submit" value="Calcular" name="submit" id="submit">
</body>
</html>