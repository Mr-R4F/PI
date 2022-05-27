$(document).ready(function () {
    $(".link").click(function (e) {
        e.preventDefault();
        let valor = $(this).data('id'); //pega o id do elemento a

        //Faz req. AJAX
        $.ajax({
            url: '/PI/php/infoPortifolio.php',
            type: 'GET', //via get
            data: {
                id : valor
            },
            success: function (resp) {
                $(".modal-body").html(resp); //coloca conteúdo no modal body.
            } 
        })
        $(".modal").modal('show'); //mostra modal
    })
});