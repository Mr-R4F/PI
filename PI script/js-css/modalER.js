$(document).ready(function () {
    $("#edita").click(function (e) {
        e.preventDefault();
        
        const valor = $(this).data('id');
        const form = $("form")[2];

        //Faz req. AJAX
        $.ajax({
            url: '/PI/php/editarProjeto.php?id=' + valor,
            type: 'POST', //via get
            data: new FormData(form),
            cache: false,
            contentType: false,
            processData: false,
            success: function (resp) {
                $(".modal-content").html(resp);
            } 
        })
        $("#modalER").modal('show');
        setInterval(() => {
            $("#modalER").modal('hide');
        }, 1700);
    })

    $("#remove").click(function (e) {
        e.preventDefault();
        const valor = $(this).data('id'); //pega o 'data'-id do elemento 'a'.
        const form = $("form")[2];

        //Faz req. AJAX
        $.ajax({
            url: '/PI/php/deletarProjeto.php?id=' + valor, //pega os itens no BD
            type: 'POST', //via get
            data: new FormData(form),
            cache: false,
            contentType: false,
            processData: false,
            success: function (resp) {
                $(".modal-content").html(resp); //coloca o conteúdo recuperado no modal body.
            } 
        })
        $("#modalER").modal('show'); //mostra modal
        setInterval(() => {
            $("#modalER").modal('hide');
        }, 1700);
    })
});