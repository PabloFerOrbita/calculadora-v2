<?php
$numero = $_GET['numero'] ?? 0;
$resultado = $_GET['resultado'] ?? 0;
$operador = $_GET['operador'] ?? 0;
require_once 'Calculadora.php';
$calculadora = new Calculadora();


   
    }

    echo json_encode(array('numero' => $numero, 'operador' => $operador, 'resultado' => $resultado));

