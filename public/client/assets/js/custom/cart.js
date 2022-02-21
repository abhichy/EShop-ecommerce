const isValidStep = (activePanelNum,eventTarget,DOMstrings) =>{
    //alert(activePanelNum+" data ");
    if (eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`))
    {
        activePanelNum--;
        setActiveStep(activePanelNum);
        setActivePanel(activePanelNum);
    }
    else if(activePanelNum == '0')
    { //is cart exist...
        isCartExist(function(data){
            if(data.total <= 0)
            {
                Swal.fire({
                    title: 'Your Cart is Empty...Please add some product!! ',
                    width: 600,
                    padding: '3em',
                    background: '#fff url(/images/trees.png)',
                    backdrop: `
                      rgba(0,0,123,0.4)
                      url("/images/nyan-cat.gif")
                      left top
                      no-repeat
                    `
                  })
            }
            else{
                isActiveNextStep(activePanelNum,eventTarget,DOMstrings);
            }
        });
    }
    else if(activePanelNum == '1')
        {
            let name=$("#firstname").val();
            let lastname=$("#lastname").val();
            let address=$("#txt_cart_address").val();
            let email=$("#email").val();
            let phonenumber=$("#phonenumber").val();
            let postcode=$("#postcode").val();


            if(name == '')
                Swal.fire({
                  title: 'First name cannot be null!!',
                  showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                  },
                  hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                  }
                })
            else if(address == '')
                Swal.fire({
                      title: 'Address cannot be null!!',
                      showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                      },
                      hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                      }
                    })
            else if(lastname == '')
             Swal.fire({
                  title: 'Last name cannot be null!!',
                  showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                  },
                  hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                  }
                })
            else if(email == '')
                Swal.fire({
                      title: 'Email cannot be null!!',
                      showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                      },
                      hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                      }
                    })
            else if(postcode == '')
                Swal.fire({
                  title: 'Post code cannot be null!!',
                  showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                  },
                  hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                  }
                })
                else if(phonenumber == '')
                Swal.fire({
                  title: 'Phone number cannot be null!!',
                  showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                  },
                  hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                  }
                })
            else{
                isActiveNextStep(activePanelNum,eventTarget,DOMstrings);

            }
        }
    else if(activePanelNum == '2')
        {
           var payment_type= $(".div_payment_radio input[type='radio']:checked").val();
            isActiveNextStep(activePanelNum,eventTarget,DOMstrings);

        }
}

function isCartExist(callback){
    const method="GET";
    const url="./isCartExist";
    const data={};
    ajaxSetup(function(data)
    {
        callback(data);

    },method,url,data);
}

// function orderCheckout(v){
//     let name=$("#firstname").val();
//     let address=$("#txt_cart_address").val();

//     isCartExist(function(data){
//         if(data.total <= 0)
//         {
//             alert("Cart is empty..");
//         }
//         else{
//             // alert(name);
//         }
//     });
function orderCheckout(v){
    let name=$("#firstname").val();
    let address=$("#txt_cart_address").val();
    let email=$("#email").val();
    let lastname=$("#lastname").val();
    let phonenumber=$("#phonenumber").val();
    let postcode=$("#postcode").val();
    let status=$("#status").val();
    let payment= $('input[name="payment_type"]:checked').val();
    let cardname=$("#card-name").val();
    let cardno=$("#card-no").val();
    let expireDate=$("#expireDate").val();
    let security_number=$("#sec-no").val();
    let comment=$("#comment").val();
    let api=getUrl();
    isCartExist(function(data){
        if(data.total <= 0)
        {
            alert("Cart is empty..");
        }
        else{
            // alert(lastname);
            $.ajax({
				type: 'POST',
				//dataType: 'json',
				url: "./confim-order",
				data: {name: name, lastname:lastname,phonenumber:phonenumber,postcode:postcode,status:status,payment,expireDate:expireDate,security_number:security_number,comment:comment,email:email,address:address,cardname:cardname,cardno:cardno},
				success: function (data) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                          toast.addEventListener('mouseenter', Swal.stopTimer)
                          toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                      })

                      Toast.fire({
                        icon: 'success',
                        title: 'Your Order Created Successfully'
                      });
                      window.location.href=api+'order-list'
				}
			});
        }
    });


}


// ------------------------------------------
// function increaseValue(v) {
//     let id = $(v).attr("data-id");
//     let value = parseInt(document.getElementById('qty-'+id).value, 10);
//     value = isNaN(value) ? 0 : value;
//     value++;
//     document.getElementById('qty-'+id).value = value;
//     let rowId=$("#rowId-"+id).val();
//     let qty=$("#qty-"+id).val();
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });

//     $.ajax({
//         url: './update-cart',
//         type: 'POST',
//         data: {increment: true,qty:qty,rowId:rowId},
//         success: function() { alert('cart quantity is increased successfully!!') }
//     });

//   }


function increaseValue(v) {


    let id = $(v).attr("data-id");
    let value = parseInt(document.getElementById('qty-'+id).value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('qty-'+id).value = value;
    let rowId=$("#rowId-"+id).val();
    let qty=$("#qty-"+id).val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".btn_loading").attr("disabled",true);
    $(".cart_loading").text("Loading..");

    $.ajax({
        url: './update-cart',
        type: 'GET',
        dataType: 'json',
        data: {increment: true,qty:qty,rowId:rowId},
        success: function(data)
        {

            updateCartInfo(data);
            $(".btn_loading").attr("disabled",false);
            $(".cart_loading").text("");
        }
    });

    // $("#qty-").load(" #qty- > *");
    //$("#here").load(" #here > *");
    //$("#subtotal-").load(" #subtotal- > *");
    //$("#navbarSupportedContent").load(" #navbarSupportedContent > *");



  }
function decreaseValue(v) {
    let id = $(v).attr("data-id");
    let value = parseInt(document.getElementById('qty-'+id).value, 10);
    value = isNaN(value) ? 0 : value;
    value < 1 ? value = 1 : '';
    value--;
    document.getElementById('qty-'+id).value = value;

    let rowId=$("#rowId-" +id).val();
    let qty=$("#qty-" +id).val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".btn_loading").attr("disabled",true);
    $(".cart_loading").text("Loading..");


    $.ajax({
        url: './update-cart',
        type: 'GET',
        dataType: 'json',
        data: {increment: true,qty:qty,rowId:rowId},
        success: function(data) {

            $(".btn_loading").attr("disabled",false);
            $(".cart_loading").text("");

            if(qty <= 0)
                $(".tr-"+rowId).remove();

            updateCartInfo(data);
        }
    });

    // $("#qty-").load(" #qty- > *");
   /* $("#subtotal-").load(" #subtotal- > *");
    $("#navbarSupportedContent").load(" #navbarSupportedContent > *");
    $("#here").load(" #here > *");*/
    // $("#navbarSupportedContent").load(" #navbarSupportedContent > *");

  }
function deleteCart(v){
    let id = $(v).attr("data-id");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".btn_loading").attr("disabled",true);
    $(".cart_loading").text("Loading..");
    $.ajax({
        type: 'get',
        dataType: 'json',
        url: "./delete-cart/" +id,
        data: {id:id},
        success: function (data) {

            $(".btn_loading").attr("disabled",false);
            $(".cart_loading").text("");


            $(".tr-"+id).remove();
            updateCartInfo(data);

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                onOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: 'Cart Removed Successfully!!'
            })


        }
    });
    /*$("#navbarSupportedContent").load(" #navbarSupportedContent > *");
    $("#here").load(" #here > *");*/
}
function updateCartInfo(data) {

    $(".cart_qty").text(data.count);
    var gross_discount=0;var gross_amount=0;
    $.each(data.list,function (key,val) {
        var discount=0;
        var amount=val.price * val.qty;
        if(val.options.discount != null && val.options.discount > 0)
            discount=(val.options.discount) * val.qty;
        else
        {
            var dis_amt=((amount) * val.options.percent) / 100 ;
            discount=dis_amt;
        }
        var sub_amount=parseFloat(amount) - parseFloat(discount);
        gross_amount=parseFloat(gross_amount) + parseFloat(amount);
        $(".amount-"+val.rowId).text(amount+" BDT");
        $(".discount-"+val.rowId).text(discount+" BDT");
        $(".sub_amount-"+val.rowId).text(sub_amount+" BDT");
        gross_discount=parseFloat(gross_discount) + parseFloat(discount);
    });
    var total=parseFloat(gross_amount) - parseFloat(gross_discount);
    $(".final_amount_before").text(total);
}

// ------------------------------------------


// function addToCart(v){
//     let id = $(v).attr("data-id");
//     let proid=$("#proid-"+id).val();
//     let qty=$("#qty-"+id).val();


//     // alert(proid);
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });

//     $.ajax({
//         type: 'POST',
//         //dataType: 'json',
//         url: "./add-to-cart",
//         data: {id:id,proid:proid,qty:qty},
//         success: function (data) {
//         alert("cart added successfully!!");
//         }
//     });
//     $("#navbarSupportedContent").load(" #navbarSupportedContent > *");
// }
function addToCart(v){
    let id = $(v).attr("data-id");
    // let proid=$("#proid-"+id).val();
    let qty=$("#qty-"+id).val();

    var btn_txt=$(v).text();
    $(v).text("Adding....");
    $(v).attr("disabled",true);
    // alert(proid);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var api=getUrl();
    // alert(api);
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: api+"add-to-cart",
        data: {id:id,qty:qty},
        success: function (data) {

            //alert(data.count);
            $(".cart_qty").text(data.count);

            $(v).text(btn_txt);
            $(v).attr("disabled",false);

        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          onOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
          }
        })

        Toast.fire({
          icon: 'success',
          title: 'Cart Added Successfully!!'
        })
        }
    });
    //$("#navbarSupportedContent").load(" #navbarSupportedContent > *");
}





// function updateCart(v){

//     let rowId=$("#rowId").val();
//     let qty=$("#qty").val();

//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });
//     // alert(rowId);
//     $.ajax({
//         type: 'POST',
//         //dataType: 'json',
//         url: "./update-cart",
//         data: {rowId:rowId,qty:qty},
//         success: function (data) {
//         alert("cart updated successfully!!");
//         }
//     });

// }

/*function increaseValue(v) {
    let id = $(v).attr("data-id");
    let value = parseInt(document.getElementById('qty-'+id).value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('qty-'+id).value = value;
    let rowId=$("#rowId-"+id).val();
    let qty=$("#qty-"+id).val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: './update-cart',
        type: 'POST',
        data: {increment: true,qty:qty,rowId:rowId},
        success: function() { }
    });

    // $("#qty-").load(" #qty- > *");
    $("#here").load(" #here > *");
    $("#subtotal-").load(" #subtotal- > *");
    $("#navbarSupportedContent").load(" #navbarSupportedContent > *");
}*/





function increaseQty() {
    let value = parseInt(document.getElementById('qty').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('qty').value = value;
  }

  function decreaseQty() {
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value < 1 ? value = 1 : '';
    value--;
    document.getElementById('number').value = value;
  }

const isActiveNextStep=(activePanelNum,eventTarget,DOMstrings)=>{
    if (eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`)) {
        activePanelNum--;
    } else {
        activePanelNum++;
    }
    setActiveStep(activePanelNum);
    setActivePanel(activePanelNum);
}




$(document).ready(function() {

    $('#clientInfo').click(function() {
        // alert("hello");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
             type:"GET",
             url:"./getclientInfo",
             success : function(results) {
                //  console.log(results);
                $("#firstname").val(results.first_name);
                $("#lastname").val(results.last_name);
                $("#email").val(results.email);
                $("#txt_cart_address").val(results.present_address);
                $("#phonenumber").val(results.contact_no);
             }
        });
    });

});
