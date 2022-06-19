$(document).ready(function () {
    $("form").submit(function (e) {
        e.preventDefault();

        //Faz req. AJAX
        $.ajax({
            url: '/PI/php/gravarUsuario.php', //pega os itens no BD
            type: 'POST', //via post
            data: $(this).serialize(), // cria uma string de texto codificada em URL serializando valores de formulário.
            success: function (resp) {
                $(".modal-content").html(resp); //coloca o conteúdo recuperado no modal content.
            } 
        })
        $("#modalCadastro").modal('show'); //mostra modal
        setInterval(() => {
            $("#modalCadastro").modal('hide');
        }, 1700);
    })
});