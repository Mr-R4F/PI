$(document).ready(function () {
    $("form").submit(function (e) {
        e.preventDefault();

        //Faz req. AJAX
        $.ajax({
            url: '/PI/php/verificaEmail.php', //pega os itens no BD
            type: 'POST', //via post
            data: $(this).serialize(), // cria uma string de texto codificada em URL serializando valores de formulário.
            success: function (resp) {
                $(".modal-content").html(resp); //coloca o conteúdo recuperado no modal content.
            } 
        })
        $("#modalSenha").modal('show'); //mostra modal
        setInterval(() => {
            $("#modalSenha").modal('hide');
        }, 1000);
    })
});