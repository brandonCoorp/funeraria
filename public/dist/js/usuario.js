function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
    $(".custom-file-label").text('Seleccionado');
}

$("#foto").change(function(){
    readURL(this);
});