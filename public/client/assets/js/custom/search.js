
//productName
$(document).on("keyup", ".search_key", function () {
    var vv = $(this);
    var key = $(this).val();

    const method = "POST";
    const url = "/search";
    const data = {
        query: key
    };
    ajaxSetup(function (data) {
        $(vv).autocomplete({
            source: data,
            select: function (e, ui) {
                //alert(ui.item.id);
                var id = ui.item.id;
                window.location = "/product/details/" + id + "/1";
            }
        });

    }, method, url, data);


});
