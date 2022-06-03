$(document).ready(function () {
        $("input[type=email]").click(function () {
            console.log('foi');
            let email = $("#Email").val();

            if (email != '') {
                let estadoEmail = false;
                return;
            }

            $.ajax({
                url: '/PI/paginas/cadastro.php',
                type: 'post',
                data: {
                    email : email,
                },
                success: function(resp){
                    if (resp == 'taken') {
                        estadoEmail = false;
                    $(".modal-body").html(resp);
                    }
                }
            });
            $(".modal").modal('show');
            setInterval(() => {
                $(".modal").modal('hide');
            }, 1500);
        })        
});