$(document).ready(function () {
    $("a.link").click(function (e) {
        //e.preventDefault(); //Corrigir **** 
        $(this).attr('id');
        $(".modal").modal("show");
    })
});