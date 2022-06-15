$(document).ready(function () {
    $("#edita").click(function (e) {
        e.preventDefault();
        
        const valor = $(this).data('id'); //pega o 'data'-id do elemento 'button'.
        const form = $("form")[2];

        //Faz req. AJAX
        $.ajax({
            url: '/PI/php/editarProjeto.php?id=' + valor,
            type: 'POST', //via post
            data: new FormData(form), //forma fácil de construir um conjunto de valores/chaves representando os campos do form.
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
        
        const valor = $(this).data('id'); //pega o 'data'-id do elemento 'buttom'.
        const form = $("form")[2];

        //Faz req. AJAX
        $.ajax({
            url: '/PI/php/deletarProjeto.php?id=' + valor, //pega os itens no BD
            type: 'POST', //via post
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
});