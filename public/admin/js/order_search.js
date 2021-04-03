function adminOrderFilter(v){
    
    let status =$("#pc").val();
    let date=$("#date").val();
    let exdate=$("#exdate").val();
    
    // alert('hello world')
     $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
    $.ajax({
		type: 'POST',
		//dataType: 'json',
		url: "./order-search-filter",
		data: {status: status, date:date,exdate:exdate},
		success: function (data) {
		    $("#productData").html(data);
		  //console.log(data)
		}
        
    })
    
    
    
    
}