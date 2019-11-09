$(document).ready(function(){
 
 /////////////for table 
$('#selectall').click(function(event){
    
if(this.checked) {
    
$('.checked').each(function(){
    this.checked = true;

    $('#delete').removeAttr('disabled'); //enable input
    $('table tbody tr th').css("background-color", "#f5f5f5");
    

});
    
} else {

$('.checked').each(function(){
    this.checked = false;
    $('#delete').attr('disabled', true); //disable input
    $('table tbody tr th').css("background-color", "transparent");
    $(this).closest('tr').removeClass("th-active");
});
    
}  
    
});

$('.checked').click(function(event){
if(this.checked) {

	 $('.enabled').removeAttr('disabled');
   $(this).closest('tr').addClass("th-active")

}else{

	 $('.enabled').attr('disabled', true); //disable input
   $(this).closest('tr').removeClass("th-active")
 
	
}


});

 /////////////end for table 

   
function getUserName(username) {
  var $modal = $('#myModal1'),
      $userName = $modal.find('#cat_name');
  $userName.val(username);
  $modal.modal("show");
}

//////file image
function readURL(input) {

if (input.files && input.files[0]) {
var reader = new FileReader();

reader.onload = function (e) {
    $('#blah').attr('src', e.target.result);
}

reader.readAsDataURL(input.files[0]);
}
}

$('#imgInp').change(function(){
readURL(this);
});
///// end of file image

/////edit categories

 $('.view').click(function(){
      
        var category_edit = $(this).attr("id");

        $.ajax({

            url:"core/Request/Categories/edit.php",

            method:"post",

            data:{category_edit:category_edit},

            success:function(data){

              $('#edit-content').html(data);

              $('#editmodal').modal("show");

            }
            

        });

    });

 /////end edit categories

 /////update price

 $('.update_price').click(function(){
      
        var price_id = $(this).attr("id");

        $.ajax({
            url:"core/Request/Products/getIteminfo.php",
            method:"post",
            data:{price_id:price_id},
            success:function(data){
               $('#price-content').html(data);
               $('#price_modal').modal("show");            

            }
            

        });

    });

 /////end update price



  $('.view_info').click(function(){
      
        var get_item = $(this).attr("id");

        $.ajax({
            url:"core/Request/Products/iteminfo.php",
            method:"post",
            data:{get_item:get_item},
            success:function(data){
              $('#iteminfo').html(data);
               $('#viewinfo').modal("show");
            }
            

        });

         

    });


////supplier info

$('.get_id').change(function(){
      
        var get_id = $(this).val();

        $.ajax({
            url:"core/functions.php",
            method:"POST",
            data:{get_id:get_id},
            success:function(data){
               $('#supplier_info').css("display","block");
               $('#supplier_info').html(data);
               $('.change').css("display","block");
               $('.select_hiiden').css("display","none");
               $('.barcode').removeAttr('readonly');
               $('.barcode').attr("Placeholder", "Enter Barcode or Item Name");
            
            }
            

        });

         

 });

////// end of supplier info


////customer Id

$('.customer_id').change(function(){
      
        var customer_id = $(this).val();

        $.ajax({
            url:"core/functions.php",
            method:"POST",
            data:{customer_id:customer_id},
            success:function(data){
               $('#customerinfo').css("display","block");
               $('#customerinfo').html(data);
               $('.change_customer').css("display","block");
               $('.select_hiiden').css("display","none");
               $('.barcode').removeAttr('readonly');
               $('.barcode').attr("Placeholder", "Enter Barcode or Item Name");
            
            }
            

        });

         

 });

////// end of customer  info

   $('.change').click(function(){

       $(this).css("display","none");
       $('.select_hiiden').css("display","flex");
       $('.span_hide').css("width","40px");
       $('#supplier_info').css("display","none");
      


   });

  $('.change_customer').click(function(){

       $(this).css("display","none");
       $('.select_hiiden').css("display","flex");
       $('.span_hide').css("width","40px");
       $('#customerinfo').css("display","none");
      


   });



$('#export').click(function(){
  var excel_data = $('#data_table').html();
  var page = "form/export/export.php?data";
  window.location = page;

});








function IsNumeric(input) 
{
    return (input - 0) == input && input.length > 0;
}      





/////supplier payment 


    



$('.method').change(function(e){

method = $(this).val();

if (method == "Check") {
  $('.check').removeAttr('disabled'); //enable input
}else{
  $('.check').attr('disabled', true);
}



});


$('.taxable').change(function(){

    tax();
    VAT();

   


});







function compute_total(){
        var subtotal =0;
        
        $('.total').each(function() {
        //Get the value

        var total = $(this).val();

        console.log(total);
        //if it's a number add it to the total
        if(IsNumeric(total)) {
        subtotal += parseFloat(total, 10);

        }

        });

        $('.subtotal').val(subtotal);
        $('.total-sale').val(subtotal);
      
}



function compute_discount(){
    total_amount = 0;
    var subtotal =  $('.subtotal').val();
    var discount_rate = $('.discount').val();

    discount_temp = parseFloat(discount_rate / 100);
    discount = parseFloat(discount_temp * subtotal);
    total_amount = subtotal - discount;
    $('.total-sale').val(total_amount);


      
}


function tax()
{
    var tax  = 0;
    var tax_temp = 0;
    var total_sale = 0;
    var subtotal =  parseFloat($('.sub-cost').val());
    var tax_rate= $('.taxable').val();
    


    tax_temp = parseFloat(tax_rate / 100);
    tax = parseFloat(tax_temp * subtotal);
    total_sale = parseFloat(subtotal + tax);

    $('.tax').val(tax);
    $('.total-cost').val(total_sale + ".00");



      
}

function VAT()
{
  
  var vat = 1.12;
  var tax =parseFloat( $('.tax').val());
  var subtotal = parseFloat($('.sub-cost').val());
  var total = parseFloat($('.total-cost').val());
  var amount_due =parseFloat( subtotal  + tax) / vat;
  var vat_amount = Math.abs(amount_due - total);

  $('.vatable_sale').val(amount_due.toFixed(2));
  $('.vat').val(vat_amount.toFixed(2));

}

function quantity()
{
        var totalquantity =0;
        $('.qty').each(function() {
        //Get the value

        var quantity = $(this).val();

        console.log(quantity);
        //if it's a number add it to the total
        if(IsNumeric(quantity)) {
        totalquantity += parseFloat(quantity, 10);

        }

        });

        $('.quantity').val(totalquantity);
}




$('.select').change(function(){

$(this).css("border","0");
$(this).css("box-shadow","none");
$(this).css("-moz-appearance", "none");
$(this).css("-webkit-appearance", "none");
});

//////select option



$('#saveitem').click(function(){


var data = $("#additem").serialize();
  $.ajax({
         data: data,
         type: "POST",
         url: "core/insertitem.php",
         success: function(data){
              alert("Data Save: " + data);
         }
});


});



 $('.delete_item').click(function(){
    

        var id = $(this).attr("id");

        if(confirm("Are you sure you want to delete this Record?")){
            $.ajax({
                type: "POST",
                url: "core/functions.php",
                data:{id:id},
                success: function(data){ 


                  $(document).ajaxStop(function(){
                  window.location.reload();
                  });

              
                 } 
            });
        }
        return false;
        });




$('#create_order').click(function(){

var PO = $('.po_number').val();
var qty= $('.quantity').val();


if(PO == '')
{
   $(window).scrollTop(0);
   $('.po_number').focus();
    $.notify({
          // options
          icon: 'glyphicon glyphicon-success-sign',
           title: 'Alert:',
          message: 'Purchase Number cannot be empty!!!'
        
       
        },{
          // settings
          type: 'danger'
        });

}else if(qty == '')
{

  $(window).scrollTop(0);
   $('#barcode').focus();
    $.notify({
          // options
          icon: 'glyphicon glyphicon-success-sign',
           title: 'Alert:',
          message: 'cart cannot be empty!!!'
        
       
        },{
          // settings
          type: 'danger'
        });

}
else
{

$.ajax({
url: "core/insert.php",
method: "POST",
data:$('#add_order').serialize(),
success: function(data){ 

  if(data.success = true){
     $(window).scrollTop(0);
     $('#create_order').hide();
    $('.btn-order').attr("disabled",true);
    $.notify({
          // options
          icon: 'glyphicon glyphicon-success-sign',
          title: 'Success:',
          message: 'Order Created, press esc to create new'
        
       
        },{
          // settings
          type: 'success'
        });
  

  }

}


  });



}




});



$('.getorders').click(function(){
  
var customer = $('.customer_id').val();
 
$.ajax({
url: "core/functions.php",
method: "POST",
data:{customer:customer},
success: function(data){ 
$('.lstorders').html(data);
$('#lstorders').modal("show");
}

});

   $('#lstorders').modal("show");

});



$('#barcode').keypress(function(e)
{


console.log("dasdsa");
    if (e.which == 13) 
    {
      var barcode = $('.barcode').val();
      $.ajax({
      url: "./core/Request/Products/selectitems.php",
      method: "POST",
      data:{barcode:barcode},
      success: function(data)
      { 
         
         $("#fields").append('<tr id="row">'+data+'</tr>');
         $('.barcode').val("");
         $('.no-item').hide();


          quantity();
          compute_cost();
          disc_percent();
          VAT();
          tax();

         $('.qty, .disc').keyup(function(e)
         {
            calc();
            quantity();
            compute_cost();
            disc_percent();
            VAT();
            tax();
         });



      }


      });
        return false;    
      }


});



  $("#fields").on('click','.remove',function()
  {
       
        quantity();
        compute_cost();
      
        $(this).parent().parent().remove();
       
  });



//////// calculate total
 function calc()
 {
      $('table > tbody  > tr').each(function() {
        var qty = $(this).find('.qty').val();
        var price = $(this).find('.prices').val();
        var disc = $(this).find('.disc').val();
        var amount = (qty*price);
        temp_discount = parseFloat(disc / 100);
        discount = parseFloat (temp_discount * amount); 
        total = amount - discount;

     $(this).find('.subtotal').val(total);

    });
 }

 function compute_cost(){
        var subtotal =0;
        
        $('.subtotal').each(function() {
        //Get the value

        var total = $(this).val();

        console.log(total);
        //if it's a number add it to the total
        if(IsNumeric(total)) {
        subtotal += parseFloat(total, 10);

        }

        });

        $('.sub-cost').val(subtotal + ".00");
        $('.total-cost').val(subtotal + ".00");
      
}

function disc_percent(){


    total_amount = 0;
    var subtotal =  $('.sub-cost').val();
    var discount_rate = $('.discount').val();

    discount_temp = parseFloat(discount_rate / 100);
    discount = parseFloat(discount_temp * subtotal);
    total_amount = subtotal - discount;
    $('.total-cost').val(total_amount + ".00");
      
}








$('.discount').keyup(function(e){

   disc_percent();

});











// insert_recieve

$('#insert_recieve').click(function(e){
     var $invoice  = $('.invoice_number').val();
     var $quantity = $('.quantity').val();

     e.preventDefault();

     if($invoice == '' )
      {
        
        $.notify({
          // options
          icon: 'glyphicon glyphicon-warning-sign',
          title: 'Error:',
          message: 'Invoice Number is empty' 
       
        },{
          // settings
          type: 'danger'
        });

           $('.invoice_number').focus();

      }
      else if($quantity == '')
      {

     
         $.notify({
          // options
          icon: 'glyphicon glyphicon-warning-sign',
          title: 'Error:',
          message: 'No Item in Cart!!!!' 
        
        },{
          // settings
          type: 'danger'
        });

           $('.barcode').focus();

      }
      else
      {
           $.ajax({
           type: "POST",
           url: "core/insert_recieve.php",
           method: "POST", 
        
           data:$('#form_recieve').serialize(),
           success: function(data){
         
                  $(document).ajaxStop(function(){
                  window.location.reload();
                  });
           


           }
          
        });
      }
})

// end insert_recieve


$('#pay').click(function(){
  $('#payment').modal('show');
   $('#cash').each(function(){
    this.checked = true;
    });
})

$('#cash').click(function(event){
   if(this.checked)
   {
    // alert("cash");
    // $('.check').checked = false;
    $('.check').each(function(){
    this.checked = false;
    $('.check_number').addClass("hidden");

    
    

});
   }

});

$('.check').click(function(event){
   if(this.checked)
   {
   


    $('#cash').each(function(){
    this.checked = false;
    $('.check_number').removeClass("hidden");
    
    

});
   }

});

$('#payment').click(function(){


  $.ajax({
  url: "core/insert_payment.php",
  method: "POST",
  data:$('#add_order').serialize(),
  success: function(data){ 


 }


  });


});





////// get po number

$('.get_PO').click(function(){



  var id = $('.customer_id').val();

  if(id == "")
  {
    alert("select customer first");
  }
  else
  {



 $.ajax({
    url: "core/get_orders.php",
    method:"post",
    data:{id:id},
    success:function(data)
    {
       $('.order_list').html(data);
       $('#Get_ORDER').modal("show");

    }



 })




  }





});
























$(document).keyup(function(e){
      if (e.which == 27) 
      {
         window.location.reload();
      }
});

});



