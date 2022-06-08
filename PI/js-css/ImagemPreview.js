function  imgPreview() {
    let file = $("input[type=file]").get(0).files[0];

    if (file) {
        let reader = new FileReader(); //permite que aplicações leiam arquivos na máquina do usuario de modo assíncrono.

        reader.onload = function () {
            $("#imgPrevia").attr('src', reader.result);
        }
        reader.readAsDataURL(file);
    }
}