<?php
$numero = $_GET['numero'];
$resultado = $_GET['resultado'];
$operador = $_GET['operador'];

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
        if ($numero !== 0){
        $resultado = $resultado / $numero;
        } else {
            $resultado = 'inviable';
        }
        break;
    case 0:
        $resultado = $numero;
     
}

echo json_encode(array('numero' => $numero, 'operador' => $operador, 'resultado' => $resultado));


?>