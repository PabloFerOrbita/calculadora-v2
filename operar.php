<?php
$numero = $_GET['numero'] ?? 0;
$resultado = $_GET['resultado'] ?? 0;
$operador = $_GET['operador'] ?? 0;
require_once 'Calculadora.php';
$calculadora = new Calculadora();


    switch ($operador) {
        case '-':
            $resultado = $calculadora->restar($resultado, $numero);
            break;
        case '+':
            $resultado =   $calculadora->sumar($resultado, $numero);
            break;
        case '*':
            $resultado = $calculadora->multiplicar($resultado, $numero);
            break;
        case '/':
            $resultado = $calculadora->dividir($resultado, $numero);
            break;
        default:
            $resultado = intval($numero);
    }

    echo json_encode(array('numero' => $numero, 'operador' => $operador, 'resultado' => $resultado));

