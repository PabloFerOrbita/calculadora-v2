<?php
$numero = $_GET['numero'];
$resultado = $_GET['_resultado'];
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
        $resultado = $resultado + $numero;
        } else {
            $resultado = 'inviable';
        }
        break;
     
}

echo json_encode(['numero'=> $numero, 'operador' => $operador, 'resultado' => $resultado]);


?>