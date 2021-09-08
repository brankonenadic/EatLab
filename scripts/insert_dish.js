$(document).ready(function(){
    $("#insert_form").submit(function (e) {   
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
            type: 'POST',
            url: './includes/insert_dish.inc.php',
            enctype: 'multipart/form-data',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
              if (response) {
                console.log(response);
              alert('YOU HAVE ADDED A NEW DISH!');
                document.location.reload(true);
                //document.location.href = './insert_dish';
              } else {
               
               console.log(response);
              } 

               
            }
        }
    );
  });
});


/* add table start */
$(document).ready(() =>{


    const tableName = $('#table_name');
    const tableNameMsg = $('.tableNameMsg');
  
    const tablePassword = $('#table_password');
    const tablePasswordMsg = $('.tablePasswordMsg');
    const regPassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/;
    $("#add_table_form").submit((e) => {   
    e.preventDefault();
  
    if ($('input').hasClass('error')) {
        return false;
      } else {
  
        const tableNameChecked = tableName.val();
        const tablePasswordChecked = tablePassword.val();
        const submit = $('#add_table_btn').val();
  
        $.ajax({
          type: 'post',
          url: './includes/add_table.inc.php',
          enctype: 'multipart/form-data',
          data: {
            'table_name': tableNameChecked,
            'table_password': tablePasswordChecked,
            'add_table_btn': submit
          },
          success: function (response) {
         
            if (response) {
              console.log(response);
              alert('YOU HAVE ADDED A NEW TABLE!');
              document.location.reload(true);
             //document.location.href = './add_table';
            } else {
             
             console.log(response);
            } 
          }
        });
      }
   
  });
  tablePassword.focusout(() => {
  
    if (tablePassword.val() !== '') {
      tablePassword.removeClass('error');
      tablePassword.addClass('valid'); 
      tablePasswordMsg.text('');
  
      if (tablePassword.val().length < 8) {
        tablePassword.addClass('error');
        tablePassword.removeClass('valid');
        tablePasswordMsg.text('Password should be min 8 characters!');
      } else if (!regPassword.test(tablePassword.val())) {
        tablePassword.addClass('error');
        tablePassword.removeClass('valid');
        tablePasswordMsg.text('New Password should contain at least one digit,one capital letter,one small letter,one special characters and min 8 characters!!');
      } else {
        tablePasswordChecked = tablePassword.val();
       
  
        
    $.ajax({
      type: 'post',
      url: './includes/add_table.inc.php',
      data: {
        'tablePasswordChecked': tablePasswordChecked
      },  success: function (response) {
        console.log(response);
         if (response == false) {
          tablePassword.removeClass('error');
          tablePassword.addClass('valid');
          tablePasswordMsg.text('');
        } else {
          tablePassword.removeClass('valid');
          tablePassword.addClass('error');
          tablePasswordMsg.text(response);
      }
  
      }
      })
  
        
      }
    } else {
      tablePassword.addClass('error');
      tablePassword.removeClass('valid');
      tablePasswordMsg.text('Password is required!');
    }
  
  });
  
  })  

/* add table end */
/* select table start */
$(document).ready(function(){
  $(".select_table_form").submit(function (e) {   
  e.preventDefault();
  var formData = new FormData(this);
  $.ajax({
          type: 'POST',
          url: './includes/select_table.inc.php',
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

/* select table end */

/* select menu category start */
$(document).ready(function(){
  $(".select_menu_category_form").submit(function (e) {   
  e.preventDefault();
  var formData = new FormData(this);
  $.ajax({
          type: 'POST',
          url: './includes/menu_category.inc.php',
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

$(".select_business_btn").click(function() {
  $([document.documentElement, document.body]).animate({
      scrollTop: $("#section-dish").offset().top
  }, 1000);
});

/* select menu category end */

/* Update dish status start */
$(document).ready(function(){
  $(".aktive_dish_form").submit(function (e) {   
  e.preventDefault();
  var formData = new FormData(this);
  $.ajax({
          type: 'POST',
          url: './includes/active_dish.inc.php',
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

/* Update dish status end */