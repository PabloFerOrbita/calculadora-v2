<?php
$numero = $_GET['numero'] ?? 0;
$resultado = $_GET['resultado'] ?? 0;
$operador = $_GET['operador'] ?? 0;



    switch ($operador) {
        case '-':
            $resultado = $resultado - $numero;
            break;
        case '+':
            $resultado = $resultado + $numero;
            break;
        case '*':
            $resultado = $resultado * $numero;
            break;
        case '/':
            if ($numero != 0) {
                $resultado = $resultado / $numero;
            } else {
                $resultado = 'inviable';
            }
            break;
        default:
            $resultado = $numero;
    }

    echo json_encode(array('numero' => $numero, 'operador' => $operador, 'resultado' => $resultado));

