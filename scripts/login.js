$(document).ready(() =>{

    const logemail = $('#log_email');
    const logemailMsg = $('.log_email-error');
    const logpassword = $('#log_password');
    const logpasswordMsg = $('.log_password-error');

    const regEmail = /^[a-z]+[0-9a-zA-Z_\.]*@[a-z_]+\.[a-z]+$/;
    const regPassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/;
    $("#login_form").submit((e) => {   
    e.preventDefault();

    if ($('input').hasClass('error')) {
        return false;
      } else {
  
        const logemailChecked = $('#log_email').val();
        const logpasswordChecked = $('#log_password').val();
        const submit = $('#login').val();
  
        $.ajax({
          type: 'post',
          url: './includes/login.inc.php',
          data: {
            'log_email': logemailChecked,
            'log_password': logpasswordChecked,
            'login': submit
          },
          success: function (response) {
           
            if (response) {
              console.log(response);
              document.location.href = './index';
              
            } else {
              console.log(response);
              logpassword.removeClass('valid');
              logpassword.addClass('error');
              logpasswordMsg.text('Email or password is incorect');
            } 
          }
        });
      }
   
  });
  logemail.focusout(() => {


    if (logemail.val() == '') {
      logemailMsg.text('email is required!');
      logemail.removeClass('valid');
      logemail.removeClass('error');
    }else if (!regEmail.test(logemail.val())) {
      logemail.removeClass('valid');
      logemail.addClass('error');
      logemailMsg.text('Enter valid email!');
    } else {
  
      checklogemail = logemail.val();
      $.ajax({
        type: 'post',
        url: './includes/login.inc.php',
        data: {
          'checklogemail': checklogemail
        },
        success: function (response) {
        
          console.log(response);

           if (response == false) {
            console.log(response);
            logemail.addClass('valid');
            logemail.removeClass('error');
            logemailMsg.text('');
          } else {
            console.log(response);
            logemail.addClass('error');
            logemail.removeClass('valid');
            logemailMsg.text(response);
        }

        }
        })
    }
});
logpassword.focusout(() => {

    if (logpassword.val() !== '') {
        logpassword.removeClass('error');
        logpassword.addClass('valid'); 
        logpasswordMsg.text('');

      if (logpassword.val().length < 8) {
        logpassword.addClass('error');
        logpassword.removeClass('valid');
        logpasswordMsg.text('password should be min 8 characters!');
      } else if (!regPassword.test(logpassword.val())) {
        logpassword.addClass('error');
        logpassword.removeClass('valid');
        logpasswordMsg.text('password should contain at least one digit,one capital letter,one small letter,one special characters and min 8 characters!');
      } else {
        logpasswordChecked = logpassword.val();
       

        
    $.ajax({
      type: 'post',
      url: './includes/login.inc.php',
      data: {
        'logpasswordChecked': logpasswordChecked
      },  success: function (response) {
        console.log(response);
         if (response == false) {
          console.log(response);
          logpassword.removeClass('error');
          logpassword.addClass('valid');
          logpasswordMsg.text('');
        } else {
          console.log(response);
          logpassword.removeClass('valid');
          logpassword.addClass('error');
          logpasswordMsg.text(response);
      }

      }
      })

        
      }
    } else {
      logpassword.addClass('error');
      logpassword.removeClass('valid');
      logpasswordMsg.text('password is required!');
    }

});

})

