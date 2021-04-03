$(document).on('keyup', '.speci', function(e) {


    e.preventDefault();
    let input = this.value;
    // let id    = $(this).attr("data-id");
    var specId = $(this).attr('id');
    var specDesc = this.value;
    let proid=$(".proid").val();
    let a = $("#hlp").val(specId);
    console.log(specDesc);
    console.log(specId);

    // alert(proid)
    let api   =   getUrl();

     $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

    $.ajax({
        url: api+"/update-spec/" +specId,
        type:"POST",
        data: {
           // _token: $('#signup-token').val(),
             product_specification : specDesc,
              specification_id: specId,
            // 'input':input
        },
         success : function(data){
            console.log(data)
          }
      });
});
