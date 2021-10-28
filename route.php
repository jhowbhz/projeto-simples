<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<input type="tel" name="cep" id="cep" placeholder="CEP" autocomplete="off" /> 
<button type="button" id="btnBusca" name="btnBusca"> Buscar </button>
<hr />
<span id="resultado" name="resultado"></span>
</body>
</html>

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script>

$(document).ready(() => {

    $("#btnBusca").on("click", async () => {
        let CEP = $("#cep").val();
        let URL = "https://correios.contrateumdev.com.br/api/cep";

        await $.ajax({
            url: `${URL}`,
            method: 'POST',
            headers: { 'Content-Type': 'application/json'},
            data: JSON.stringify({
                cep: CEP ?? '',
            }),
            beforeSend: function (data, xhr){
                $("#resultado").html("Está buscando...");
            },
            success: function(data){

                $("#resultado").html(JSON.stringify(data));

            },
            error: function(error) {
                $("#resultado").html("Erro ao buscar...");
            },
        })
    })

});
</script>