$(document).ready(function () {
    $(".link").click(function (e) {
        e.preventDefault();
        let valor = $(this).data('id'); //pega o 'data'-id do elemento 'a'.

        //Faz req. AJAX
        $.ajax({
            url: '/PI/php/infoPortifolio.php', //pega os itens no BD
            type: 'GET', //via get
            data: {
                id : valor
            },
            success: function (resp) {
                $(".modal-body").html(resp); //coloca o conteúdo recuperado no modal body.
            } 
        })
        $(".modal").modal('show'); //mostra modal
    })
});