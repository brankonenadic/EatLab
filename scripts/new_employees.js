$(document).ready(() =>{

    const employeesFullname = $('#employees_fullname');
    const employeesFullnameMsg = $('.employees_fullname-error');
  
    const employeesEmail = $('#employees_email');
    const employeesEmailMsg = $('.employees_email-error');
  
    const employeesPassword = $('#employees_password');
    const employeesPasswordRe = $('#re_employees_password');
    const employeesPasswordMsg = $('.employees_password-error');
    const employeesPasswordReMsg = $('.re_employees_password-error');

    const position = $('#position');
    const positionMsg = $('.position-error');

    const bossPassword = $('#boss_password');
    const bossPasswordMsg = $('.boss_password-error');

    const regFullname = /^[a-zA-Z ]+$/;
    const regEmail = /^[a-z]+[0-9a-zA-Z_\.]*@[a-z_]+\.[a-z]+$/;
    const regPassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/;

    $("#new_employees_form").submit((e) => {   
    e.preventDefault();

    if ($('input').hasClass('error')) {
        return false;
      } else {
  
        const employeesFullnameChecked = employeesFullname.val();
        const employeesEmailChecked = employeesEmail.val();
        const employeesPasswordChecked = employeesPassword.val();
        const employeesPasswordReChecked = employeesPassword.val();
        const positionChecked = position.val();
        const bossPasswordChecked = bossPassword.val();
        const submit = $('#new_employees').val();
  
        $.ajax({
          type: 'post',
          url: './includes/new_employees_validation.inc.php',
          data: {
            'employees_fullname': employeesFullnameChecked,
            'employees_email': employeesEmailChecked,
            'employees_password': employeesPasswordChecked,
            're_employees_password': employeesPasswordReChecked,
            'position': positionChecked,
            'boss_password': bossPasswordChecked,
            'new_employees': submit
          },
          success: function (response) {
            console.log(response);
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

  employeesFullname.focusout(() => {

 
    if (employeesFullname.val() == '' && employeesFullname.val().length < 3) {
      employeesFullnameMsg.text('User name is required!');
      employeesFullname.removeClass('valid');
      employeesFullname.addClass('error');
    }else if (!regFullname.test(employeesFullname.val())) {
      employeesFullname.removeClass('valid');
      employeesFullname.addClass('error');
      employeesFullnameMsg.text('Enter valid username!');
    }else if (employeesFullname.val().length >= 5) {
   
      checkemployees = employeesFullname.val();
      $.ajax({
        type: 'post',
        url: './includes/new_employees_validation.inc.php',
        data: {
          'checkemployees': checkemployees
        },
        success: function (response) {
          console.log(response);
          if (response = true) {
           
            employeesFullname.removeClass('error');
            employeesFullname.addClass('valid');
            employeesFullnameMsg.text('');
          }else {
           
            employeesFullname.removeClass('valid');
            employeesFullname.addClass('error');
            employeesFullnameMsg.text(response);
          } 
        }
      });
    } else {
      employeesFullname.removeClass('error');
      employeesFullname.addClass('valid');
      employeesFullnameMsg.text('');
    }
  });
  employeesEmail.focusout(() => {


    if (employeesEmail.val() == '') {
      employeesEmailMsg.text('employeesEmail is required!');
      employeesEmail.removeClass('valid');
      employeesEmail.removeClass('error');
    }else if (!regEmail.test(employeesEmail.val())) {
      employeesEmail.removeClass('valid');
      employeesEmail.addClass('error');
      employeesEmailMsg.text('Enter valid employeesEmail!');
    } else {
  
      checkemployeesEmail = employeesEmail.val();
      $.ajax({
        type: 'post',
        url: './includes/new_employees_validation.inc.php',
        data: {
          'checkemployeesEmail': checkemployeesEmail
        },
        success: function (response) {
        
          console.log(response);

           if (response == false) {
            employeesEmail.addClass('valid');
            employeesEmail.removeClass('error');
            employeesEmailMsg.text('');
          } else {
            employeesEmail.addClass('error');
            employeesEmail.removeClass('valid');
            employeesEmailMsg.text(response);
        }

        }
        })
    }
});
employeesPassword.focusout(() => {

    if (employeesPassword.val() !== '') {
        employeesPassword.removeClass('error');
        employeesPassword.addClass('valid'); 
        employeesPasswordMsg.text('');

      if (employeesPassword.val().length < 8) {
        employeesPassword.addClass('error');
        employeesPassword.removeClass('valid');
        employeesPasswordMsg.text('Password should be min 8 characters!');
      } else if (!regPassword.test(employeesPassword.val())) {
        employeesPassword.addClass('error');
        employeesPassword.removeClass('valid');
        employeesPasswordMsg.text('Password should contain at least one digit,one capital letter,one small letter,one special characters and min 8 characters!');
      } else {
        employeesPasswordChecked = employeesPassword.val();
        employeesPasswordReChecked = employeesPasswordRe.val();

        
    $.ajax({
      type: 'post',
      url: './includes/new_employees_validation.inc.php',
      data: {
        'employeesPasswordChecked': employeesPasswordChecked
      },  success: function (response) {
        console.log(response);
         if (response = true) {
          employeesPassword.removeClass('error');
          employeesPassword.addClass('valid');
          employeesPasswordMsg.text('');
        } else {
            employeesPassword.removeClass('valid');
            employeesPassword.addClass('error');
            employeesPasswordMsg.text(response);
      }

      }
      })

        
      }
    } else {
      employeesPassword.addClass('error');
      employeesPassword.removeClass('valid');
      employeesPasswordMsg.text('Password is required!');
    }

});
employeesPasswordRe.focusout(() => {

    if (employeesPasswordRe.val() !== '') {

      if (employeesPassword.val() == employeesPasswordRe.val()) {
        employeesPasswordRe.removeClass('error');
        employeesPasswordRe.addClass('valid');
        employeesPasswordReMsg.text('');
      } else {
        employeesPasswordRe.addClass('error');
        employeesPasswordRe.removeClass('valid');
        employeesPasswordReMsg.text('Password and re password should be same!');
      }
    } else {
      employeesPasswordRe.addClass('error');
      employeesPasswordRe.removeClass('valid');
      employeesPasswordReMsg.text('Re password is required!');
    }


});

position.focusout(() => {

     if (position.val() == '') {
        positionMsg.text('Chuse position!');
        position.removeClass('valid');
        position.removeClass('error');
    } else {
  
        checkposition = position.val();
      $.ajax({
        type: 'post',
        url: './includes/new_employees_validation.inc.php',
        data: {
          'checkposition': checkposition
        },
        success: function (response) {
          console.log(response);
           if (response = true) {
            position.removeClass('error');
            position.addClass('valid');
            positionMsg.text('');
          } else {
            position.removeClass('valid');
            position.addClass('error');
            positionMsg.text(response);
        }

        }
        })
    }     

});

bossPassword.focusout(() => {

    if (bossPassword.val() !== '') {
      bossPassword.removeClass('error');
      bossPassword.addClass('valid'); 
      bossPasswordMsg.text('');
  
      if (bossPassword.val().length < 8) {
        bossPassword.addClass('error');
        bossPassword.removeClass('valid');
        bossPasswordMsg.text('Password should be min 8 characters!');
      } else if (!regPassword.test(bossPassword.val())) {
        bossPassword.addClass('error');
        bossPassword.removeClass('valid');
        bossPasswordMsg.text('Password should contain at least one digit,one capital letter,one small letter,one special characters and min 8 characters!!');
      } else {
        bossPasswordChecked = bossPassword.val();
       
  
        
    $.ajax({
      type: 'post',
      url: './includes/new_employees_validation.inc.php',
      data: {
        'bossPasswordChecked': bossPasswordChecked
      },  success: function (response) {
        console.log(response);
         if (response == false) {
          bossPassword.removeClass('error');
          bossPassword.addClass('valid');
          bossPasswordMsg.text('');
        } else {
          bossPassword.removeClass('valid');
          bossPassword.addClass('error');
          bossPasswordMsg.text(response);
      }
  
      }
      })
  
        
      }
    } else {
      bossPassword.addClass('error');
      bossPassword.removeClass('valid');
      bossPasswordMsg.text('Password is required!');
    }
  
  });





})


$(document).ready(function(){
  $(".aktive_form").submit(function (e) {   
  e.preventDefault();
  var formData = new FormData(this);
  $.ajax({
          type: 'POST',
          url: './includes/active_status.inc.php',
          enctype: 'multipart/form-data',
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
             
              if (response) {
                console.log(response);
                document.location.reload(true);
                //document.location.href = './employees_active';
              } else {
               
               console.log(response);
              } 
            }
      }
  );
});
});





/* Update employees start */
$(document).ready(() =>{



  const phone = $('#phone');
  const phoneMsg = $('.phone-error');

  const address = $('#address');
  const addressMsg = $('.address-error');

  const city = $('#city');
  const cityMsg = $('.city-error');

  const zipcode = $('#zip_code');
  const zipcodeMsg = $('.zip_code-error');

  const country = $('#country');
  const countryMsg = $('.country-error');

  

  $("#user_profile_form").submit((e) => {   
  e.preventDefault();

  if ($('input').hasClass('error')) {
      return false;
    } else {

      const phoneChecked = $('#phone').val();
      const addressChecked = $('#address').val();
      const cityChecked = $('#city').val();
      const zipcodeChecked = $('#zip_code').val();
      const countryChecked = $('#country').val();
      const submit = $('#insert_bio').val();

      $.ajax({
        type: 'post',
        url: './includes/user_bio.inc.php',
        enctype: 'multipart/form-data',
        data: {
      
          'phone': phoneChecked,
          'address': addressChecked,
          'city': cityChecked,
          'zip_code': zipcodeChecked,
          'country': countryChecked,
          'insert_bio': submit
        },
        success: function (response) {
          console.log(response);
          if (response) {
            console.log(response);
            document.location.reload(true);
            //document.location.href = './user_profile'
          } else {
           
           console.log(response);
          } 
        }
      });
    }
 
});

})   

/* Update img start */

$(document).ready(function(){
  $("#employees_img_form").submit(function (e) {   
  e.preventDefault();
  var formData = new FormData(this);
  $.ajax({
          type: 'POST',
          url: './includes/update_employees_img.inc.php',
          enctype: 'multipart/form-data',
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
             
              if (response) {
                console.log(response);
                document.location.reload(true);
                //document.location.href = './employees_profile';
              } else {
               
               console.log(response);
              } 
            }
      }
  );
});
});  
/* Update img end */
/* Updatw phone start */
$(document).ready(() =>{


const updateEmployeesPhone = $('#update_employees_phone');
const updateEmployeesPhoneMsg = $('.update_employees_phone-error');

const updateEmployeesPhonePassword = $('#update_employees_phone_password');
const  updateEmployeesPhonePasswordMsg = $('.update_employees_phone_password-error');
const regPassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/;
$("#update_employees_phone_form").submit((e) => {   
e.preventDefault();

if ($('input').hasClass('error')) {
    return false;
  } else {

    const updateEmployeesPhoneChecked = updateEmployeesPhone.val();
    const updateEmployeesPhonepasswordChecked =  updateEmployeesPhonePassword.val();
    const submit = $('#update_employees_phone_btn').val();

    $.ajax({
      type: 'post',
      url: './includes/update_employees_phone.inc.php',
      enctype: 'multipart/form-data',
      data: {
        'update_employees_phone': updateEmployeesPhoneChecked,
        'update_employees_phone_password': updateEmployeesPhonepasswordChecked,
        'update_employees_phone_btn': submit
      },
      success: function (response) {
        console.log(response);
        if (response) {
          console.log(response);
          document.location.reload(true);
          //document.location.href = './employees_profile';
        } else {
         
         console.log(response);
        } 
      }
    });
  }

});
updateEmployeesPhonePassword.focusout(() => {

if (updateEmployeesPhonePassword.val() !== '') {
  updateEmployeesPhonePassword.removeClass('error');
  updateEmployeesPhonePassword.addClass('valid'); 
  updateEmployeesPhonePasswordMsg.text('');

  if (updateEmployeesPhonePassword.val().length < 8) {
    updateEmployeesPhonePassword.addClass('error');
    updateEmployeesPhonePassword.removeClass('valid');
    updateEmployeesPhonePasswordMsg.text('Password should be min 8 characters!');
  } else if (!regPassword.test(updateEmployeesPhonePassword.val())) {
    updateEmployeesPhonePassword.addClass('error');
    updateEmployeesPhonePassword.removeClass('valid');
    updateEmployeesPhonePassword.text('New Password should contain at least one digit,one capital letter,one small letter,one special characters and min 8 characters!!');
  } else {
    updateEmployeesPhonePasswordChecked = updateEmployeesPhonePassword.val();
   

    
$.ajax({
  type: 'post',
  url: './includes/update_employees_phone.inc.php',
  data: {
    'updateEmployeesPhonePasswordChecked': updateEmployeesPhonePasswordChecked
  },  success: function (response) {
    console.log(response);
     if (response == false) {
      updateEmployeesPhonePassword.removeClass('error');
      updateEmployeesPhonePassword.addClass('valid');
      updateEmployeesPhonePasswordMsg.text('');
    } else {
      updateEmployeesPhonePassword.removeClass('valid');
      updateEmployeesPhonePassword.addClass('error');
      updateEmployeesPhonePasswordMsg.text(response);
  }

  }
  })

    
  }
} else {
  updateEmployeesPhonePassword.addClass('error');
  updateEmployeesPhonePassword.removeClass('valid');
  updateEmployeesPhonePasswordMsg.text('Password is required!');
}

});

})  
/* Updatw phone end */


/* Updatw address start */
$(document).ready(() =>{


const updateEmployeesAddress = $('#update_employees_address');
const updateEmployeesAddressMsg = $('.update_employees_address');

const updateEmployeesAddressPassword = $('#update_employees_address_password');
const updateEmployeesAddressPasswordMsg = $('.update_employees_address_password-error');
const regPassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/;
$("#update_employees_address_form").submit((e) => {   
e.preventDefault();

if ($('input').hasClass('error')) {
    return false;
  } else {

    const updateEmployeesAddressChecked = updateEmployeesAddress.val();
    const updateEmployeesAddressPasswordChecked = updateEmployeesAddressPassword.val();
    const submit = $('#update_employees_address_btn').val();

    $.ajax({
      type: 'post',
      url: './includes/update_employees_address.inc.php',
      enctype: 'multipart/form-data',
      data: {
        'update_employees_address': updateEmployeesAddressChecked,
        'update_employees_address_password': updateEmployeesAddressPasswordChecked,
        'update_employees_address_btn': submit
      },
      success: function (response) {
        console.log(response);
        if (response) {
          console.log(response);
          document.location.reload(true);
          //document.location.href = './employees_profile';
        } else {
         
         console.log(response);
        } 
      }
    });
  }

});
updateEmployeesAddressPassword.focusout(() => {

if (updateEmployeesAddressPassword.val() !== '') {
  updateEmployeesAddressPassword.removeClass('error');
  updateEmployeesAddressPassword.addClass('valid'); 
  updateEmployeesAddressPasswordMsg.text('');

  if (updateEmployeesAddressPassword.val().length < 8) {
    updateEmployeesAddressPassword.addClass('error');
    updateEmployeesAddressPassword.removeClass('valid');
    updateEmployeesAddressPasswordMsg.text('Password should be min 8 characters!');
  } else if (!regPassword.test(updateEmployeesAddressPassword.val())) {
    updateEmployeesAddressPassword.addClass('error');
    updateEmployeesAddressPassword.removeClass('valid');
    updateEmployeesAddressPasswordMsg.text('New Password should contain at least one digit,one capital letter,one small letter,one special characters and min 8 characters!!');
  } else {
    updateEmployeesAddressPasswordChecked = updateEmployeesAddressPassword.val();
   

    
$.ajax({
  type: 'post',
  url: './includes/update_employees_address.inc.php',
  data: {
    'updateEmployeesAddressPasswordChecked': updateEmployeesAddressPasswordChecked
  },  success: function (response) {
    console.log(response);
     if (response == false) {
      updateEmployeesAddressPassword.removeClass('error');
      updateEmployeesAddressPassword.addClass('valid');
      updateEmployeesAddressPasswordMsg.text('');
    } else {
      updateEmployeesAddressPassword.removeClass('valid');
      updateEmployeesAddressPassword.addClass('error');
      updateEmployeesAddressPasswordMsg.text(response);
  }

  }
  })

    
  }
} else {
  updateEmployeesAddressPassword.addClass('error');
  updateEmployeesAddressPassword.removeClass('valid');
  updateEmployeesAddressPasswordMsg.text('Password is required!');
}

});

})  
/* Updatw address end */
/* Updatw city start */
$(document).ready(() =>{


const updateEmployeesCity = $('#update_employees_city');
const updateEmployeesCityMsg = $('.update_employees_city-error');

const updateEmployeesCityPassword = $('#update_employees_city_password');
const updateEmployeesCityPasswordMsg = $('.update_employees_city_password-error');
const regPassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/;
$("#update_employees_city_form").submit((e) => {   
e.preventDefault();

if ($('input').hasClass('error')) {
    return false;
  } else {

    const updateEmployeesCityChecked = updateEmployeesCity.val();
    const updateEmployeesCityPasswordChecked = updateEmployeesCityPassword.val();
    const submit = $('#update_employees_city_btn').val();

    $.ajax({
      type: 'post',
      url: './includes/update_employes_city.inc.php',
      enctype: 'multipart/form-data',
      data: {
        'update_employees_city':updateEmployeesCityChecked,
        'update_employees_city_password': updateEmployeesCityPasswordChecked,
        'update_employees_city_btn': submit
      },
      success: function (response) {
        console.log(response);
        if (response) {
          console.log(response);
          document.location.reload(true);
          //document.location.href = './employees_profile';
        } else {
         
         console.log(response);
        } 
      }
    });
  }

});
updateEmployeesCityPassword.focusout(() => {

if (updateEmployeesCityPassword.val() !== '') {
  updateEmployeesCityPassword.removeClass('error');
  updateEmployeesCityPassword.addClass('valid'); 
  updateEmployeesCityPasswordMsg.text('');

  if (updateEmployeesCityPassword.val().length < 8) {
    updateEmployeesCityPassword.addClass('error');
    updateEmployeesCityPassword.removeClass('valid');
    updateEmployeesCityPasswordMsg.text('Password should be min 8 characters!');
  } else if (!regPassword.test(updateEmployeesCityPassword.val())) {
    updateEmployeesCityPassword.addClass('error');
    updateEmployeesCityPassword.removeClass('valid');
    updateEmployeesCityPasswordMsg.text('New Password should contain at least one digit,one capital letter,one small letter,one special characters and min 8 characters!!');
  } else {
    updateEmployeesCityPasswordChecked = updateEmployeesCityPassword.val();
   

    
$.ajax({
  type: 'post',
  url: './includes/update_employes_city.inc.php',
  data: {
    'updateEmployeesCityPasswordChecked': updateEmployeesCityPasswordChecked
  },  success: function (response) {
    console.log(response);
     if (response == false) {
      updateEmployeesCityPassword.removeClass('error');
      updateEmployeesCityPassword.addClass('valid');
      updateEmployeesCityPasswordMsg.text('');
    } else {
      updateEmployeesCityPassword.removeClass('valid');
      updateEmployeesCityPassword.addClass('error');
      updateEmployeesCityPasswordMsg.text(response);
  }

  }
  })

    
  }
} else {
  updateEmployeesCityPassword.addClass('error');
  updateEmployeesCityPassword.removeClass('valid');
  updateEmployeesCityPasswordMsg.text('Password is required!');
}

});

})  
/* Updatw city end */
/* Updatw zipcode start */
$(document).ready(() =>{


const updateEmployeesZipcode = $('#update_employees_zipcode');
const updateEmployeesZipcodeMsg = $('.update_employees_zipcode-error');

const updateEmployeesZipcodePassword = $('#update_employees_zipcode_password');
const updateEmployeesZipcodePasswordMsg = $('.update_employees_zipcode_password-error');
const regPassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/;
$("#update_employees_zipcode_form").submit((e) => {   
e.preventDefault();

if ($('input').hasClass('error')) {
    return false;
  } else {

    const updateEmployeesZipcodeChecked = updateEmployeesZipcode.val();
    const updateEmployeesZipcodePasswordChecked = updateEmployeesZipcodePassword.val();
    const submit = $('#update_employees_zipcode_btn').val();

    $.ajax({
      type: 'post',
      url: './includes/update_employees_zipcode.inc.php',
      enctype: 'multipart/form-data',
      data: {
        'update_employees_zipcode': updateEmployeesZipcodeChecked,
        'update_employees_zipcode_password': updateEmployeesZipcodePasswordChecked,
        'update_employees_zipcode_btn': submit
      },
      success: function (response) {
        console.log(response);
        if (response) {
          console.log(response);
          document.location.reload(true);
          //document.location.href = './employees_profile';
        } else {
         
         console.log(response);
        } 
      }
    });
  }

});
updateEmployeesZipcodePassword.focusout(() => {

if (updateEmployeesZipcodePassword.val() !== '') {
  updateEmployeesZipcodePassword.removeClass('error');
  updateEmployeesZipcodePassword.addClass('valid'); 
  updateEmployeesZipcodePasswordMsg.text('');

  if (updateEmployeesZipcodePassword.val().length < 8) {
    updateEmployeesZipcodePassword.addClass('error');
    updateEmployeesZipcodePassword.removeClass('valid');
    updateEmployeesZipcodePasswordMsg.text('Password should be min 8 characters!');
  } else if (!regPassword.test(updateEmployeesZipcodePassword.val())) {
    updateEmployeesZipcodePassword.addClass('error');
    updateEmployeesZipcodePassword.removeClass('valid');
    updateEmployeesZipcodePasswordMsg.text('New Password should contain at least one digit,one capital letter,one small letter,one special characters and min 8 characters!!');
  } else {
    updateEmployeesZipcodePasswordChecked = updateEmployeesZipcodePassword.val();
   

    
$.ajax({
  type: 'post',
  url: './includes/update_employees_zipcode.inc.php',
  data: {
    'updateEmployeesZipcodePasswordChecked': updateEmployeesZipcodePasswordChecked
  },  success: function (response) {
    console.log(response);
     if (response == false) {
      updateEmployeesZipcodePassword.removeClass('error');
      updateEmployeesZipcodePassword.addClass('valid');
      updateEmployeesZipcodePasswordMsg.text('');
    } else {
      updateEmployeesZipcodePassword.removeClass('valid');
      updateEmployeesZipcodePassword.addClass('error');
      updateEmployeesZipcodePasswordMsg.text(response);
  }

  }
  })

    
  }
} else {
  updateEmployeesZipcodePassword.addClass('error');
  updateEmployeesZipcodePassword.removeClass('valid');
  updateEmployeesZipcodePasswordMsg.text('Password is required!');
}

});

})  
/* Updatw zipcode end */
/* Updatw country start */
$(document).ready(() =>{


const updateEmployeesCountry = $('#update_employees_country');
const updateEmployeesCountryMsg = $('.update_employees_country-error');

const updateEmployeesCountryPassword = $('#update_employees_country_password');
const updateEmployeesCountryPasswordMsg = $('.update_employees_country_password-error');
const regPassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/;
$("#update_employees_country_form").submit((e) => {   
e.preventDefault();

if ($('input').hasClass('error')) {
    return false;
  } else {

    const updateEmployeesCountryChecked = updateEmployeesCountry.val();
    const  updateEmployeesCountryPasswordChecked =  updateEmployeesCountryPassword.val();
    const submit = $('#update_employees_country_btn').val();

    $.ajax({
      type: 'post',
      url: './includes/update_employees_country.inc.php',
      enctype: 'multipart/form-data',
      data: {
        'update_employees_country': updateEmployeesCountryChecked,
        'update_employees_country_password':  updateEmployeesCountryPasswordChecked,
        'update_employees_country_btn': submit
      },
      success: function (response) {
        console.log(response);
        if (response) {
          console.log(response);
          document.location.reload(true);
          //document.location.href = './employees_profile';
        } else {
         
         console.log(response);
        } 
      }
    });
  }

});
 updateEmployeesCountryPassword.focusout(() => {

if ( updateEmployeesCountryPassword.val() !== '') {
   updateEmployeesCountryPassword.removeClass('error');
   updateEmployeesCountryPassword.addClass('valid'); 
   updateEmployeesCountryPasswordMsg.text('');

  if ( updateEmployeesCountryPassword.val().length < 8) {
     updateEmployeesCountryPassword.addClass('error');
     updateEmployeesCountryPassword.removeClass('valid');
     updateEmployeesCountryPasswordMsg.text('Password should be min 8 characters!');
  } else if (!regPassword.test( updateEmployeesCountryPassword.val())) {
     updateEmployeesCountryPassword.addClass('error');
     updateEmployeesCountryPassword.removeClass('valid');
     updateEmployeesCountryPasswordMsg.text('New Password should contain at least one digit,one capital letter,one small letter,one special characters and min 8 characters!!');
  } else {
     updateEmployeesCountryPasswordChecked =  updateEmployeesCountryPassword.val();
   

    
$.ajax({
  type: 'post',
  url: './includes/update_employees_country.inc.php',
  data: {
    ' updateEmployeesCountryPasswordChecked':  updateEmployeesCountryPasswordChecked
  },  success: function (response) {
    console.log(response);
     if (response == false) {
       updateEmployeesCountryPassword.removeClass('error');
       updateEmployeesCountryPassword.addClass('valid');
       updateEmployeesCountryPasswordMsg.text('');
    } else {
       updateEmployeesCountryPassword.removeClass('valid');
       updateEmployeesCountryPassword.addClass('error');
       updateEmployeesCountryPasswordMsg.text(response);
  }

  }
  })

    
  }
} else {
   updateEmployeesCountryPassword.addClass('error');
   updateEmployeesCountryPassword.removeClass('valid');
   updateEmployeesCountryPasswordMsg.text('Password is required!');
}

});

})  
/* Updatw country end */
/* Updat fullname start */
$(document).ready(() =>{


const updateEmployeesFullname = $('#update_employees_fullname');
const updateEmployeesFullnameMsg = $('.update_employees_fullname-error');

const updateEmployeesFullnamePassword = $('#update_employees_fullname_password');
const updateEmployeesFullnamePasswordMsg = $('.update_employees_fullname_password-error');
const regPassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/;
const regfullname = /^[a-zA-Z ]+$/;
$("#update_employees_fullname_form").submit((e) => {   
e.preventDefault();

if ($('input').hasClass('error')) {
    return false;
  } else {

    const updateEmployeesFullnameChecked = updateEmployeesFullname.val();
    const updateEmployeesFullnamePasswordChecked = updateEmployeesFullnamePassword.val();
    const submit = $('#update_employees_fullname_btn').val();

    $.ajax({
      type: 'post',
      url: './includes/update_employees_fullname.inc.php',
      enctype: 'multipart/form-data',
      data: {
        'update_employees_fullname': updateEmployeesFullnameChecked,
        'update_employees_fullname_password': updateEmployeesFullnamePasswordChecked,
        'update_employees_fullname_btn': submit
      },
      success: function (response) {
        console.log(response);
        if (response) {
          console.log(response);
          document.location.reload(true);
          //document.location.href = './employees_profile';
        } else {
         
         console.log(response);
        } 
      }
    });
  }

});
updateEmployeesFullnamePassword.focusout(() => {

if (updateEmployeesFullnamePassword.val() !== '') {
  updateEmployeesFullnamePassword.removeClass('error');
  updateEmployeesFullnamePassword.addClass('valid'); 
  updateEmployeesFullnamePasswordMsg.text('');

  if (updateEmployeesFullnamePassword.val().length < 8) {
    updateEmployeesFullnamePassword.addClass('error');
    updateEmployeesFullnamePassword.removeClass('valid');
    updateEmployeesFullnamePasswordMsg.text('Password should be min 8 characters!');
  } else if (!regPassword.test(updateEmployeesFullnamePassword.val())) {
    updateEmployeesFullnamePassword.addClass('error');
    updateEmployeesFullnamePassword.removeClass('valid');
    updateEmployeesFullnamePasswordMsg.text('New Password should contain at least one digit,one capital letter,one small letter,one special characters and min 8 characters!!');
  } else {
    updateEmployeesFullnamePasswordChecked = updateEmployeesFullnamePassword.val();
   

    
$.ajax({
  type: 'post',
  url: './includes/update_employees_fullname.inc.php',
  data: {
    'updateEmployeesFullnamePasswordChecked': updateEmployeesFullnamePasswordChecked
  },  success: function (response) {
    console.log(response);
     if (response == false) {
      updateEmployeesFullnamePassword.removeClass('error');
      updateEmployeesFullnamePassword.addClass('valid');
      updateEmployeesFullnamePasswordMsg.text('');
    } else {
      updateEmployeesFullnamePassword.removeClass('valid');
      updateEmployeesFullnamePassword.addClass('error');
      updateEmployeesFullnamePasswordMsg.text(response);
  }

  }
  })

    
  }
} else {
  updateEmployeesFullnamePassword.addClass('error');
  updateEmployeesFullnamePassword.removeClass('valid');
  updateEmployeesFullnamePasswordMsg.text('Password is required!');
}

});
updateEmployeesFullname.focusout(() => {


if (updateEmployeesFullname.val() == '' && updateEmployeesFullname.val().length < 3) {
  updateEmployeesFullnameMsg.text('User name is required!');
  updateEmployeesFullname.removeClass('valid');
  updateEmployeesFullname.addClass('error');
}else if (!regfullname.test(updateEmployeesFullname.val())) {
  updateEmployeesFullname.removeClass('valid');
  updateEmployeesFullname.addClass('error');
  updateEmployeesFullnameMsg.text('Enter valid username!');
}else if (updateEmployeesFullname.val().length >= 5) {

  updateEmpolyeesName = updateEmployeesFullname.val();
  $.ajax({
    type: 'post',
    url: './includes/update_employees_fullname.inc.php',
    data: {
      'updateEmpolyeesName': updateEmpolyeesName
    },
    success: function (response) {
      console.log(response);
      if (response = true) {
       
        updateEmployeesFullname.removeClass('error');
        updateEmployeesFullname.addClass('valid');
        updateEmployeesFullnameMsg.text('');
      }else {
       
        updateEmployeesFullname.removeClass('valid');
        updateEmployeesFullname.addClass('error');
        updateEmployeesFullnameMsg.text(response);
      } 
    }
  });
} else {
  updateEmployeesFullname.removeClass('error');
  updateEmployeesFullname.addClass('valid');
  updateEmployeesFullnameMsg.text('');
}
});

})  
/* Updatw fullname end */
/* Updatw email start */
$(document).ready(() =>{


const updateEmployeesEmail = $('#update_employees_email');
const updateEmployeesEmailMsg = $('.update_employees_email-error');

const updateEmployeesEmailPassword = $('#update_employees_email_password');
const updateEmployeesEmailPasswordMsg = $('.update_employees_email_password-error');
const regEmail = /^[a-z]+[0-9a-zA-Z_\.]*@[a-z_]+\.[a-z]+$/;
const regPassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/;
$("#update_employees_email_form").submit((e) => {   
e.preventDefault();

if ($('input').hasClass('error')) {
    return false;
  } else {

    const updateEmployeesEmailChecked = updateEmployeesEmail.val();
    const updateEmployeesEmailPasswordChecked = updateEmployeesEmailPassword.val();
    const submit = $('#update_employees_email_btn').val();

    $.ajax({
      type: 'post',
      url: './includes/update_employees_email.inc.php',
      enctype: 'multipart/form-data',
      data: {
        'update_employees_email': updateEmployeesEmailChecked,
        'update_employees_email_password': updateEmployeesEmailPasswordChecked,
        'update_employees_email_btn': submit
      },
      success: function (response) {
        console.log(response);
        if (response) {
          console.log(response);
          document.location.reload(true);
          //document.location.href = './employees_profile';
        } else {
         
         console.log(response);
        } 
      }
    });
  }

});
updateEmployeesEmailPassword.focusout(() => {

if (updateEmployeesEmailPassword.val() !== '') {
  updateEmployeesEmailPassword.removeClass('error');
  updateEmployeesEmailPassword.addClass('valid'); 
  updateEmployeesEmailPasswordMsg.text('');

  if (updateEmployeesEmailPassword.val().length < 8) {
    updateEmployeesEmailPassword.addClass('error');
    updateEmployeesEmailPassword.removeClass('valid');
    updateEmployeesEmailPasswordMsg.text('Password should be min 8 characters!');
  } else if (!regPassword.test(updateEmployeesEmailPassword.val())) {
    updateEmployeesEmailPassword.addClass('error');
    updateEmployeesEmailPassword.removeClass('valid');
    updateEmployeesEmailPasswordMsg.text('New Password should contain at least one digit,one capital letter,one small letter,one special characters and min 8 characters!!');
  } else {
    updateEmployeesEmailPasswordChecked = updateEmployeesEmailPassword.val();
   

    
$.ajax({
  type: 'post',
  url: './includes/update_employees_email.inc.php',
  data: {
    'updateEmployeesEmailPasswordChecked': updateEmployeesEmailPasswordChecked
  },  success: function (response) {
    console.log(response);
     if (response == false) {
      updateEmployeesEmailPassword.removeClass('error');
      updateEmployeesEmailPassword.addClass('valid');
      updateEmployeesEmailPasswordMsg.text('');
    } else {
      updateEmployeesEmailPassword.removeClass('valid');
      updateEmployeesEmailPassword.addClass('error');
      updateEmployeesEmailPasswordMsg.text(response);
  }

  }
  })

    
  }
} else {
  updateEmployeesEmailPassword.addClass('error');
  updateEmployeesEmailPassword.removeClass('valid');
  updateEmployeesEmailPasswordMsg.text('Password is required!');
}

});
updateEmployeesEmail.focusout(() => {


if (updateEmployeesEmail.val() == '') {
  updateEmployeesEmailMsg.text('email is required!');
  updateEmployeesEmail.removeClass('valid');
  updateEmployeesEmail.removeClass('error');
}else if (!regEmail.test(updateEmployeesEmail.val())) {
  updateEmployeesEmail.removeClass('valid');
  updateEmployeesEmail.addClass('error');
  updateEmployeesEmailMsg.text('Enter valid email!');
} else {

  checkupdateEmployeesEmail = updateEmployeesEmail.val();
  $.ajax({
    type: 'post',
    url: './includes/update_employees_email.inc.php',
    data: {
      'checkupdateEmployeesEmail': checkupdateEmployeesEmail
    },
    success: function (response) {
    
      console.log(response);

       if (response == false) {
        updateEmployeesEmail.addClass('valid');
        updateEmployeesEmail.removeClass('error');
        updateEmployeesEmailMsg.text('');
      } else {
        updateEmployeesEmail.addClass('error');
        updateEmployeesEmail.removeClass('valid');
        updateEmployeesEmailMsg.text(response);
    }

    }
    })
}
});

})  
/* Update email end */
/* Update password start */
$(document).ready(() =>{


const oldEmployeesPassword = $('#old_employees_password');
const oldEmployeesPasswordMsg = $('.old_employees_password-error');

const updateEmployeesPassword = $('#update_employees_password');
const updateEmployeesPasswordMsg = $('.update_employees_password-error');

const reEmployeesPassword = $('#re_new_employees_password');
const reEmployeesPasswordMsg = $('.re_new_employees_password-error');

const regPassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/;

$("#update_employees_password_form").submit((e) => {   
e.preventDefault();

if ($('input').hasClass('error')) {
    return false;
  } else {

    const oldEmployeesPasswordChecked = oldEmployeesPassword.val();
    const updateEmployeesPasswordChecked = updateEmployeesPassword.val();
    const reEmployeesPasswordChecked = reEmployeesPassword.val();

    const submit = $('#update_employees_password_btn').val();
   
    $.ajax({
      type: 'post',
      url: './includes/update_employees_password.inc.php',
      enctype: 'multipart/form-data',
      data: {
        'old_employees_password': oldEmployeesPasswordChecked,
        'update_employees_password': updateEmployeesPasswordChecked,
        'update_employees_password_btn': submit
      },
      success: function (response) {
        console.log(response);
        if (response == false) {
          console.log(response);
          document.location.reload(true);
         //document.location.href = './employees_user';
        } else {
          reEmployeesPassword.addClass('error');
          reEmployeesPassword.removeClass('valid');
          reEmployeesPasswordMsg.text(response);
         console.log(response);
        } 
      }
    });
  }

});
oldEmployeesPassword.focusout(() => {

if (oldEmployeesPassword.val() !== '') {
  oldEmployeesPassword.removeClass('error');
  oldEmployeesPassword.addClass('valid'); 
  oldEmployeesPasswordMsg.text('');

  if (oldEmployeesPassword.val().length < 8) {
    oldEmployeesPassword.addClass('error');
    oldEmployeesPassword.removeClass('valid');
    oldEmployeesPasswordMsg.text('Password should be min 8 characters!');
  } else if (!regPassword.test(oldEmployeesPassword.val())) {
    oldEmployeesPassword.addClass('error');
    oldEmployeesPassword.removeClass('valid');
    oldEmployeesPasswordMsg.text('New Password should contain at least one digit,one capital letter,one small letter,one special characters and min 8 characters!!');
  } else {
    oldEmployeesPasswordChecked = oldEmployeesPassword.val();
   

    
$.ajax({
  type: 'post',
  url: './includes/update_employees_password.inc.php',
  data: {
    'oldEmployeesPasswordChecked': oldEmployeesPasswordChecked
  },  success: function (response) {
   
     if (response == false) {
      console.log(response);
      oldEmployeesPassword.removeClass('error');
      oldEmployeesPassword.addClass('valid');
      oldEmployeesPasswordMsg.text('');
    } else {
      console.log(response);
      oldEmployeesPassword.removeClass('valid');
      oldEmployeesPassword.addClass('error');
      oldEmployeesPasswordMsg.text(response);
  }

  }
  })

    
  }
} else {
  oldEmployeesPassword.addClass('error');
  oldEmployeesPassword.removeClass('valid');
  oldEmployeesPasswordMsg.text('Password is required!');
}

});
updateEmployeesPassword.focusout(() => {

if (updateEmployeesPassword.val() !== '') {
  updateEmployeesPassword.removeClass('error');
  updateEmployeesPassword.addClass('valid'); 
  updateEmployeesPasswordMsg.text('');

  if (updateEmployeesPassword.val().length < 8) {
    updateEmployeesPassword.addClass('error');
    updateEmployeesPassword.removeClass('valid');
    updateEmployeesPasswordMsg.text('Password should be min 8 characters!');
  } else if (!regPassword.test(updateEmployeesPassword.val())) {
    updateEmployeesPassword.addClass('error');
    updateEmployeesPassword.removeClass('valid');
    updateEmployeesPasswordMsg.text('New Password should contain at least one digit,one capital letter,one small letter,one special characters and min 8 characters!!');
  } else {
    updateEmployeesPasswordChecked = updateEmployeesPassword.val();
    reEmployeesPasswordChecked = reEmployeesPassword.val();

    
$.ajax({
  type: 'post',
  url: './includes/update_employees_password.inc.php',
  data: {
    'updateEmployeesPasswordChecked': updateEmployeesPasswordChecked
  },  success: function (response) {
    console.log(response);
     if (response = true) {
      updateEmployeesPassword.removeClass('error');
      updateEmployeesPassword.addClass('valid');
      updateEmployeesPasswordMsg.text('');
    } else {
      updateEmployeesPassword.removeClass('valid');
      updateEmployeesPassword.addClass('error');
      updateEmployeesPasswordMsg.text(response);
  }

  }
  })

    
  }
} else {
  updateEmployeesPassword.addClass('error');
  updateEmployeesPassword.removeClass('valid');
  updateEmployeesPasswordMsg.text('Password is required!');
}

});
reEmployeesPassword.focusout(() => {

if (reEmployeesPassword.val() !== '') {

  if (updateEmployeesPassword.val() == reEmployeesPassword.val()) {
    reEmployeesPassword.removeClass('error');
    reEmployeesPassword.addClass('valid');
    reEmployeesPasswordMsg.text('');
  } else {
    reEmployeesPassword.addClass('error');
    reEmployeesPassword.removeClass('valid');
    reEmployeesPasswordMsg.text('Password and re password should be same!');
  }
} else {
  reEmployeesPassword.addClass('error');
  reEmployeesPassword.removeClass('valid');
  reEmployeesPasswordMsg.text('Re password is required!');
}


});

})  
/* Updatw password end */
/* Delete user start */
$(document).ready(() =>{


const deleteEmployeesEmail = $('#delete_employees_email');
const deleteEmployeesEmailMsg = $('.delete_employees_email-error');

const deleteEmployeesPassword = $('#delete_employees_password');
const deleteEmployeesPasswordMsg = $('.delete_employees_password-error');
const regEmail = /^[a-z]+[0-9a-zA-Z_\.]*@[a-z_]+\.[a-z]+$/;
const regPassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/;
$("#delete_employees_form").submit((e) => {   
e.preventDefault();

if ($('input').hasClass('error')) {
    return false;
  } else {

    const deleteEmployeesEmailChecked = deleteEmployeesEmail.val();
    const deleteEmployeesPasswordChecked = deleteEmployeesPassword.val();
    const submit = $('#delete_employees_btn').val();

    $.ajax({
      type: 'post',
      url: './includes/delete_employees.inc.php',
      enctype: 'multipart/form-data',
      data: {
        'delete_employees_email': deleteEmployeesEmailChecked,
        'delete_employees_password': deleteEmployeesPasswordChecked,
        'delete_employees_btn': submit
      },
      success: function (response) {
       
        if (response) {
          console.log(response);
          alert('Employees profile is delete!');
          document.location.href = './employees_list';
        } else {
         
         console.log(response);
        } 
      }
    });
  }

});
deleteEmployeesPassword.focusout(() => {

if (deleteEmployeesPassword.val() !== '') {
  deleteEmployeesPassword.removeClass('error');
  deleteEmployeesPassword.addClass('valid'); 
  deleteEmployeesPasswordMsg.text('');

  if (deleteEmployeesPassword.val().length < 8) {
    deleteEmployeesPassword.addClass('error');
    deleteEmployeesPassword.removeClass('valid');
    deleteEmployeesPasswordMsg.text('Password should be min 8 characters!');
  } else if (!regPassword.test(deleteEmployeesPassword.val())) {
    deleteEmployeesPassword.addClass('error');
    deleteEmployeesPassword.removeClass('valid');
    deleteEmployeesPasswordMsg.text('Password should contain at least one digit,one capital letter,one small letter,one special characters and min 8 characters!!');
  } else {
    deleteEmployeesPasswordChecked = deleteEmployeesPassword.val();
   

    
$.ajax({
  type: 'post',
  url: './includes/delete_employees.inc.php',
  data: {
    'deleteEmployeesPasswordChecked': deleteEmployeesPasswordChecked
  },  success: function (response) {
    console.log(response);
     if (response == false) {
      deleteEmployeesPassword.removeClass('error');
      deleteEmployeesPassword.addClass('valid');
      deleteEmployeesPasswordMsg.text('');
    } else {
      deleteEmployeesPassword.removeClass('valid');
      deleteEmployeesPassword.addClass('error');
      deleteEmployeesPasswordMsg.text(response);
  }

  }
  })

    
  }
} else {
  deleteEmployeesPassword.addClass('error');
  deleteEmployeesPassword.removeClass('valid');
  deleteEmployeesPasswordMsg.text('Password is required!');
}

});
deleteEmployeesEmail.focusout(() => {


if (deleteEmployeesEmail.val() == '') {
  deleteEmployeesEmailMsg.text('email is required!');
  deleteEmployeesEmail.removeClass('valid');
  deleteEmployeesEmail.removeClass('error');
}else if (!regEmail.test(deleteEmployeesEmail.val())) {
  deleteEmployeesEmail.removeClass('valid');
  deleteEmployeesEmail.addClass('error');
  deleteEmployeesEmailMsg.text('Enter valid email!');
} else {

  checkdeleteEmployeesEmail = deleteEmployeesEmail.val();
  $.ajax({
    type: 'post',
    url: './includes/delete_employees.inc.php',
    data: {
      'checkdeleteEmployeesEmail': checkdeleteEmployeesEmail
    },
    success: function (response) {
    
      console.log(response);

       if (response == false) {
        deleteEmployeesEmail.addClass('valid');
        deleteEmployeesEmail.removeClass('error');
        deleteEmployeesEmailMsg.text('');
      } else {
        deleteEmployeesEmail.addClass('error');
        deleteEmployeesEmail.removeClass('valid');
        deleteEmployeesEmailMsg.text(response);
    }

    }
    })
}
});

})  
/* Delete user end */
/* Updatw conctration type start */
$(document).ready(() =>{


  const updateContractType = $('#update_contract_type');
  const updateContractTypeMsg = $('.update_contract_type-error');
  
  const updateContractTypePassword = $('#update_contract_type_password');
  const updateContractTypePasswordMsg = $('.update_contract_type_password-error');
  const regPassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/;
  $("#update_contract_type_form").submit((e) => {   
  e.preventDefault();
  
  if ($('input').hasClass('error')) {
      return false;
    } else {
  
      const updateContractTypeChecked = updateContractType.val();
      const updateContractTypePasswordChecked = updateContractTypePassword.val();
      const submit = $('#update_contract_type_btn').val();
  
      $.ajax({
        type: 'post',
        url: './includes/update_contract_type.inc.php',
        enctype: 'multipart/form-data',
        data: {
          'update_contract_type':updateContractTypeChecked,
          'update_contract_type_password':updateContractTypePasswordChecked,
          'update_contract_type_btn': submit
        },
        success: function (response) {
          console.log(response);
          if (response) {
            console.log(response);
            document.location.reload(true);
            //document.location.href = './employees_profile';
          } else {
           
           console.log(response);
          } 
        }
      });
    }
  
  });
 updateContractTypePassword.focusout(() => {
  
  if (updateContractTypePassword.val() !== '') {
   updateContractTypePassword.removeClass('error');
   updateContractTypePassword.addClass('valid'); 
   updateContractTypePasswordMsg.text('');
  
    if (updateContractTypePassword.val().length < 8) {
     updateContractTypePassword.addClass('error');
     updateContractTypePassword.removeClass('valid');
     updateContractTypePasswordMsg.text('Password should be min 8 characters!');
    } else if (!regPassword.test(updateContractTypePassword.val())) {
     updateContractTypePassword.addClass('error');
     updateContractTypePassword.removeClass('valid');
     updateContractTypePasswordMsg.text('New Password should contain at least one digit,one capital letter,one small letter,one special characters and min 8 characters!!');
    } else {
     updateContractTypePasswordChecked =updateContractTypePassword.val();
     
  
      
  $.ajax({
    type: 'post',
    url: './includes/update_contract_type.inc.php',
    data: {
      'updateContractTypePasswordChecked':updateContractTypePasswordChecked
    },  success: function (response) {
      console.log(response);
       if (response == false) {
       updateContractTypePassword.removeClass('error');
       updateContractTypePassword.addClass('valid');
       updateContractTypePasswordMsg.text('');
      } else {
       updateContractTypePassword.removeClass('valid');
       updateContractTypePassword.addClass('error');
       updateContractTypePasswordMsg.text(response);
    }
  
    }
    })
  
      
    }
  } else {
   updateContractTypePassword.addClass('error');
   updateContractTypePassword.removeClass('valid');
   updateContractTypePasswordMsg.text('Password is required!');
  }
  
  });
  
  })  
  /* Update contract type end */
  /* Updatw contract start start */
  $(document).ready(() =>{


    const updateContractStart = $('#update_contract_start');
    const updateContractStartMsg = $('.update_contract_start-error');
    
    const updateContractStartPassword = $('#update_contract_start_password');
    const updateContractStartPasswordMsg = $('.update_contract_start_password-error');
    const regPassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/;
    $("#update_contract_start_form").submit((e) => {   
    e.preventDefault();
    
    if ($('input').hasClass('error')) {
        return false;
      } else {
    
        const updateContractStartChecked = updateContractStart.val();
        const updateContractStartPasswordChecked = updateContractStartPassword.val();
        const submit = $('#update_contract_start_btn').val();
    
        $.ajax({
          type: 'post',
          url: './includes/update_contract_start.inc.php',
          enctype: 'multipart/form-data',
          data: {
            'update_contract_start':updateContractStartChecked,
            'update_contract_start_password':updateContractStartPasswordChecked,
            'update_contract_start_btn': submit
          },
          success: function (response) {
            console.log(response);
            if (response) {
              console.log(response);
              document.location.reload(true);
              //document.location.href = './employees_profile';
            } else {
             
             console.log(response);
            } 
          }
        });
      }
    
    });
   updateContractStartPassword.focusout(() => {
    
    if (updateContractStartPassword.val() !== '') {
     updateContractStartPassword.removeClass('error');
     updateContractStartPassword.addClass('valid'); 
     updateContractStartPasswordMsg.text('');
    
      if (updateContractStartPassword.val().length < 8) {
       updateContractStartPassword.addClass('error');
       updateContractStartPassword.removeClass('valid');
       updateContractStartPasswordMsg.text('Password should be min 8 characters!');
      } else if (!regPassword.test(updateContractStartPassword.val())) {
       updateContractStartPassword.addClass('error');
       updateContractStartPassword.removeClass('valid');
       updateContractStartPasswordMsg.text('New Password should contain at least one digit,one capital letter,one small letter,one special characters and min 8 characters!!');
      } else {
       updateContractStartPasswordChecked =updateContractStartPassword.val();
       
    
        
    $.ajax({
      type: 'post',
      url: './includes/update_contract_start.inc.php',
      data: {
        'updateContractStartPasswordChecked':updateContractStartPasswordChecked
      },  success: function (response) {
        console.log(response);
         if (response == false) {
         updateContractStartPassword.removeClass('error');
         updateContractStartPassword.addClass('valid');
         updateContractStartPasswordMsg.text('');
        } else {
         updateContractStartPassword.removeClass('valid');
         updateContractStartPassword.addClass('error');
         updateContractStartPasswordMsg.text(response);
      }
    
      }
      })
    
        
      }
    } else {
     updateContractStartPassword.addClass('error');
     updateContractStartPassword.removeClass('valid');
     updateContractStartPasswordMsg.text('Password is required!');
    }
    
    });
    
    })  
  /* Update contract start end */
    /* Updatw contract end start */
    $(document).ready(() =>{


      const updateContractEnd = $('#update_contract_end');
      const updateContractEndMsg = $('.update_contract_end-error');
      
      const updateContractEndPassword = $('#update_contract_end_password');
      const updateContractEndPasswordMsg = $('.update_contract_end_password-error');
      const regPassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/;
      $("#update_contract_end_form").submit((e) => {   
      e.preventDefault();
      
      if ($('input').hasClass('error')) {
          return false;
        } else {
      
          const updateContractEndChecked = updateContractEnd.val();
          const updateContractEndPasswordChecked = updateContractEndPassword.val();
          const submit = $('#update_contract_end_btn').val();
      
          $.ajax({
            type: 'post',
            url: './includes/update_contract_end.inc.php',
            enctype: 'multipart/form-data',
            data: {
              'update_contract_end':updateContractEndChecked,
              'update_contract_end_password':updateContractEndPasswordChecked,
              'update_contract_end_btn': submit
            },
            success: function (response) {
              console.log(response);
              if (response) {
                console.log(response);
                document.location.reload(true);
                //document.location.href = './employees_profile';
              } else {
               
               console.log(response);
              } 
            }
          });
        }
      
      });
     updateContractEndPassword.focusout(() => {
      
      if (updateContractEndPassword.val() !== '') {
       updateContractEndPassword.removeClass('error');
       updateContractEndPassword.addClass('valid'); 
       updateContractEndPasswordMsg.text('');
      
        if (updateContractEndPassword.val().length < 8) {
         updateContractEndPassword.addClass('error');
         updateContractEndPassword.removeClass('valid');
         updateContractEndPasswordMsg.text('Password should be min 8 characters!');
        } else if (!regPassword.test(updateContractEndPassword.val())) {
         updateContractEndPassword.addClass('error');
         updateContractEndPassword.removeClass('valid');
         updateContractEndPasswordMsg.text('New Password should contain at least one digit,one capital letter,one small letter,one special characters and min 8 characters!!');
        } else {
         updateContractEndPasswordChecked =updateContractEndPassword.val();
         
      
          
      $.ajax({
        type: 'post',
        url: './includes/update_contract_end.inc.php',
        data: {
          'updateContractEndPasswordChecked':updateContractEndPasswordChecked
        },  success: function (response) {
          console.log(response);
           if (response == false) {
           updateContractEndPassword.removeClass('error');
           updateContractEndPassword.addClass('valid');
           updateContractEndPasswordMsg.text('');
          } else {
           updateContractEndPassword.removeClass('valid');
           updateContractEndPassword.addClass('error');
           updateContractEndPasswordMsg.text(response);
        }
      
        }
        })
      
          
        }
      } else {
       updateContractEndPassword.addClass('error');
       updateContractEndPassword.removeClass('valid');
       updateContractEndPasswordMsg.text('Password is required!');
      }
      
      });
      
      })  
    /* Update contract end end */
     /* Updatw posision start */
     $(document).ready(() =>{


      const updateEmployeesPosision = $('#update_employees_posision');
      const updateEmployeesPosisionMsg = $('.update_employees_posision-error');
      
      const updateEmployeesPosisionPassword = $('#update_employees_posision_password');
      const updateEmployeesPosisionPasswordMsg = $('.update_employees_posision_password-error');
      const regPassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/;
      $("#update_employees_posision_form").submit((e) => {   
      e.preventDefault();
      
      if ($('input').hasClass('error')) {
          return false;
        } else {
      
          const updateEmployeesPosisionChecked = updateEmployeesPosision.val();
          const updateEmployeesPosisionPasswordChecked = updateEmployeesPosisionPassword.val();
          const submit = $('#update_employees_posision_btn').val();
      
          $.ajax({
            type: 'post',
            url: './includes/update_posision.inc.php',
            enctype: 'multipart/form-data',
            data: {
              'update_employees_posision':updateEmployeesPosisionChecked,
              'update_employees_posision_password':updateEmployeesPosisionPasswordChecked,
              'update_employees_posision_btn': submit
            },
            success: function (response) {
              console.log(response);
              if (response) {
                console.log(response);
                document.location.reload(true);
                //document.location.href = './employees_profile';
              } else {
               
               console.log(response);
              } 
            }
          });
        }
      
      });
     updateEmployeesPosisionPassword.focusout(() => {
      
      if (updateEmployeesPosisionPassword.val() !== '') {
       updateEmployeesPosisionPassword.removeClass('error');
       updateEmployeesPosisionPassword.addClass('valid'); 
       updateEmployeesPosisionPasswordMsg.text('');
      
        if (updateEmployeesPosisionPassword.val().length < 8) {
         updateEmployeesPosisionPassword.addClass('error');
         updateEmployeesPosisionPassword.removeClass('valid');
         updateEmployeesPosisionPasswordMsg.text('Password should be min 8 characters!');
        } else if (!regPassword.test(updateEmployeesPosisionPassword.val())) {
         updateEmployeesPosisionPassword.addClass('error');
         updateEmployeesPosisionPassword.removeClass('valid');
         updateEmployeesPosisionPasswordMsg.text('New Password should contain at least one digit,one capital letter,one small letter,one special characters and min 8 characters!!');
        } else {
         updateEmployeesPosisionPasswordChecked =updateEmployeesPosisionPassword.val();
         
      
          
      $.ajax({
        type: 'post',
        url: './includes/update_posision.inc.php',
        data: {
          'updateEmployeesPosisionPasswordChecked':updateEmployeesPosisionPasswordChecked
        },  success: function (response) {
          console.log(response);
           if (response == false) {
           updateEmployeesPosisionPassword.removeClass('error');
           updateEmployeesPosisionPassword.addClass('valid');
           updateEmployeesPosisionPasswordMsg.text('');
          } else {
           updateEmployeesPosisionPassword.removeClass('valid');
           updateEmployeesPosisionPassword.addClass('error');
           updateEmployeesPosisionPasswordMsg.text(response);
        }
      
        }
        })
      
          
        }
      } else {
       updateEmployeesPosisionPassword.addClass('error');
       updateEmployeesPosisionPassword.removeClass('valid');
       updateEmployeesPosisionPasswordMsg.text('Password is required!');
      }
      
      });
      
      })  
    /* Update posision end */
 