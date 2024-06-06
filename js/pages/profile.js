


function GetUserProfileData() {
  let userName = JSON.parse(sessionStorage.getItem("IS_VALID"));
  var userid = userName.id;
  $.ajax({
    type: 'GET',
    url: `${apiUrl}/profile.php?p_DataRequest=get&p_id=${userid}`,
    success: function(response) {
     // console.log("response", response.data[0]);
      if (response.status === "true") {
        document.getElementById("name").value = response.data[0].username;
        document.getElementById("roleName").value = response.data[0].role_id;
        document.getElementById("oldpasswordhidden").value = response.data[0].password;
      };
    }
  });
}


$('#profileForm').submit(function(event) {
    event.preventDefault();
  var oldPassword = document.getElementById("oldPassword").value;
  var oldPasswordhidden = document.getElementById("oldpasswordhidden").value;
  var password = document.getElementById("newPassword").value;
 // console.log("out",oldPassword, oldPasswordhidden);
//  if(oldPassword === " " || password ===" "){
//   console.log("if ",oldPassword, password);
//   $(".error-msg").html("Both Old password and New password required").show();
//   setTimeout(function(){
//     $(".error-msg").html(" ").hide();
//   }, 3000);
//  }
//   else
   if (oldPassword !== oldPasswordhidden) {
    console.log("if else",oldPassword, oldPasswordhidden);
    $(".error-msg").html("Old password does not matched").show();
    setTimeout(function(){
      $(".error-msg").html(" ").hide();
    }, 2000); 
  }
  else {
   // console.log("else",oldPassword, oldPasswordhidden);
    $(".error-msg").html(" ").hide();
    updateprofile();}
  });

function updateprofile() {
  let userName = JSON.parse(sessionStorage.getItem("IS_VALID"));
  var id = userName.id;
  var password = document.getElementById("newPassword").value;
  var dataJson = JSON.stringify({
    data_request: "updateProfile",
    id: id,
    username: '',
    password: password,
    role_id: ''
  });

  $.ajax({
    type: 'POST',
    url: `${apiUrl}/profile.php`,
    data: dataJson,
    success: function(response) {
      //console.log("response", response);
      if (response.status === "true") {
        $('#profileForm')[0].reset();

        GetUserProfileData();
        alert("Your Password has been updated");
      };
    }
  });
}

$(document).ready(function() {
  checkAuthrization();
  GetUserProfileData();

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

$("#show_hide_passwordnew a").on('click', function(event) {
  event.preventDefault();
  if($('#show_hide_passwordnew input').attr("type") == "text"){
      $('#show_hide_passwordnew input').attr('type', 'password');
      $('#show_hide_passwordnew i').addClass( "fa-eye-slash" );
      $('#show_hide_passwordnew i').removeClass( "fa-eye" );
  }else if($('#show_hide_passwordnew input').attr("type") == "password"){
      $('#show_hide_passwordnew input').attr('type', 'text');
      $('#show_hide_passwordnew i').removeClass( "fa-eye-slash" );
      $('#show_hide_passwordnew i').addClass( "fa-eye" );
  }
});

});

function checkAuthrization() {
  let userName = JSON.parse(sessionStorage.getItem("IS_VALID"));
 // let userName = decryptedData;
if (userName === null) {
  window.location.href = "http://localhost/skydash/login.php";
    }
   
   
}