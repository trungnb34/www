$(document).ready(function () {
    var filterByPost = $('#filterByPost');
    filterByPost.change(function () {
        var searchBy = $(this).val();
        var _token = $('#token').val();
        var data = {
            _token : _token,
            searchBy : searchBy
        }
        console.log(data);
        $.ajax({
            type : 'POST',
            url : 'filterByPost',
            data : data,
            dataType : 'json',
            encode    : true,
            success : function (result) {
                console.log(result);
            }
        });
        // var xhttp = new XMLHttpRequest();
        // xhttp.onreadystatechange = function() {
        //     if (this.readyState == 4 && this.status == 200) {
        //         console.log('ok');
        //     }
        // };
        // xhttp.data = data;
        // xhttp.open("POST", "http://blog.dev/admin/post/filterByPost", true);
        // xhttp.send();
    });
})

