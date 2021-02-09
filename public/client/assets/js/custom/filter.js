$(document).ready(function(){
    $("#findBtn").click(function(){
      var price = $('#productPrice').val();
      // alert(price);
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.ajax({
        type: "GET",
        url: "http://gadgetoy.com/ecommerce/price-filter",
        data: {min:1,max:price},
        cache: false,
        success: function(html){
        //   $('Client.productlist.product_list');
        // $('#productData').load('Client.productlist.product_list');
        //  $("#product-list").html(Client.productlist.product_list);
        $("#productData").html(html);
        }
      });
     
    });
  });

$(document).on("click",".cate_filter",function () {

    var li=getUrl();

    var list=[];var i=0;
    $(".cate_filter").each(function () {
        if($(this).is(":checked"))
        {
            var val_id=$(this).attr("data-id");
            list[i++]=[val_id];
        }
    });
    var list_stringify=JSON.stringify(list);
    var max_price = $('#productPrice').val();
    var url=li+"price-filter";
    var method="GET";
    var data={
        filter:list_stringify,
        max:max_price,
        min:1,
    }
    $.ajax({
        type: "GET",
        url: url,
        data: data,
        cache: false,
        success: function(html){
            //   $('Client.productlist.product_list');
            // $('#productData').load('Client.productlist.product_list');
            //  $("#product-list").html(Client.productlist.product_list);
            $("#productData").html(html);
        }
    });

});


























// brand wise product...............
$(document).on("click",".brandFilter",function () {

    var li=getUrl();
        // alert('hello world');
    var list=[];var i=0;
    $(".brandFilter").each(function () {
        if($(this).is(":checked"))
        {
            var val_id=$(this).attr("data-id");
            list[i++]=[val_id];
        }
    });
    var list_stringify=JSON.stringify(list);
    var max_price = $('#productPrice').val();
    var url=li+"brand-price-filter";
    var method="GET";
    var data={
        filter:list_stringify,
        max:max_price,
        min:1,
    }
    $.ajax({
        type: "GET",
        url: url,
        data: data,
        cache: false,
        success: function(html){
            //   $('Client.productlist.product_list');
            // $('#productData').load('Client.productlist.product_list');
            //  $("#product-list").html(Client.productlist.product_list);
            $("#productData").html(html);
        }
    });

});