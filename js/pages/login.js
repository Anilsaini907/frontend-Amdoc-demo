


function login() {
  event.preventDefault();
  $('.error-message').text('');
   
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    //console.log("Login",username,password);
    // Basic validation
    if (username.trim() === "") {
      $('#usernameError').text('Please enter a username');
      // alert('Please enter a username');
      return ;
    }

    if (password.trim() === "") {
      $('#passwordError').text('Please enter a password');
      // alert('Please enter a password');
      return ;
    }
    // console.log("Login", username, password);
    var dataJson = JSON.stringify({
      "p_username": username,
      "p_password": password
    });
     
      $.ajax({
        type: 'POST',
        url: `${apiUrl}/login.php`,
        data: dataJson,
        success: function(response) {
        //  console.log(response);
          if (response.data[0]['NULL'] === null) {
            // document.getElementById('loginFailureMessage').style.display = 'block';
            showToast('Login Failed,Enter Wrong Username or password.', false);
            setTimeout(function() {
              document.getElementById('loginFailureMessage').style.display = 'none';
              window.location.href = "http://localhost/skydash/login.php";
            }, 2000);
          }
          else if(response.data[0]) {
          sessionStorage.setItem("IS_VALID", JSON.stringify(response.data[0]));
          showToast('You are logged in successfully!', true);
            // Encrypt and store data in sessionStorage
            // const encryptedData = encryptData(response.data[0], encryptionKey);
            // sessionStorage.setItem('IS_VALID', encryptedData);
            // document.getElementById('loginSuccessMessage').style.display = 'block';
            setTimeout(function() {
              window.location.href = "http://localhost/skydash/index.php";
              document.getElementById('loginSuccessMessage').style.display = 'none';
            }, 2000);

          }
          

        }
      });
    


  }
 function handleChangeusername(input){
  var inputValue = input.value;
 // console.log(inputValue);
  if(inputValue){
    document.getElementById('divusernameError').style.display = 'none';
  }
 }
 function handleChangePasswrd(input){
  var inputValue = input.value;
  //console.log(inputValue);
  if(inputValue){
    document.getElementById('divPasswordError').style.display = 'none';
  }
 }
 function checkAuthrization() {
  // console.log("login");
  let userName = JSON.parse(sessionStorage.getItem("IS_VALID"));
  if (userName !== null && userName.role_name !==null) {
  window.location.href = "http://localhost/skydash/index.php";
    }  
   
}
function showToast(message, isSuccess) {
  var toastBody = $('#updateToast .toast-body');
  toastBody.text(message);

  var toast = $('#updateToast');
  if (isSuccess) {
    toastBody.removeClass('text-danger').addClass('text-success');
  } else {
    toastBody.removeClass('text-success').addClass('text-danger');
  }

  toast.toast('show');
}
 $(document).ready(function() {      
  checkAuthrization(); 
 
  $("#show_hide_password a").on('click', function(event) {
    event.preventDefault();
    if($('#show_hide_password input').attr("type") == "text"){
        $('#show_hide_password input').attr('type', 'password');
        $('#show_hide_password i').addClass( "fa-eye-slash" );
        $('#show_hide_password i').removeClass( "fa-eye" );
    }else if($('#show_hide_password input').attr("type") == "password"){
        $('#show_hide_password input').attr('type', 'text');
        $('#show_hide_password i').removeClass( "fa-eye-slash" );
        $('#show_hide_password i').addClass( "fa-eye" );
    }
});


});


