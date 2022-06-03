$(document).ready(function () {
    $("form").submit(function (e) {
        e.preventDefault();

        //Faz req. AJAX
        $.ajax({
            url: '/PI/php/loginUsuario.php', //pega os itens no BD
            type: 'POST', //via post
            data: $(this).serialize(), // cria uma string de texto codificada em URL serializando valores de formulário.
            success: function (resp) {
                $(".modal-body").html(resp); //coloca o conteúdo recuperado no modal body.
            } 
        })
        $("#modalLogin").modal('show'); //mostra modal
        setInterval(() => {
            $("#modalLogin").modal('hide');
        }, 1700);
    })
});