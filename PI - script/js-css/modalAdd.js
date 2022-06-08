$(document).ready(function () {
    $("form").submit(function (e) {
        e.preventDefault();

        //Faz req. AJAX
        $.ajax({
            url: '/PI/php/addProjeto.php',
            type: 'POST', //via post
            data: new FormData(this), //para poder conseguir enviar imagens.
            cache: false,
            contentType: false,
            processData: false,
            success: function (resp) {
                $(".modal-content").html(resp);
            } 
        });
        $("#modalAdd").modal('show'); //mostra modal
        setInterval(() => {
            $("#modalAdd").modal('hide');
        }, 1200);
    })
});