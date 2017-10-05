$(document).ready(function () {
    //$('#show').css('display', 'none');
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#show').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#avatar").change(function(){
        //$('#show').css('display', 'block');
        readURL(this);
    });
})
