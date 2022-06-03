$(document).ready(function () {
    $("form").submit(function (e) {
        e.preventDefault();

        //Faz req. AJAX
        $.ajax({
            url: '/PI/php/addProjeto.php', //pega os itens no BD
            type: 'POST', //via get
            data: $(this).serialize(), // cria uma string de texto codificada em URL serializando valores de formulário.
            success: function (resp) {
                $(".modal-body").html(resp); //coloca o conteúdo recuperado no modal body.
            } 
        })
        $("#modalAdd").modal('show'); //mostra modal
        setInterval(() => {
            $("#modalAdd").modal('hide');
        }, 1700);
    })
});