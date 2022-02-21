let initial = 0;
let serial = 1;
function addrow() {
    let str = "";
    initial++;
    serial++;
    str +=
        '<tr id="div_' +
        Number(initial) +
        '">' +
        "<td>" +
        Number(serial) +
        "</td>" +
        "<td>" +
        '<select class="js-data-example-ajax form-control " onchange="productwiseprice(this.value,Number(initial))" id="product-' +
        Number(initial) +
        '">' +
        "</select>" +
        "</td>" +
        "<td>" +
        '<input type="number" size="2" onkeyup="productQty(this.value,Number(initial))" id="qty-' +
        Number(initial) +
        '"  class="form-control input-sm" name="quantity[]"/>' +
        "</td>" +
        "<td>" +
        '<input type="number" size="2" id="price-' +
        Number(initial) +
        '" class="form-control input-sm" name="price[]" />' +
        "</td>" +
        "<td>" +
        '<input type="number" readonly size="2" id="subtotals-' +
        Number(initial) +
        '" class="form-control input-sm subtotal" name="sub_total[]" />' +
        "</td>" +
        "<td>" +
        '<input type="number" class="finalDiscount" size="2" id="discount-' +
        Number(initial) +
        '" onchange="discount(this.value,Number(initial))" class="form-control input-sm Discounts" name="discount[]" />' +
        "</td>" +
        "<td>" +
        '<input type="number" readonly id="net-' +
        Number(initial) +
        '" size="2" class="form-control input-sm netAmounts net_amounts" id="net-' +
        Number(initial) +
        '" name="net[]"  />' +
        '<input type="hidden" readonly id="hiddennet-' +
        Number(initial) +
        '" + Number(initial) + " size="2" class="form-control input-sm" name="hiddennet[]"  />' +
        "</td>" +
        "<td>" +
        '<button id="add_row" onclick="addrow()" class="btn btn-success pull-left btn-sm"> ' +
        "+" +
        "</button>" +
        '<button id="delete_row" onclick="remove_row(' +
        Number(initial) +
        ')" class="pull-right btn btn-danger btn-sm"> ' +
        "-" +
        "</button>" +
        "</td>" +
        "</tr>";


    $("#dynamicRow").append(str);
    remote_select("js-data-example-ajax", Number(initial));
}

$(document).ready(function () {
    $("#formId").on("submit", function (event) {
        event.preventDefault();
        let request = $("#formId").serializeArray();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            url: "save-purshase-transection",
            method: "POST",
            data: new FormData(this),
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {},
            success: function (response) {
                Swal.fire({
                    html: "I will close in <b></b> milliseconds.",
                    timer: 1000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading();
                        timerInterval = setInterval(() => {
                            const content = Swal.getContent();
                            if (content) {
                                const b = content.querySelector("b");
                                if (b) {
                                    b.textContent = Swal.getTimerLeft();
                                }
                            }
                        }, 100);
                    },
                    willClose: () => {
                        clearInterval(timerInterval);
                    },
                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.timer) {
                        // window.location.href = li + "manage-interviewer";
                    }
                });
            },
            error: function (data) {
                // alert("Something Went Wrong.!");
            },
        });
    });
    remote_select("js-data-example-ajax", 1);
});

function remote_select(cls, id) {
    $("." + cls).select2({
        minimumInputLength: 3,
        ajax: {
            url: "all-product",
            dataType: "json",
            type: "GET",
            quietMillis: 50,
            data: function (term) {
                return {
                    _token: $("meta[name=csrf-token]").attr("content"),
                    name: term,
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.product_name,
                            id: item.id,
                        };
                    }),
                };
            },
            transport: function (params, success, failure) {
                var $request = $.ajax(params);

                $request.then(success);
                $request.fail(failure);

                return $request;
            },
        },
    });
}


// ******************************* start all array *******************************
let TotalValue = [];
let discountsarray = [];
let FinalAmount = [];
let Discountpercent = [];
// ******************************* end all array *******************************
// get product wise price

const productwiseprice = (id, rowid) => {
    // console.log(id);
    // console.log(rowid);
    $.ajax({
        url: "product-wise-price/" + id,
        type: "GET",
        data: {
            _token: "{{ csrf_token() }}",
        },
        success: function (data) {
            // console.log(data.product_price);
            $("#price-" + rowid).val(data.product_price);
        },
    });
};

// get qty wise product price


const productQty = (value, rowid) => {
    let product_price = $("#price-" + rowid).val();
    let product_qty = $("#qty-" + rowid).val();
    if (typeof product_price === "undefined") {
        product_price = 0;
    }

    if (typeof product_qty === "undefined") {
        product_qty = 0;
    }
    let netAmount = product_qty * product_price;
    $("#hiddennet-" + rowid).val(netAmount);
    $("#subtotals-" + rowid).val(netAmount);
    $("#net-" + rowid).val(netAmount);

    $(".subtotal").each(function (index, val) {
        if (typeof TotalValue[rowid] === "undefined") {
            TotalValue.push(parseInt(val.value));
        } else {
            TotalValue[rowid] = parseInt(val.value);
        }
    });
    calculateValue();
};

// get discount //


const discount = (value, rowid) => {
    let netAmount = $("#hiddennet-" + rowid).val();
    let discount = $("#discount-" + rowid).val();
    if (typeof discount === "undefined") {
        discount = 0;
    }

    if (typeof netAmount === "undefined") {
        netAmount = 0;
    }

    let netdiscount = (netAmount * discount) / 100;
    let netTotal = netAmount - netdiscount;
    $("#net-" + rowid).val(netTotal);
    getTotalAmount(rowid);

    if (typeof discountsarray[rowid] === "undefined") {
        discountsarray.push(parseInt(netdiscount));
    } else {
        discountsarray[rowid] = parseInt(netdiscount);
    }
    console.log('Discount Amounts = ',discountsarray);
    let sumofdiscount = discountsarray.reduce(function (a, b) {
        return a + b;
    });

    $("#finalDiscount").val(sumofdiscount);
    sumofdiscountpercent(value,rowid);
};


const getTotalAmount = (rowId) => {
    //let FinalAmount = [];

    $(".netAmounts").each(function (index, val) {
        if (typeof FinalAmount[rowId] === "undefined") {
            FinalAmount.push(parseInt(val.value));
        } else {
            FinalAmount[rowId] = parseInt(val.value);
        }
    });

    let result = FinalAmount.reduce(function (a, b) {
        return a + b;
      });
    $('#finalnetAmounts').val(result);

};

const calculateValue = () => {


    let sumofsubtotal = TotalValue.reduce(function (a, b) {
        return a + b;
    });
    $("#Totalvalue").val(sumofsubtotal);
};

// get final discount ..........

const Finaldiscount = () => {
    let final_discount = $("#finalDiscount").val();
    let total_value = $("#Totalvalue").val();
    if (typeof final_discount === "undefined") {
        final_discount = 0;
    }
    if (typeof total_value === "undefined") {
        total_value = 0;
    }

    let discountTotal = (total_value * final_discount) / 100;
    let finalResult = total_value - discountTotal;
    $('.finalDiscount').val(final_discount);
    $("#finalnetAmounts").val(finalResult);
};

function remove_row(id) {
    $("#div_" + id).remove();
    initial = 1;
    serial = 1;
    delete FinalAmount[id];
    delete Discountpercent[id];
    calculateValue();
}

const sumofdiscountpercent = (value,rowId)=>{
    if (typeof Discountpercent[rowId] === "undefined") {
        Discountpercent.push(parseInt(value));
    } else {
        Discountpercent[rowId] = parseInt(value);
    }
    console.log('Discount % = ',Discountpercent);
    let sumofdiscount = Discountpercent.reduce(function (a, b) {
        return a + b;
    });

    $('#DiscountParcent').val(sumofdiscount);
}
