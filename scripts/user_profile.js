 $(document).ready(() =>{

    const idNumber = $('#id_number');
    const idNumberMsg = $('.id_number-error');

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

        const idNumberChecked = idNumber.val();
        const phoneChecked = phone.val();
        const addressChecked = address.val();
        const cityChecked = city.val();
        const zipcodeChecked = zipcode.val();
        const countryChecked = country.val();
        const submit = $('#insert_bio').val();
  
        $.ajax({
          type: 'post',
          url: './includes/user_bio.inc.php',
          enctype: 'multipart/form-data',
          data: {
            'id_number': idNumberChecked,
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
              document.location.href = './user_profile'
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
    $("#profile_img_form").submit(function (e) {   
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
            type: 'POST',
            url: './includes/update_profile_img.inc.php',
            enctype: 'multipart/form-data',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
               
                if (response) {
                  console.log(response);
                  document.location.href = './user_profile';
                } else {
                 
                 console.log(response);
                } 
              }
        }
    );
  });
});  
/* Update img end */
/* Update phone start */
$(document).ready(() =>{


  const updatephone = $('#update_phone');
  const updatephoneMsg = $('.update_phone-error');

  const phonepassword = $('#phone_password');
  const phonepasswordMsg = $('.phone_password-error');
  const regPassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/;
  $("#update_phone_form").submit((e) => {   
  e.preventDefault();

  if ($('input').hasClass('error')) {
      return false;
    } else {

      const updatephoneChecked = updatephone.val();
      const phonepasswordChecked = phonepassword.val();
      const submit = $('#update_phone_btn').val();

      $.ajax({
        type: 'post',
        url: './includes/update_phone.inc.php',
        enctype: 'multipart/form-data',
        data: {
          'update_phone': updatephoneChecked,
          'phone_password': phonepasswordChecked,
          'update_phone_btn': submit
        },
        success: function (response) {
          console.log(response);
          if (response) {
            console.log(response);
            document.location.href = './user_profile';
          } else {
           
           console.log(response);
          } 
        }
      });
    }
 
});
phonepassword.focusout(() => {

  if (phonepassword.val() !== '') {
    phonepassword.removeClass('error');
    phonepassword.addClass('valid'); 
    phonepasswordMsg.text('');

    if (phonepassword.val().length < 8) {
      phonepassword.addClass('error');
      phonepassword.removeClass('valid');
      phonepasswordMsg.text('Password should be min 8 characters!');
    } else if (!regPassword.test(phonepassword.val())) {
      phonepassword.addClass('error');
      phonepassword.removeClass('valid');
      phonepasswordMsg.text('New Password should contain at least one digit,one capital letter,one small letter,one special characters and min 8 characters!!');
    } else {
      phonepasswordChecked = phonepassword.val();
     

      
  $.ajax({
    type: 'post',
    url: './includes/update_phone.inc.php',
    data: {
      'phonepasswordChecked': phonepasswordChecked
    },  success: function (response) {
      console.log(response);
       if (response == false) {
        phonepassword.removeClass('error');
        phonepassword.addClass('valid');
        phonepasswordMsg.text('');
      } else {
        phonepassword.removeClass('valid');
        phonepassword.addClass('error');
        phonepasswordMsg.text(response);
    }

    }
    })

      
    }
  } else {
    phonepassword.addClass('error');
    phonepassword.removeClass('valid');
    phonepasswordMsg.text('Password is required!');
  }

});

})  
/* Update phone end */
 
 
/* Update address start */
$(document).ready(() =>{


  const updateaddress = $('#update_address');
  const updateaddressMsg = $('.update_address-error');

  const addresspassword = $('#address_password');
  const addresspasswordMsg = $('.address_password-error');
  const regPassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/;
  $("#update_address_form").submit((e) => {   
  e.preventDefault();

  if ($('input').hasClass('error')) {
      return false;
    } else {

      const updateaddressChecked = updateaddress.val();
      const addresspasswordChecked = addresspassword.val();
      const submit = $('#update_address_btn').val();

      $.ajax({
        type: 'post',
        url: './includes/update_address.inc.php',
        enctype: 'multipart/form-data',
        data: {
          'update_address': updateaddressChecked,
          'address_password': addresspasswordChecked,
          'update_address_btn': submit
        },
        success: function (response) {
          console.log(response);
          if (response) {
            console.log(response);
            document.location.href = './user_profile';
          } else {
           
           console.log(response);
          } 
        }
      });
    }
 
});
addresspassword.focusout(() => {

  if (addresspassword.val() !== '') {
    addresspassword.removeClass('error');
    addresspassword.addClass('valid'); 
    addresspasswordMsg.text('');

    if (addresspassword.val().length < 8) {
      addresspassword.addClass('error');
      addresspassword.removeClass('valid');
      addresspasswordMsg.text('Password should be min 8 characters!');
    } else if (!regPassword.test(addresspassword.val())) {
      addresspassword.addClass('error');
      addresspassword.removeClass('valid');
      addresspasswordMsg.text('New Password should contain at least one digit,one capital letter,one small letter,one special characters and min 8 characters!!');
    } else {
      addresspasswordChecked = addresspassword.val();
     

      
  $.ajax({
    type: 'post',
    url: './includes/update_address.inc.php',
    data: {
      'addresspasswordChecked': addresspasswordChecked
    },  success: function (response) {
      console.log(response);
       if (response == false) {
        addresspassword.removeClass('error');
        addresspassword.addClass('valid');
        addresspasswordMsg.text('');
      } else {
        addresspassword.removeClass('valid');
        addresspassword.addClass('error');
        addresspasswordMsg.text(response);
    }

    }
    })

      
    }
  } else {
    addresspassword.addClass('error');
    addresspassword.removeClass('valid');
    addresspasswordMsg.text('Password is required!');
  }

});

})  
/* Update address end */
/* Update city start */
$(document).ready(() =>{


  const updatecity = $('#update_city');
  const updatecityMsg = $('.update_city-error');

  const citypassword = $('#city_password');
  const citypasswordMsg = $('.city_password-error');
  const regPassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/;
  $("#update_city_form").submit((e) => {   
  e.preventDefault();

  if ($('input').hasClass('error')) {
      return false;
    } else {

      const updatecityChecked = updatecity.val();
      const citypasswordChecked = citypassword.val();
      const submit = $('#update_city_btn').val();

      $.ajax({
        type: 'post',
        url: './includes/update_city.inc.php',
        enctype: 'multipart/form-data',
        data: {
          'update_city': updatecityChecked,
          'city_password': citypasswordChecked,
          'update_city_btn': submit
        },
        success: function (response) {
          console.log(response);
          if (response) {
            console.log(response);
            document.location.href = './user_profile';
          } else {
           
           console.log(response);
          } 
        }
      });
    }
 
});
citypassword.focusout(() => {

  if (citypassword.val() !== '') {
    citypassword.removeClass('error');
    citypassword.addClass('valid'); 
    citypasswordMsg.text('');

    if (citypassword.val().length < 8) {
      citypassword.addClass('error');
      citypassword.removeClass('valid');
      citypasswordMsg.text('Password should be min 8 characters!');
    } else if (!regPassword.test(citypassword.val())) {
      citypassword.addClass('error');
      citypassword.removeClass('valid');
      citypasswordMsg.text('New Password should contain at least one digit,one capital letter,one small letter,one special characters and min 8 characters!!');
    } else {
      citypasswordChecked = citypassword.val();
     

      
  $.ajax({
    type: 'post',
    url: './includes/update_city.inc.php',
    data: {
      'citypasswordChecked': citypasswordChecked
    },  success: function (response) {
      console.log(response);
       if (response == false) {
        citypassword.removeClass('error');
        citypassword.addClass('valid');
        citypasswordMsg.text('');
      } else {
        citypassword.removeClass('valid');
        citypassword.addClass('error');
        citypasswordMsg.text(response);
    }

    }
    })

      
    }
  } else {
    citypassword.addClass('error');
    citypassword.removeClass('valid');
    citypasswordMsg.text('Password is required!');
  }

});

})  
/* Update city end */
/* Update zipcode start */
$(document).ready(() =>{


  const updatezipcode = $('#update_zipcode');
  const updatezipcodeMsg = $('.update_zipcode-error');

  const zipcodepassword = $('#zipcode_password');
  const zipcodepasswordMsg = $('.zipcode_password-error');
  const regPassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/;
  $("#update_zipcode_form").submit((e) => {   
  e.preventDefault();

  if ($('input').hasClass('error')) {
      return false;
    } else {

      const updatezipcodeChecked = updatezipcode.val();
      const zipcodepasswordChecked = zipcodepassword.val();
      const submit = $('#update_zipcode_btn').val();

      $.ajax({
        type: 'post',
        url: './includes/update_zipcode.inc.php',
        enctype: 'multipart/form-data',
        data: {
          'update_zipcode': updatezipcodeChecked,
          'zipcode_password': zipcodepasswordChecked,
          'update_zipcode_btn': submit
        },
        success: function (response) {
          console.log(response);
          if (response) {
            console.log(response);
            document.location.href = './user_profile';
          } else {
           
           console.log(response);
          } 
        }
      });
    }
 
});
zipcodepassword.focusout(() => {

  if (zipcodepassword.val() !== '') {
    zipcodepassword.removeClass('error');
    zipcodepassword.addClass('valid'); 
    zipcodepasswordMsg.text('');

    if (zipcodepassword.val().length < 8) {
      zipcodepassword.addClass('error');
      zipcodepassword.removeClass('valid');
      zipcodepasswordMsg.text('Password should be min 8 characters!');
    } else if (!regPassword.test(zipcodepassword.val())) {
      zipcodepassword.addClass('error');
      zipcodepassword.removeClass('valid');
      zipcodepasswordMsg.text('New Password should contain at least one digit,one capital letter,one small letter,one special characters and min 8 characters!!');
    } else {
      zipcodepasswordChecked = zipcodepassword.val();
     

      
  $.ajax({
    type: 'post',
    url: './includes/update_zipcode.inc.php',
    data: {
      'zipcodepasswordChecked': zipcodepasswordChecked
    },  success: function (response) {
      console.log(response);
       if (response == false) {
        zipcodepassword.removeClass('error');
        zipcodepassword.addClass('valid');
        zipcodepasswordMsg.text('');
      } else {
        zipcodepassword.removeClass('valid');
        zipcodepassword.addClass('error');
        zipcodepasswordMsg.text(response);
    }

    }
    })

      
    }
  } else {
    zipcodepassword.addClass('error');
    zipcodepassword.removeClass('valid');
    zipcodepasswordMsg.text('Password is required!');
  }

});

})  
/* Update zipcode end */
/* Update country start */
$(document).ready(() =>{


  const updatecountry = $('#update_country');
  const updatecountryMsg = $('.update_country-error');

  const countrypassword = $('#country_password');
  const countrypasswordMsg = $('.country_password-error');
  const regPassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/;
  $("#update_country_form").submit((e) => {   
  e.preventDefault();

  if ($('input').hasClass('error')) {
      return false;
    } else {

      const updatecountryChecked = updatecountry.val();
      const countrypasswordChecked = countrypassword.val();
      const submit = $('#update_country_btn').val();

      $.ajax({
        type: 'post',
        url: './includes/update_country.inc.php',
        enctype: 'multipart/form-data',
        data: {
          'update_country': updatecountryChecked,
          'country_password': countrypasswordChecked,
          'update_country_btn': submit
        },
        success: function (response) {
          console.log(response);
          if (response) {
            console.log(response);
            document.location.href = './user_profile';
          } else {
           
           console.log(response);
          } 
        }
      });
    }
 
});
countrypassword.focusout(() => {

  if (countrypassword.val() !== '') {
    countrypassword.removeClass('error');
    countrypassword.addClass('valid'); 
    countrypasswordMsg.text('');

    if (countrypassword.val().length < 8) {
      countrypassword.addClass('error');
      countrypassword.removeClass('valid');
      countrypasswordMsg.text('Password should be min 8 characters!');
    } else if (!regPassword.test(countrypassword.val())) {
      countrypassword.addClass('error');
      countrypassword.removeClass('valid');
      countrypasswordMsg.text('New Password should contain at least one digit,one capital letter,one small letter,one special characters and min 8 characters!!');
    } else {
      countrypasswordChecked = countrypassword.val();
     

      
  $.ajax({
    type: 'post',
    url: './includes/update_country.inc.php',
    data: {
      'countrypasswordChecked': countrypasswordChecked
    },  success: function (response) {
      console.log(response);
       if (response == false) {
        countrypassword.removeClass('error');
        countrypassword.addClass('valid');
        countrypasswordMsg.text('');
      } else {
        countrypassword.removeClass('valid');
        countrypassword.addClass('error');
        countrypasswordMsg.text(response);
    }

    }
    })

      
    }
  } else {
    countrypassword.addClass('error');
    countrypassword.removeClass('valid');
    countrypasswordMsg.text('Password is required!');
  }

});

})  
/* Update country end */
/* Update fullname start */
$(document).ready(() =>{


  const updatefullname = $('#update_fullname');
  const updatefullnameMsg = $('.update_fullname-error');

  const fullnamepassword = $('#fullname_password');
  const fullnamepasswordMsg = $('.fullname_password-error');
  const regPassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/;
  const regfullname = /^[a-zA-Z ]+$/;
  $("#update_fullname_form").submit((e) => {   
  e.preventDefault();

  if ($('input').hasClass('error')) {
      return false;
    } else {

      const updatefullnameChecked = updatefullname.val();
      const fullnamepasswordChecked = fullnamepassword.val();
      const submit = $('#update_fullname_btn').val();

      $.ajax({
        type: 'post',
        url: './includes/update_fullname.inc.php',
        enctype: 'multipart/form-data',
        data: {
          'update_fullname': updatefullnameChecked,
          'fullname_password': fullnamepasswordChecked,
          'update_fullname_btn': submit
        },
        success: function (response) {
          console.log(response);
          if (response) {
            console.log(response);
            document.location.href = './user_profile';
          } else {
           
           console.log(response);
          } 
        }
      });
    }
 
});
fullnamepassword.focusout(() => {

  if (fullnamepassword.val() !== '') {
    fullnamepassword.removeClass('error');
    fullnamepassword.addClass('valid'); 
    fullnamepasswordMsg.text('');

    if (fullnamepassword.val().length < 8) {
      fullnamepassword.addClass('error');
      fullnamepassword.removeClass('valid');
      fullnamepasswordMsg.text('Password should be min 8 characters!');
    } else if (!regPassword.test(fullnamepassword.val())) {
      fullnamepassword.addClass('error');
      fullnamepassword.removeClass('valid');
      fullnamepasswordMsg.text('New Password should contain at least one digit,one capital letter,one small letter,one special characters and min 8 characters!!');
    } else {
      fullnamepasswordChecked = fullnamepassword.val();
     

      
  $.ajax({
    type: 'post',
    url: './includes/update_fullname.inc.php',
    data: {
      'fullnamepasswordChecked': fullnamepasswordChecked
    },  success: function (response) {
      console.log(response);
       if (response == false) {
        fullnamepassword.removeClass('error');
        fullnamepassword.addClass('valid');
        fullnamepasswordMsg.text('');
      } else {
        fullnamepassword.removeClass('valid');
        fullnamepassword.addClass('error');
        fullnamepasswordMsg.text(response);
    }

    }
    })

      
    }
  } else {
    fullnamepassword.addClass('error');
    fullnamepassword.removeClass('valid');
    fullnamepasswordMsg.text('Password is required!');
  }

});
updatefullname.focusout(() => {

 
  if (updatefullname.val() == '' && updatefullname.val().length < 3) {
    updatefullnameMsg.text('User name is required!');
    updatefullname.removeClass('valid');
    updatefullname.addClass('error');
  }else if (!regfullname.test(updatefullname.val())) {
    updatefullname.removeClass('valid');
    updatefullname.addClass('error');
    updatefullnameMsg.text('Enter valid username!');
  }else if (updatefullname.val().length >= 5) {
 
    updateName = updatefullname.val();
    $.ajax({
      type: 'post',
      url: './includes/update_fullname.inc.php',
      data: {
        'updateName': updateName
      },
      success: function (response) {
        console.log(response);
        if (response = true) {
         
          updatefullname.removeClass('error');
          updatefullname.addClass('valid');
          updatefullnameMsg.text('');
        }else {
         
          updatefullname.removeClass('valid');
          updatefullname.addClass('error');
          updatefullnameMsg.text(response);
        } 
      }
    });
  } else {
    updatefullname.removeClass('error');
    updatefullname.addClass('valid');
    updatefullnameMsg.text('');
  }
});

})  
/* Update fullname end */
/* Update email start */
$(document).ready(() =>{


  const updateemail = $('#update_email');
  const updateemailMsg = $('.update_email-error');

  const emailpassword = $('#email_password');
  const emailpasswordMsg = $('.email_password-error');
  const regEmail = /^[a-z]+[0-9a-zA-Z_\.]*@[a-z_]+\.[a-z]+$/;
  const regPassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/;
  $("#update_email_form").submit((e) => {   
  e.preventDefault();

  if ($('input').hasClass('error')) {
      return false;
    } else {

      const updateemailChecked = updateemail.val();
      const emailpasswordChecked = emailpassword.val();
      const submit = $('#update_email_btn').val();

      $.ajax({
        type: 'post',
        url: './includes/update_email.inc.php',
        enctype: 'multipart/form-data',
        data: {
          'update_email': updateemailChecked,
          'email_password': emailpasswordChecked,
          'update_email_btn': submit
        },
        success: function (response) {
          console.log(response);
          if (response) {
            console.log(response);
            document.location.href = './user_profile';
          } else {
           
           console.log(response);
          } 
        }
      });
    }
 
});
emailpassword.focusout(() => {

  if (emailpassword.val() !== '') {
    emailpassword.removeClass('error');
    emailpassword.addClass('valid'); 
    emailpasswordMsg.text('');

    if (emailpassword.val().length < 8) {
      emailpassword.addClass('error');
      emailpassword.removeClass('valid');
      emailpasswordMsg.text('Password should be min 8 characters!');
    } else if (!regPassword.test(emailpassword.val())) {
      emailpassword.addClass('error');
      emailpassword.removeClass('valid');
      emailpasswordMsg.text('New Password should contain at least one digit,one capital letter,one small letter,one special characters and min 8 characters!!');
    } else {
      emailpasswordChecked = emailpassword.val();
     

      
  $.ajax({
    type: 'post',
    url: './includes/update_email.inc.php',
    data: {
      'emailpasswordChecked': emailpasswordChecked
    },  success: function (response) {
      console.log(response);
       if (response == false) {
        emailpassword.removeClass('error');
        emailpassword.addClass('valid');
        emailpasswordMsg.text('');
      } else {
        emailpassword.removeClass('valid');
        emailpassword.addClass('error');
        emailpasswordMsg.text(response);
    }

    }
    })

      
    }
  } else {
    emailpassword.addClass('error');
    emailpassword.removeClass('valid');
    emailpasswordMsg.text('Password is required!');
  }

});
updateemail.focusout(() => {


  if (updateemail.val() == '') {
    updateemailMsg.text('email is required!');
    updateemail.removeClass('valid');
    updateemail.removeClass('error');
  }else if (!regEmail.test(updateemail.val())) {
    updateemail.removeClass('valid');
    updateemail.addClass('error');
    updateemailMsg.text('Enter valid email!');
  } else {

    checkupdateemail = updateemail.val();
    $.ajax({
      type: 'post',
      url: './includes/update_email.inc.php',
      data: {
        'checkupdateemail': checkupdateemail
      },
      success: function (response) {
      
        console.log(response);

         if (response == false) {
          updateemail.addClass('valid');
          updateemail.removeClass('error');
          updateemailMsg.text('');
        } else {
          updateemail.addClass('error');
          updateemail.removeClass('valid');
          updateemailMsg.text(response);
      }

      }
      })
  }
});

})  
/* Update email end */
/* Update password start */
$(document).ready(() =>{


  const oldpassword = $('#old_password');
  const oldpasswordMsg = $('.old_password-error');

  const updatepassword = $('#update_password');
  const updatepasswordMsg = $('.update_password-error');

  const renewpassword = $('#re_new_password');
  const renewpasswordMsg = $('.re_new_password-error');

  const regPassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/;

  $("#update_password_form").submit((e) => {   
  e.preventDefault();

  if ($('input').hasClass('error')) {
      return false;
    } else {

      const oldpasswordChecked = oldpassword.val();
      const updatepasswordChecked = updatepassword.val();
      const renewpasswordChecked = renewpassword.val();

      const submit = $('#update_password_btn').val();
     
      $.ajax({
        type: 'post',
        url: './includes/update_password.inc.php',
        enctype: 'multipart/form-data',
        data: {
          'old_password': oldpasswordChecked,
          'update_password': updatepasswordChecked,
          'update_password_btn': submit
        },
        success: function (response) {
          console.log(response);
          if (response == false) {
            console.log(response);
           document.location.href = './user_profile';
          } else {
            renewpassword.addClass('error');
            renewpassword.removeClass('valid');
            renewpasswordMsg.text(response);
           console.log(response);
          } 
        }
      });
    }
 
});
oldpassword.focusout(() => {

  if (oldpassword.val() !== '') {
    oldpassword.removeClass('error');
    oldpassword.addClass('valid'); 
    oldpasswordMsg.text('');

    if (oldpassword.val().length < 8) {
      oldpassword.addClass('error');
      oldpassword.removeClass('valid');
      oldpasswordMsg.text('Password should be min 8 characters!');
    } else if (!regPassword.test(oldpassword.val())) {
      oldpassword.addClass('error');
      oldpassword.removeClass('valid');
      oldpasswordMsg.text('New Password should contain at least one digit,one capital letter,one small letter,one special characters and min 8 characters!!');
    } else {
      oldpasswordChecked = oldpassword.val();
     

      
  $.ajax({
    type: 'post',
    url: './includes/update_password.inc.php',
    data: {
      'oldpasswordChecked': oldpasswordChecked
    },  success: function (response) {
      
       if (response == false) {
        oldpassword.removeClass('error');
        oldpassword.addClass('valid');
        oldpasswordMsg.text('');
      } else {
        oldpassword.removeClass('valid');
        oldpassword.addClass('error');
        oldpasswordMsg.text(response);
    }

    }
    })

      
    }
  } else {
    oldpassword.addClass('error');
    oldpassword.removeClass('valid');
    oldpasswordMsg.text('Password is required!');
  }

});
updatepassword.focusout(() => {

  if (updatepassword.val() !== '') {
    updatepassword.removeClass('error');
    updatepassword.addClass('valid'); 
    updatepasswordMsg.text('');

    if (updatepassword.val().length < 8) {
      updatepassword.addClass('error');
      updatepassword.removeClass('valid');
      updatepasswordMsg.text('Password should be min 8 characters!');
    } else if (!regPassword.test(updatepassword.val())) {
      updatepassword.addClass('error');
      updatepassword.removeClass('valid');
      updatepasswordMsg.text('New Password should contain at least one digit,one capital letter,one small letter,one special characters and min 8 characters!!');
    } else {
      updatepasswordChecked = updatepassword.val();
      renewpasswordChecked = renewpassword.val();

      
  $.ajax({
    type: 'post',
    url: './includes/update_password.inc.php',
    data: {
      'updatepasswordChecked': updatepasswordChecked
    },  success: function (response) {
      console.log(response);
       if (response = true) {
        updatepassword.removeClass('error');
        updatepassword.addClass('valid');
        updatepasswordMsg.text('');
      } else {
        updatepassword.removeClass('valid');
        updatepassword.addClass('error');
        updatepasswordMsg.text(response);
    }

    }
    })

      
    }
  } else {
    updatepassword.addClass('error');
    updatepassword.removeClass('valid');
    updatepasswordMsg.text('Password is required!');
  }

});
renewpassword.focusout(() => {

  if (renewpassword.val() !== '') {

    if (updatepassword.val() == renewpassword.val()) {
      renewpassword.removeClass('error');
      renewpassword.addClass('valid');
      renewpasswordMsg.text('');
    } else {
      renewpassword.addClass('error');
      renewpassword.removeClass('valid');
      renewpasswordMsg.text('Password and re password should be same!');
    }
  } else {
    renewpassword.addClass('error');
    renewpassword.removeClass('valid');
    renewpasswordMsg.text('Re password is required!');
  }


});

})  
/* Update password end */
/* Delete user start */
$(document).ready(() =>{


  const deleteEmail = $('#delete_profile_email');
  const deleteEmailMsg = $('.delete_profile_email-error');

  const deletePassword = $('#delete_profile_password');
  const deletePasswordMsg = $('.delete_profile_password-error');
  const regEmail = /^[a-z]+[0-9a-zA-Z_\.]*@[a-z_]+\.[a-z]+$/;
  const regPassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/;
  $("#delete_profile_form").submit((e) => {   
  e.preventDefault();

  if ($('input').hasClass('error')) {
      return false;
    } else {

      const deleteEmailChecked = deleteEmail.val();
      const deletePasswordChecked = deletePassword.val();
      const submit = $('#delete_profile_btn').val();

      $.ajax({
        type: 'post',
        url: './includes/delete_user.inc.php',
        enctype: 'multipart/form-data',
        data: {
          'delete_profile_email': deleteEmailChecked,
          'delete_profile_password': deletePasswordChecked,
          'delete_profile_btn': submit
        },
        success: function (response) {
          console.log(response);
          if (response) {
            console.log(response);
            document.location.href = './delete_profile';
          } else {
           
           console.log(response);
          } 
        }
      });
    }
 
});
deletePassword.focusout(() => {

  if (deletePassword.val() !== '') {
    deletePassword.removeClass('error');
    deletePassword.addClass('valid'); 
    deletePasswordMsg.text('');

    if (deletePassword.val().length < 8) {
      deletePassword.addClass('error');
      deletePassword.removeClass('valid');
      deletePasswordMsg.text('Password should be min 8 characters!');
    } else if (!regPassword.test(deletePassword.val())) {
      deletePassword.addClass('error');
      deletePassword.removeClass('valid');
      deletePasswordMsg.text('Password should contain at least one digit,one capital letter,one small letter,one special characters and min 8 characters!!');
    } else {
      deletePasswordChecked = deletePassword.val();
     

      
  $.ajax({
    type: 'post',
    url: './includes/delete_user.inc.php',
    data: {
      'deletePasswordChecked': deletePasswordChecked
    },  success: function (response) {
      console.log(response);
       if (response == false) {
        deletePassword.removeClass('error');
        deletePassword.addClass('valid');
        deletePasswordMsg.text('');
      } else {
        deletePassword.removeClass('valid');
        deletePassword.addClass('error');
        deletePasswordMsg.text(response);
    }

    }
    })

      
    }
  } else {
    deletePassword.addClass('error');
    deletePassword.removeClass('valid');
    deletePasswordMsg.text('Password is required!');
  }

});
deleteEmail.focusout(() => {


  if (deleteEmail.val() == '') {
    deleteEmailMsg.text('email is required!');
    deleteEmail.removeClass('valid');
    deleteEmail.removeClass('error');
  }else if (!regEmail.test(deleteEmail.val())) {
    deleteEmail.removeClass('valid');
    deleteEmail.addClass('error');
    deleteEmailMsg.text('Enter valid email!');
  } else {

    checkdeleteEmail = deleteEmail.val();
    $.ajax({
      type: 'post',
      url: './includes/delete_user.inc.php',
      data: {
        'checkdeleteEmail': checkdeleteEmail
      },
      success: function (response) {
      
        console.log(response);

         if (response == false) {
          deleteEmail.addClass('valid');
          deleteEmail.removeClass('error');
          deleteEmailMsg.text('');
        } else {
          deleteEmail.addClass('error');
          deleteEmail.removeClass('valid');
          deleteEmailMsg.text(response);
      }

      }
      })
  }
});

})  
/* Delete user end */
/* Update user status start */
$(document).ready(function(){
  $(".aktive_users_form").submit(function (e) {   
  e.preventDefault();
  var formData = new FormData(this);
  $.ajax({
          type: 'POST',
          url: './includes/update_users_status.inc.php',
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

/* Update user status end */
