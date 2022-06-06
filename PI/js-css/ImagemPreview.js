function  imgPreview() {
    let file = $("input[type=file]").get(0).files[0];

    if (file) {
        let reader = new FileReader();

        reader.onload = function () {
            $("#imgPrevia").attr('src', reader.result);
        }
        reader.readAsDataURL(file);
    }
}