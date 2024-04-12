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
    require_once 'Calculadora.php';
    $calculadora = new Calculadora();
    $calculadora -> imprimir();

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
                    numero = 'resul';
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