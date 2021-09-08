$(document).ready(() =>{

    const fullname = $('#fullname');
    const fullnameMsg = $('.fullname-error');
  
    const email = $('#user_email');
    const emailMsg = $('.user_email-error');
  
    const password = $('#password');
    const passwordRe = $('#re_password');
    const passwordMsg = $('.password-error');
    const repeatPasswordMsg = $('.re_password-error');
    const userType = $('#user_type');
    const userTypeMsg = $('.user_type-error');

    const regfullname = /^[A-žÀ-ÿš ]+$/;
    const regEmail = /^[a-z]+[0-9a-zA-Z_\.]*@[a-z_]+\.[a-z]+$/;
    const regPassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/;

    $("#registar_form").submit((e) => {   
    e.preventDefault();

    if ($('input').hasClass('error')) {
        return false;
      } else {
  
        const fullnameChecked = $('#fullname').val();
        const emailChecked = $('#user_email').val();
        const passwordChecked = $('#password').val();
        const passwordReChecked = $('#re_password').val();
        const userTypeChecked = $('#user_type').val();
        const submit = $('#registar').val();
  
        $.ajax({
          type: 'post',
          url: './includes/validation.inc.php',
          data: {
            'fullname': fullnameChecked,
            'user_email': emailChecked,
            'password': passwordChecked,
            're_password': passwordReChecked,
            'user_type': userTypeChecked,
            'registar': submit
          },
          success: function (response) {
           
            if (response) {
              console.log(response);
              document.location.href = './success';
              
            } else {
             document.location.href = './error_registration';
             console.log(response);
            } 
          }
        });
      }
   
  });

  fullname.focusout(() => {

 
    if (fullname.val() == '' && fullname.val().length < 3) {
      fullnameMsg.text('User name is required!');
      fullname.removeClass('valid');
      fullname.addClass('error');
    }else if (!regfullname.test(fullname.val())) {
      fullname.removeClass('valid');
      fullname.addClass('error');
      fullnameMsg.text('Enter valid username!');
    }else if (fullname.val().length >= 5) {
   
      checkName = fullname.val();
      $.ajax({
        type: 'post',
        url: './includes/validation.inc.php',
        data: {
          'checkName': checkName
        },
        success: function (response) {
          console.log(response);
          if (response = true) {
           
            fullname.removeClass('error');
            fullname.addClass('valid');
            fullnameMsg.text('');
          }else {
           
            fullname.removeClass('valid');
            fullname.addClass('error');
            fullnameMsg.text(response);
          } 
        }
      });
    } else {
      fullname.removeClass('error');
      fullname.addClass('valid');
      fullnameMsg.text('');
    }
  });
  email.focusout(() => {


    if (email.val() == '') {
      emailMsg.text('Email is required!');
      email.removeClass('valid');
      email.removeClass('error');
    }else if (!regEmail.test(email.val())) {
      email.removeClass('valid');
      email.addClass('error');
      emailMsg.text('Enter valid email!');
    } else {
  
      checkEmail = email.val();
      $.ajax({
        type: 'post',
        url: './includes/validation.inc.php',
        data: {
          'checkEmail': checkEmail
        },
        success: function (response) {
        
          console.log(response);

           if (response == false) {
            email.addClass('valid');
            email.removeClass('error');
            emailMsg.text('');
          } else {
            email.addClass('error');
            email.removeClass('valid');
            emailMsg.text(response);
        }

        }
        })
    }
});
password.focusout(() => {

    if (password.val() !== '') {
        password.removeClass('error');
        password.addClass('valid'); 
        passwordMsg.text('');

      if (password.val().length < 8) {
        password.addClass('error');
        password.removeClass('valid');
        passwordMsg.text('Password should be min 8 characters!');
      } else if (!regPassword.test(password.val())) {
        password.addClass('error');
        password.removeClass('valid');
        passwordMsg.text('Password should contain at least one digit,one capital letter,one small letter,one special characters and min 8 characters!');
      } else {
        passwordChecked = password.val();
        passwordReChecked = passwordRe.val();

        
    $.ajax({
      type: 'post',
      url: './includes/validation.inc.php',
      data: {
        'passwordChecked': passwordChecked
      },  success: function (response) {
        console.log(response);
         if (response = true) {
          password.removeClass('error');
          password.addClass('valid');
          passwordMsg.text('');
        } else {
          password.removeClass('valid');
          password.addClass('error');
          passwordMsg.text(response);
      }

      }
      })

        
      }
    } else {
      password.addClass('error');
      password.removeClass('valid');
      passwordMsg.text('Password is required!');
    }

});
passwordRe.focusout(() => {

    if (passwordRe.val() !== '') {

      if (password.val() == passwordRe.val()) {
        passwordRe.removeClass('error');
        passwordRe.addClass('valid');
        repeatPasswordMsg.text('');
      } else {
        passwordRe.addClass('error');
        passwordRe.removeClass('valid');
        repeatPasswordMsg.text('Password and re password should be same!');
      }
    } else {
      passwordRe.addClass('error');
      passwordRe.removeClass('valid');
      repeatPasswordMsg.text('Re password is required!');
    }


});

userType.focusout(() => {

     if (userType.val() == '') {
        userTypeMsg.text('Chuse users type!');
        userType.removeClass('valid');
        userType.removeClass('error');
    } else {
  
        checkUserType = userType.val();
      $.ajax({
        type: 'post',
        url: './includes/validation.inc.php',
        data: {
          'checkUserType': checkUserType
        },
        success: function (response) {
          console.log(response);
           if (response = true) {
            userType.removeClass('error');
            userType.addClass('valid');
            userTypeMsg.text('');
          } else {
            userType.removeClass('valid');
            userType.addClass('error');
            userTypeMsg.text(response);
        }

        }
        })
    }     

});







})


