$(document).ready(function () {
    $("button:first").click(function () {
        $("form").addClass('was-validated');
        $("input:nth-child(n + 1), input:focus").css({'outline':'none', 'box-shadow':'none'});
    });
});