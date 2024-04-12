<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Document</title>
</head>

<body>

    <?php
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

    ?>

    <script>
        var tipoOperador;
        var resultado;
        var numero;
        var esIgual;

        function cargarPagina() {
            numero = 0;
            resultado = 0;
            tipoOperador = 0;
            esIgual = false;
            $('#resultado').text(numero);
            $('#eliminar').on('click', Eliminar);
            $('#resetear').on('click', Resetear);
            $('.numero').each((index, element) => {
                $(element).on('click', setNumero);
            })
            $('.operador').each((index, element) => {
                $(element).on('click', ManejarOperacion);

            })

        }

        function setNumero(e) {
            if (numero === 'resul' || esIgual === true) {
                numero = 0;

            }
            if (esIgual === true) {
                esIgual = false;
                $('#operacion').text('');
                resultado = 0;
                numero = 0;
                tipoOperador = 0;
            }
            numero = numero + $(e.target).val();
            resultado == 'inviable' && ManejarInviable();
            numero = parseInt(numero);
            $('#resultado').text(numero)
        }

        function Eliminar() {
            if (resultado === 'inviable') {
                ManejarInviable();
            } else {
                numero = 0;
                $('#resultado').text(numero);
                if (esIgual == true) {
                    resultado = 0;
                    $('#operacion').text('');
                }
            }

        }

        function Resetear() {
            numero = 0;
            ManejarInviable();

        }

        function ManejarInviable() {
            resultado = 0;
            tipoOperador = 0;
            esIgual = false;
            $('#operacion').text('');
            $('#resultado').text(numero)
            $('.operador').each((index, element) => {
                $(element).val() !== '=' && $(element).prop('disabled', false);

            })
        }
        async function ManejarOperacion(e) {

            if ($(e.target).val() === '=') {
                if (resultado === 'inviable') {
                    ManejarInviable();
                } else {
                    if (numero === 'resul') {
                        numero = resultado;
                    }

                    if (tipoOperador !== 0) {
                        $('#operacion').text(resultado + ' ' + tipoOperador + ' ' + numero + '=');
                        esIgual = true;
                    } else {
                        $('#operacion').text(numero + '=');
                    }
                    await operar();
                }

            } else {
                if (esIgual == true) {
                    numero = 0;
                } else if (numero != 'resul') {
                    await operar();
                }
                esIgual = false;


                tipoOperador = $(e.target).val();
                if (resultado !== 'inviable') {
                    $('#operacion').text(resultado + ' ' + tipoOperador);
                }
            }
        }




        function operar() {
            return $.ajax({
                method: 'GET',
                url: 'operar.php',
                dataType: 'json',
                data: {
                    numero: numero,
                    resultado: resultado,
                    operador: tipoOperador
                },
                success: (data) => {
                    resultado = data.resultado;
                    if (resultado !== 'inviable') {
                        if (esIgual === false) {
                            numero = 'resul';
                        }
                        $('#resultado').text(resultado);


                    } else {
                        $('#resultado').text('No es posible dividir entre 0');
                        numero = 0;
                        $('.operador').each((index, element) => {
                            $(element).val() !== '=' && $(element).prop('disabled', true);

                        })
                    }
                }
            })
        }

        $(window).on('load', cargarPagina);
    </script>
</body>

</html>