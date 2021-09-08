$(document).ready(() =>{

    const forgPsw = $('#forgot_password_email');
    const forgPswMsg = $('.forgot_password_email-error');
    const regEmail = /^[a-z]+[0-9a-zA-Z_\.]*@[a-z_]+\.[a-z]+$/;
    $("#forgot_password_form").submit((e) => {   
    e.preventDefault();

    if ($('input').hasClass('error')) {
        return false;
      } else {
  
        const forgPswChecked = $('#forgot_password_email').val();
        const submit = $('#forgot_password').val();
  
        $.ajax({
          type: 'post',
          url: './includes/forgot_password.inc.php',
          data: {
            'forgot_password_email': forgPswChecked,
            'forgot_password': submit
          },
          success: function (response) {
            console.log(response);
            if (response = true) {
              console.log(response);
              document.location.href = './success_resetpw';
              
            } else {
             
                forgPsw.removeClass('valid');
                forgPsw.addClass('error');
                forgPswMsg.text(response);
            } 
          }
        });
      }
   
  });

  forgPsw.focusout(() => {


    if (forgPsw.val() == '') {
      forgPswMsg.text('Email is required!');
      forgPsw.removeClass('valid');
      forgPsw.addClass('error');
    }else if (!regEmail.test(forgPsw.val())) {
      forgPsw.removeClass('valid');
      forgPsw.addClass('error');
      forgPswMsg.text('Enter valid email!');
    } else {
  
      checkEmail1 = forgPsw.val();
      $.ajax({
        type: 'post',
        url: './includes/forgot_password.inc.php',
        data: {
          'checkEmail1': checkEmail1
        },
        success: function (response) {
        
          console.log(response);

           if (response == false) {
            forgPsw.addClass('valid');
            forgPsw.removeClass('error');
            forgPswMsg.text(response);
          } else {
            forgPsw.addClass('error');
            forgPsw.removeClass('valid');
            forgPswMsg.text(response);
        }

        }
        })
    }
});

})
/* Forgoot password end */
/* New password start */
$(document).ready(() =>{

  const newPassword = $('#new_password');
  const newPasswordRe = $('#renew_password');
  const newPasswordMsg = $('.new_password-error');
  const newPasswordReMsg = $('.renew_password-error');
  const regPassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/;

  $("#new_password_form").submit((e) => {   
  e.preventDefault();

  if ($('input').hasClass('error')) {
      return false;
    } else {

      const newPasswordChecked = $('#new_password').val();
      const newPasswordReChecked = $('#renew_password').val();
      const submit = $('#new_password_btn').val();

      $.ajax({
        type: 'post',
        url: './includes/new_password.inc.php',
        data: {
          'new_password': newPasswordChecked,
          'new_password_btn': submit
        },
        success: function (response) {
          console.log(response);
          if (response = true) {
            console.log(response);
            document.location.href = './success_newpw';
            
          } else {
           
              newPassword.removeClass('valid');
              newPassword.addClass('error');
              newPasswordMsg.text(response);
          } 
        }
      });
    }
 
});
newPassword.focusout(() => {

  if (newPassword.val() !== '') {
      newPassword.removeClass('error');
      newPassword.addClass('valid'); 
      newPasswordMsg.text('');

    if (newPassword.val().length < 8) {
      newPassword.addClass('error');
      newPassword.removeClass('valid');
      newPasswordMsg.text('newPassword should be min 8 characters!');
    } else if (!regPassword.test(newPassword.val())) {
      newPassword.addClass('error');
      newPassword.removeClass('valid');
      newPasswordMsg.text('New Password should contain at least one digit,one capital letter,one small letter,one special characters and min 8 characters!');
    } else {
      newPasswordChecked = newPassword.val();
      newPasswordReChecked = newPasswordRe.val();

      
  $.ajax({
    type: 'post',
    url: './includes/new_password.inc.php',
    data: {
      'newPasswordChecked': newPasswordChecked
    },  success: function (response) {
      console.log(response);
       if (response = true) {
        newPassword.removeClass('error');
        newPassword.addClass('valid');
        newPasswordMsg.text('');
      } else {
        newPassword.removeClass('valid');
        newPassword.addClass('error');
        newPasswordMsg.text(response);
    }

    }
    })

      
    }
  } else {
    newPassword.addClass('error');
    newPassword.removeClass('valid');
    newPasswordMsg.text('newPassword is required!');
  }

});
newPasswordRe.focusout(() => {

  if (newPasswordRe.val() !== '') {

    if (newPassword.val() == newPasswordRe.val()) {
      newPasswordRe.removeClass('error');
      newPasswordRe.addClass('valid');
      newPasswordReMsg.text('');
    } else {
      newPasswordRe.addClass('error');
      newPasswordRe.removeClass('valid');
      newPasswordReMsg.text('newPassword and renewPassword should be same!');
    }
  } else {
    newPasswordRe.addClass('error');
    newPasswordRe.removeClass('valid');
    newPasswordReMsg.text('RenewPassword is required!');
  }


});



})
/* New password end */
/* New admin start */
$(document).ready(() =>{

  const adminFullname = $('#admin_fullname');
  const adminFullnameMsg = $('.admin_fullname-error');

  const adminEmail = $('#admin_email');
  const adminEmailMsg = $('.admin_email-error');

  const adminPassword = $('#admin_password');
  const adminPasswordRe = $('#re_admin_password');
  const adminPasswordMsg = $('.admin_password-error');
  const adminPasswordReMsg = $('.re_admin_password-error');

  const userType = $('#user_type');
  const userTypeMsg = $('.user_type-error');

  const superAdmin = $('#super_admin_password');
  const superAdminMsg = $('.super_admin_password-error');

  const regFullname = /^[a-zA-Z ]+$/;
  const regEmail = /^[a-z]+[0-9a-zA-Z_\.]*@[a-z_]+\.[a-z]+$/;
  const regPassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/;

  $("#new_admin_form").submit((e) => {   
  e.preventDefault();

  if ($('input').hasClass('error')) {
      return false;
    } else {

      const adminFullnameChecked = adminFullname.val();
      const adminEmailChecked = adminEmail.val();
      const adminPasswordChecked = adminPassword.val();
      const adminPasswordReChecked = adminPassword.val();
      const userTypeChecked = userType.val();
      const superAdminChecked = superAdmin.val();
      const submit = $('#new_admin').val();

      $.ajax({
        type: 'post',
        url: './includes/new_admin_validation.inc.php',
        data: {
          'admin_fullname': adminFullnameChecked,
          'admin_email': adminEmailChecked,
          'admin_password': adminPasswordChecked,
          're_admin_password': adminPasswordReChecked,
          'user_type': userTypeChecked,
          'super_admin_password': superAdminChecked,
          'new_admin': submit
        },
        success: function (response) {
          console.log(response);
          if (response) {
            console.log(response);
            //document.location.href = './success';
            
          } else {
           //document.location.href = './error_registration';
           console.log(response);
          } 
        }
      });
    }
 
});

adminFullname.focusout(() => {


  if (adminFullname.val() == '' && adminFullname.val().length < 3) {
    adminFullnameMsg.text('Admin fullname is required!');
    adminFullname.removeClass('valid');
    adminFullname.addClass('error');
  }else if (!regFullname.test(adminFullname.val())) {
    adminFullname.removeClass('valid');
    adminFullname.addClass('error');
    adminFullnameMsg.text('Enter valid fullname!');
  }else if (adminFullname.val().length >= 5) {
 
    checkadmin = adminFullname.val();
    $.ajax({
      type: 'post',
      url: './includes/new_admin_validation.inc.php',
      data: {
        'checkadmin': checkadmin
      },
      success: function (response) {
        console.log(response);
        if (response = true) {
         
          adminFullname.removeClass('error');
          adminFullname.addClass('valid');
          adminFullnameMsg.text('');
        }else {
         
          adminFullname.removeClass('valid');
          adminFullname.addClass('error');
          adminFullnameMsg.text(response);
        } 
      }
    });
  } else {
    adminFullname.removeClass('error');
    adminFullname.addClass('valid');
    adminFullnameMsg.text('');
  }
});
adminEmail.focusout(() => {


  if (adminEmail.val() == '') {
    adminEmailMsg.text('Admin email is required!');
    adminEmail.removeClass('valid');
    adminEmail.removeClass('error');
  }else if (!regEmail.test(adminEmail.val())) {
    adminEmail.removeClass('valid');
    adminEmail.addClass('error');
    adminEmailMsg.text('Enter valid email!');
  } else {

    checkadminEmail = adminEmail.val();
    $.ajax({
      type: 'post',
      url: './includes/new_admin_validation.inc.php',
      data: {
        'checkadminEmail': checkadminEmail
      },
      success: function (response) {
      
        console.log(response);

         if (response == false) {
          adminEmail.addClass('valid');
          adminEmail.removeClass('error');
          adminEmailMsg.text('');
        } else {
          adminEmail.addClass('error');
          adminEmail.removeClass('valid');
          adminEmailMsg.text(response);
      }

      }
      })
  }
});
adminPassword.focusout(() => {

  if (adminPassword.val() !== '') {
      adminPassword.removeClass('error');
      adminPassword.addClass('valid'); 
      adminPasswordMsg.text('');

    if (adminPassword.val().length < 8) {
      adminPassword.addClass('error');
      adminPassword.removeClass('valid');
      adminPasswordMsg.text('Password should be min 8 characters!');
    } else if (!regPassword.test(adminPassword.val())) {
      adminPassword.addClass('error');
      adminPassword.removeClass('valid');
      adminPasswordMsg.text('Password should contain at least one digit,one capital letter,one small letter,one special characters and min 8 characters!');
    } else {
      adminPasswordChecked = adminPassword.val();
      adminPasswordReChecked = adminPasswordRe.val();

      
  $.ajax({
    type: 'post',
    url: './includes/new_admin_validation.inc.php',
    data: {
      'adminPasswordChecked': adminPasswordChecked
    },  success: function (response) {
      console.log(response);
       if (response = true) {
        adminPassword.removeClass('error');
        adminPassword.addClass('valid');
        adminPasswordMsg.text('');
      } else {
          adminPassword.removeClass('valid');
          adminPassword.addClass('error');
          adminPasswordMsg.text(response);
    }

    }
    })

      
    }
  } else {
    adminPassword.addClass('error');
    adminPassword.removeClass('valid');
    adminPasswordMsg.text('Password is required!');
  }

});
adminPasswordRe.focusout(() => {

  if (adminPasswordRe.val() !== '') {

    if (adminPassword.val() == adminPasswordRe.val()) {
      adminPasswordRe.removeClass('error');
      adminPasswordRe.addClass('valid');
      adminPasswordReMsg.text('');
    } else {
      adminPasswordRe.addClass('error');
      adminPasswordRe.removeClass('valid');
      adminPasswordReMsg.text('Password and re password should be same!');
    }
  } else {
    adminPasswordRe.addClass('error');
    adminPasswordRe.removeClass('valid');
    adminPasswordReMsg.text('Re password is required!');
  }


});

userType.focusout(() => {

   if (userType.val() == '') {
      userTypeMsg.text('Chuse userType!');
      userType.removeClass('valid');
      userType.removeClass('error');
  } else {

      checkuserType = userType.val();
    $.ajax({
      type: 'post',
      url: './includes/new_admin_validation.inc.php',
      data: {
        'checkuserType': checkuserType
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

superAdmin.focusout(() => {

  if (superAdmin.val() !== '') {
    superAdmin.removeClass('error');
    superAdmin.addClass('valid'); 
    superAdminMsg.text('');

    if (superAdmin.val().length < 8) {
      superAdmin.addClass('error');
      superAdmin.removeClass('valid');
      superAdminMsg.text('Password should be min 8 characters!');
    } else if (!regPassword.test(superAdmin.val())) {
      superAdmin.addClass('error');
      superAdmin.removeClass('valid');
      superAdminMsg.text('Password should contain at least one digit,one capital letter,one small letter,one special characters and min 8 characters!!');
    } else {
      superAdminChecked = superAdmin.val();
     

      
  $.ajax({
    type: 'post',
    url: './includes/new_admin_validation.inc.php',
    data: {
      'superAdminChecked': superAdminChecked
    },  success: function (response) {
      console.log(response);
       if (response == false) {
        superAdmin.removeClass('error');
        superAdmin.addClass('valid');
        superAdminMsg.text('');
      } else {
        superAdmin.removeClass('valid');
        superAdmin.addClass('error');
        superAdminMsg.text(response);
    }

    }
    })

      
    }
  } else {
    superAdmin.addClass('error');
    superAdmin.removeClass('valid');
    superAdminMsg.text('Password is required!');
  }

});





})

/* New admin end */