function openForm(linkName, formName) {
    var i, form, tablinks;
    form = document.getElementsByClassName("form");
    for (i = 0; i < form.length; i++) {
        form[i].style.display = "none";
    }
    formlinks = document.getElementsByClassName("formlinks");
    for (i = 0; i < formlinks.length; i++) {
        formlinks[i].className = formlinks[i].className.replace(" active", "");
    }
    document.getElementById(formName).style.display = "block";
    document.getElementById(linkName).className += " active";
}

function openTab(evt, tabID) {
    var i, tab, tablinks;
    tab = document.getElementsByClassName("tab");
    for (i = 0; i < tab.length; i++) {
        tab[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabID).style.display = "block";
    evt.currentTarget.className += " active";
}

function scrollToItem(itemName) {
    document.querySelector(itemName).scrollIntoView({behavior: 'smooth'});
}

function openLoginForm() {
    scrollToItem('#loginPage');
    openForm('loginLink', 'loginForm');
 }

function openSignupForm() {
    scrollToItem('#loginPage');
    openForm('signupLink', 'signupForm');
}

function openModal(modalName) {
    // Get the modal
    var modal = document.getElementById(modalName);

    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
function closeModal(modalName) {
    // Get the modal
    var modal = document.getElementById(modalName);
    var resetPswTxt = document.getElementById("resetPswTxt");
    var emailInput = document.getElementById("emailInput");
    var resetBtn = document.getElementById("resetPswBtn");    
    
    modal.style.display = "none";
    
    // Reseting the modal content back to original
    resetPswTxt.innerHTML = "Please enter your username or e-mail address.";
    emailInput.style.display = "block";
    resetBtn.innerHTML = "Reset password";
    resetBtn.setAttribute( "onclick", "javascript: resetPsw('userna');" );
    
}

function resetPsw(user) {
    //Find the user
    
    //Reset the password
    
    //Give notification and modifying content
    var resetPswTxt = document.getElementById("resetPswTxt");
    var emailInput = document.getElementById("emailInput");
    var resetBtn = document.getElementById("resetPswBtn");
    
    resetPswTxt.innerHTML = "The password reset link has been sent to your e-mail.";
    emailInput.style.display = "none";
    resetBtn.innerHTML = "Close";
    resetBtn.setAttribute( "onclick", "javascript: closeModal('passwordResetModal');" );
}

window.onload = function() {
    // Script for validating password
    var myInput = document.getElementById("signupPsw");
    var letter = document.getElementById("pswLetter");
    var capital = document.getElementById("pswCapital");
    var number = document.getElementById("pswNumber");
    var length = document.getElementById("pswLength");

    // When the user clicks on the password field, show the message box
    myInput.onfocus = function() {
        document.getElementById("pswMessage").style.display = "block";
    }

    // When the user clicks outside of the password field, hide the message box
    myInput.onblur = function() {
        document.getElementById("pswMessage").style.display = "none";
    }

    // When the user starts to type something inside the password field
    myInput.onkeyup = function() {
      // Validate lowercase letters
      var lowerCaseLetters = /[a-z]/g;
      if(myInput.value.match(lowerCaseLetters)) {  
        letter.classList.remove("invalid");
        letter.classList.add("valid");
      } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
      }
      
      // Validate capital letters
      var upperCaseLetters = /[A-Z]/g;
      if(myInput.value.match(upperCaseLetters)) {  
        capital.classList.remove("invalid");
        capital.classList.add("valid");
      } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
      }

      // Validate numbers
      var numbers = /[0-9]/g;
      if(myInput.value.match(numbers)) {  
        number.classList.remove("invalid");
        number.classList.add("valid");
      } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
      }
      
      // Validate length
      if(myInput.value.length >= 8) {
        length.classList.remove("invalid");
        length.classList.add("valid");
      } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
      }
    }
};

// Here are the jquery code
$(document).ready(function() {
    
    $("#pswConfirm").keyup(function() {
        var password = document.getElementById("signupPsw").value;
        var confirmPassword = document.getElementById("pswConfirm").value;
        if (password != confirmPassword) {
            $('#pswMatchError').html("Passwords do not match");
            $('#signupBtn').prop("disabled",true);
            $('#signupBtn').css("cursor", "not-allowed");
            return false;
        }
        $('#pswMatchError').html("");
        $('#signupBtn').prop("disabled",false);
        $('#signupBtn').css("cursor", "pointer");
        return true;
    });
    
    $("#signup_psw").keyup(function() {
        var len_psw = document.getElementById("signup_psw").value;
        if (len_psw != "eetu") {
            $('#pswError').html("Password should contain at least 8 characters.");
            $('#signupBtn').prop("disabled",true);
            $('#signupBtn').css("cursor", "not-allowed");
            return false;
        }
        $('#pswError').html("");
        $('#signupBtn').prop("disabled",false);
        $('#signupBtn').css("cursor", "pointer");
        return true;
    });
    
    
    
    
    // $('button#loginBtn').click(function() {
        // var email = $('input#)
        // $("#emailError").html("Hello, World!");
        // // $.ajax({                                      
            // // url: 'login.php',                  //the script to call to get data          
            // // data: "",                        //you can insert url arguments here to pass to api.php
                                       // // //for example "id=5&parent=6"
            // // dataType: 'json',                //data format      
            // // success: function(data)        //on recieve of reply
            // // {
            // // var id = data[0];              //get id
            // // var vname = data[1];           //get name

            // // $('#emailError').html("<b>id: </b>"+id+"<b> name: </b>"+vname); //Set output element html

            // // } 
        // // });
});
