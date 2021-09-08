$(document).ready(function(){
    $(".select_dish_form").submit(function (e) {   
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
                type: 'POST',
                url: './cart',
                enctype: 'multipart/form-data',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    
                    if (response) {
                      console.log(response);
                      alert('THE DISH WAS ADDED TO THE CART !');
                     // document.location.reload(true);
                    } else {
                     
                     console.log(response);
                    } 
                }
            }
        );

        
      });

      $(document).ready(function(){
        $("#order_form").submit(function (e) {   
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
                type: 'POST',
                url: './includes/order.inc.php',
                enctype: 'multipart/form-data',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                   
                    if (response) {
                      console.log(response);
                      document.location.href = './cart?action=clear';
                    } else {
                     
                     console.log(response);
                    } 
                  }
            }
        );
      });
      });


});
$(document).ready(function(){
  $(".select_business_form").submit(function (e) {   
  e.preventDefault();
  var formData = new FormData(this);
  $.ajax({
          type: 'POST',
          url: './includes/select_business.inc.php',
          enctype: 'multipart/form-data',
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
             
              if (response) {
                console.log(response);
                document.location.href = './menu';
            
              } else {
               console.log(response);
              } 
              
            }
            
      }
  );
});
});
$(document).ready(function(){
  $(".select_restoran_form").submit(function (e) {   
  e.preventDefault();
  var formData = new FormData(this);
  $.ajax({
          type: 'POST',
          url: './includes/select_business.inc.php',
          enctype: 'multipart/form-data',
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
             
              if (response) {
                console.log(response);
                document.location.reload(true);
            
              } else {
               console.log(response);
              } 
              
            }
            
      }
  );
});
});

$(document).ready(function(){
  $(".order_status_form").submit(function (e) {   
  e.preventDefault();
  var formData = new FormData(this);
  $.ajax({
          type: 'POST',
          url: './includes/order_status.inc.php',
          enctype: 'multipart/form-data',
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
             
              if (response) {
                console.log(response);
                document.location.reload(true);
              } else {
               
               console.log(response);
              } 
            }
      }
  );
});
});

$(document).ready(function(){
  $(".order_confirm_form").submit(function (e) {   
  e.preventDefault();
  var formData = new FormData(this);
  $.ajax({
          type: 'POST',
          url: './includes/order_confirm.inc.php',
          enctype: 'multipart/form-data',
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
             
              if (response) {
                console.log(response);
                document.location.reload(true);
              } else {
               
               console.log(response);
              } 
            }
      }
  );
});
});

$(document).ready(function(){
  $(".order_accept_form").submit(function (e) {   
  e.preventDefault();
  var formData = new FormData(this);
  $.ajax({
          type: 'POST',
          url: './includes/order_accept.inc.php',
          enctype: 'multipart/form-data',
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
             
              if (response) {
                console.log(response);
                document.location.reload(true);
              } else {
               
               console.log(response);
              } 
            }
      }
  );
});
});

$(document).ready(function(){
  $(".order_ready_form").submit(function (e) {   
  e.preventDefault();
  var formData = new FormData(this);
  $.ajax({
          type: 'POST',
          url: './includes/order_ready.inc.php',
          enctype: 'multipart/form-data',
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
             
              if (response) {
                console.log(response);
                document.location.reload(true);
              } else {
               
               console.log(response);
              } 
            }
      }
  );
});
});

$(document).ready(function(){
  $(".order_finish_form").submit(function (e) {   
  e.preventDefault();
  var formData = new FormData(this);
  $.ajax({
          type: 'POST',
          url: './includes/order_finish.inc.php',
          enctype: 'multipart/form-data',
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
             
              if (response) {
                console.log(response);
                document.location.reload(true);
              } else {
               
               console.log(response);
              } 
            }
      }
  );
});
});

$(document).ready(function(){
  $("#ask_for_bill_form").submit(function (e) {   
  e.preventDefault();
  var formData = new FormData(this);
  $.ajax({
          type: 'POST',
          url: './includes/take_bill.inc.php',
          enctype: 'multipart/form-data',
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
             
              if (response) {
                console.log(response);
                document.location.reload(true);
              } else {
               
               console.log(response);
              } 
            }
      }
  );
});
});

$(document).ready(function(){
  $(".print_bill_form").submit(function (e) {   
  e.preventDefault();
  var formData = new FormData(this);
  $.ajax({
          type: 'POST',
          url: './includes/bill.inc.php',
          enctype: 'multipart/form-data',
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
             
              if (response) {
                console.log(response);
                document.location.reload(true);
              } else {
               
               console.log(response);
              } 
            }
      }
  );
});
});

 
            