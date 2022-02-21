function adminProductFilter(v){

    let product =$("#pr").val();
    let category=$("#pc").val();
    let subcategory=$("#psc1").val();
    if(typeof product == 'undefined')
        product=0;
    if(typeof category == 'undefined')
        category=0;
    if(typeof subcategory == 'undefined')
        subcategory=0;


     $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
    $.ajax({
		type: 'POST',
		//dataType: 'json',
		url: "./admin-search-filter",
		data: {product: product, category:category,subcategory:subcategory},
		success: function (data) {
		    $("#productData").html(data);
		}

    })




}
