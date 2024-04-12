<?php
$numero = $_GET['numero'] ?? 0;
$resultado = $_GET['resultado'] ?? 0;
$operador = $_GET['operador'] ?? 0;



    switch ($operador) {
        case '-':
            $resultado = doubleval($resultado) - doubleval($numero);
            break;
        case '+':
            $resultado =   doubleval($resultado) + doubleval($numero);
            break;
        case '*':
            $resultado = doubleval($resultado) * doubleval($numero);
            break;
        case '/':
            if ($numero != 0) {
                $resultado = doubleval($resultado) / doubleval($numero);
            } else {
                $resultado = 'inviable';
            }
            break;
        default:
            $resultado = intval($numero);
    }

    echo json_encode(array('numero' => $numero, 'operador' => $operador, 'resultado' => $resultado));

