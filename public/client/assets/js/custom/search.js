
//productName
$(document).on("keyup",".search_key",function(){
    var api=getUrl();
    var vv=$(this);
    var key=$(this).val();

    const method="POST";
    const url=api+"search";
    const data={
        query:key
    };
    ajaxSetup(function(data)
    {
        $(vv).autocomplete({
            source: data,
            select: function(e, ui) {
                //alert(ui.item.id);
                var id=ui.item.id;
                window.location=api+"product/details/"+id+"/1";
            }
        });

    },method,url,data);
   
    
});
