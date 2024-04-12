<?php
class Calculadora
{


    public function imprimir()
    {
        $calculadora = [
            [["Id" => 'eliminar', "Clase" => 'borrador', "Estilos" => 'btn btn-light btn-outline-secondary p-3 w-100', "Valor" => "CE", "Texto" => "CE", "Columnas" => '6'], ["Id" => 'resetear', "Clase" => 'borrador', "Estilos" => 'btn btn-light btn-outline-secondary p-3 w-100', "Valor" => "C", "Texto" => "C", "Columnas" => '6']],
            [["Id" => '7', "Clase" => 'numero', "Estilos" => 'btn btn-light btn-outline-secondary p-3 w-100', "Valor" => "7", "Texto" => "7", "Columnas" => '3'], ["Id" => '8', "Clase" => 'numero', "Estilos" => 'btn btn-light btn-outline-secondary p-3 w-100', "Valor" => "8", "Texto" => "8", "Columnas" => '3'], ["Id" => '9', "Clase" => 'numero', "Estilos" => 'btn btn-light btn-outline-secondary p-3 w-100', "Valor" => "9", "Texto" => "9", "Columnas" => '3'], ["Id" => '/', "Clase" => 'operador', "Estilos" => 'btn btn-light btn-outline-secondary p-3 w-100', "Valor" => "/", "Texto" => "/", "Columnas" => '3']],
            [["Id" => '4', "Clase" => 'numero', "Estilos" => 'btn btn-light btn-outline-secondary p-3 w-100', "Valor" => "4", "Texto" => "4", "Columnas" => '3'], ["Id" => '5', "Clase" => 'numero', "Estilos" => 'btn btn-light btn-outline-secondary p-3 w-100', "Valor" => "5", "Texto" => "5", "Columnas" => '3'], ["Id" => '6', "Clase" => 'numero', "Estilos" => 'btn btn-light btn-outline-secondary p-3 w-100', "Valor" => "6", "Texto" => "6", "Columnas" => '3'], ["Id" => '-', "Clase" => 'operador', "Estilos" => 'btn btn-light btn-outline-secondary p-3 w-100', "Valor" => "-", "Texto" => "-", "Columnas" => '3']],
            [["Id" => '1', "Clase" => 'numero', "Estilos" => 'btn btn-light btn-outline-secondary p-3 w-100', "Valor" => "1", "Texto" => "1", "Columnas" => '3'], ["Id" => '2', "Clase" => 'numero', "Estilos" => 'btn btn-light btn-outline-secondary p-3 w-100', "Valor" => "2", "Texto" => "2", "Columnas" => '3'], ["Id" => '3', "Clase" => 'numero', "Estilos" => 'btn btn-light btn-outline-secondary p-3 w-100', "Valor" => "3", "Texto" => "3", "Columnas" => '3'], ["Id" => '+', "Clase" => 'operador', "Estilos" => 'btn btn-light btn-outline-secondary p-3 w-100', "Valor" => "+", "Texto" => "+", "Columnas" => '3']],
            [["Id" => '0', "Clase" => 'numero', "Estilos" => 'btn btn-light btn-outline-secondary p-3 w-100', "Valor" => "0", "Texto" => "0", "Columnas" => '9'], ["Id" => '*', "Clase" => 'operador', "Estilos" => 'btn btn-light btn-outline-secondary p-3 w-100', "Valor" => "*", "Texto" => "*", "Columnas" => '3']],
            [["Id" => '=', "Clase" => 'operador', "Estilos" => 'btn btn-light btn-outline-secondary p-3 w-100', "Valor" => "=", "Texto" => "=", "Columnas" => '12']]
        ];

        echo '<div class="container w-25 mt-3"><div class ="row"><h6 id ="operacion"></h6><h3 id="resultado"></h3></div>';
        echo '<div class="row gy-2">';
        foreach ($calculadora as $i => $fila) {
            foreach ($calculadora[$i] as $celda) {
                echo '<div class="col-' . $celda['Columnas'] . '"><button type="button" id = "' . $celda['Id'] . '" class ="' . $celda['Clase'] . ' ' . $celda['Estilos'] . '" value="' . $celda["Valor"] . '">' . $celda["Texto"] . '</button></div>';
            }
        }
        echo '</div></div>';
    }

    public function sumar($resultado, $numero)
    {
        return doubleval($resultado) + doubleval($numero);
    }

    public function multiplicar($resultado, $numero)
    {
        return doubleval($resultado) * doubleval($numero);
    }

    public function dividir($resultado, $numero)
    {
        if ($numero != 0) {
            return doubleval($resultado) / doubleval($numero);
        } else {
            return 'inviable';
        }
    }

    public function restar($resultado, $numero)
    {
        return doubleval($resultado) - doubleval($numero);
    }
}
