
    function updateAddvalue(){
    const inputElement = document.getElementById("useremail");
    inputElement.disabled = false;
    passwordDiv.style.display = "block";
    addBtn.style.display = "block";
    editBtn.style.display = "none";
    document.getElementById("useremail").value="";
    document.getElementById("password").value="";
    }
    function addUser() {
        var username = document.getElementById("useremail").value;
        var password = document.getElementById("password").value;
        var selectElement = document.getElementById("role");
        var roleid = selectElement.value;

   
        var dataJson = JSON.stringify({
            data_request: "add",
            id: 0,
            username: username,
            password: password,
            role_id: roleid
        });

        $.ajax({
            type: 'POST',
            url: `${apiUrl}/manageuser.php`,
            data: dataJson,
            success: function(response) {
               // console.log("response", response);
                if (response.status === "true") {
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                };
            }
        });
    }

    function editUser() {
        var id = document.getElementById("editBtn").value;
        var username = document.getElementById("useremail").value;
        var password = document.getElementById("password").value;
        var selectElement = document.getElementById("role");
        var roleid = selectElement.value;
      
        var dataJson = JSON.stringify({
            data_request: "update",
            id: id,
            username: username,
            password: password,
            role_id: roleid
        });

        $.ajax({
            type: 'POST',
            url: `${apiUrl}/manageuser.php`,
            data: dataJson,
            success: function(response) {
                //console.log("response", response);
                if (response.status === "true") {
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);

                };
            }
        });
    }

    function updatePassUser() {
        var id = document.getElementById("editBtnpass").value;
        var username = document.getElementById("updatepassuseremail").value;
        var password = document.getElementById("updatepassword").value;
        var selectElement = document.getElementById("updatepassrole");
        var roleid = selectElement.value;

      
        var dataJson = JSON.stringify({
            data_request: "updatePassword",
            id: id,
            username: username,
            password: password,
            role_id: roleid
        });

        $.ajax({
            type: 'POST',
            url: `${apiUrl}/manageuser.php`,
            data: dataJson,
            success: function(response) {
                //console.log("response", response);
                if (response.status === "true") {
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                };
            }
        });
    }


    function deleteUser() {
        var id = document.getElementById("deleteBtn").value;
        //console.log("delete", id);
       
        var dataJson = JSON.stringify({
            data_request: "delete",
            id: id,
            username: '',
            password: '',
            role_id: ''
        });

        $.ajax({
            type: 'POST',
            url: `${apiUrl}/manageuser.php`,
            data: dataJson,
            success: function(response) {
                //console.log("response", response);
                if (response.status === "true") {
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);

                };
            }
        });
    }

    function checkAuthrization() {
        let userName = JSON.parse(sessionStorage.getItem("IS_VALID"));
        //let userName = decryptedData;
      if (userName === null) {
        window.location.href = "http://localhost/skydash/login.php";
          }
      
    }
 function manageuserAuth(){
    let userName = JSON.parse(sessionStorage.getItem("IS_VALID"));
  if (userName !==null && userName.role_name !== "admin") {
        window.location.href = "http://localhost/skydash/pages/notAuthrizeUser.php";
    }
  }

  function passwordShowhide(){
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
  }
    $(document).ready(function() {
        checkAuthrization();
          manageuserAuth();
          passwordShowhide();
        var buttonDisplayed = false;
        if (!buttonDisplayed) {
            addBtn.style.display = "inline-block";
            editBtn.style.display = "none";
        }

        $.ajax({
            type: 'GET',
            url: `${apiUrl}/manageuser.php`,
            success: function(response) {
                var data = response.data;
                var table = $('#example1').DataTable();
                table.rows.add(data).draw();
            }
        });

        // Initialize DataTable
        var table = $('#example1').DataTable({
            "lengthMenu": [ [5, 10, 20, 100], [5, 10, 20, 100] ],
            // "rowCallback": function(row, data, index) {
            //     // Set index column value
            //     $('td:eq(0)', row).html(index + 1);
            //   },
            // Define column headers
            "columns": [
                // {"data": null,
              
                // },
                {

                    "data": "id"
                },
                {
                    "data": "username"
                },
                // { "data": "role_id" },
                {
                    "data": "role_name"
                },
                {
                    // Add actions buttons (edit and delete)
                    
                    "data": null,
                    "defaultContent": "<button  class='edit btn btn-warning' data-toggle='modal' data-target='#loginModal' title='update role'><i class='mdi mdi-account-box'></i></button><button style='margin-left:10px;' class='editpass btn btn-warning' data-toggle='modal' data-target='#updateModal' title='update password'><i class='mdi mdi-pencil-box-outline'></i></button><button style='margin-left:10px;' class='delete btn btn-danger' data-toggle='modal' data-target='#deleteuser' title='delete'><i class='mdi mdi-delete'></i></button>",
                    
                }
            ]
        });

        // Add event listener for edit button
        $('#example1 tbody').on('click', '.edit', function() {
            buttonDisplayed = true;
          
            var data = table.row($(this).parents('tr')).data();
             console.log("edit",buttonDisplayed,data);
            document.getElementById("useremail").value = data.username;
            document.getElementById("password").value = data.password;
            document.getElementById("role").value = data.role_id;
            document.getElementById("editBtn").value = data.id;
            var addBtn = document.getElementById("addBtn");
            var editBtn = document.getElementById("editBtn");
            var passwordDiv = document.getElementById("passwordDiv");

            
            if (buttonDisplayed) {
                const inputElement = document.getElementById("useremail");
                inputElement.disabled = true;
                passwordDiv.style.display = "none";
                addBtn.style.display = "none";
                editBtn.style.display = "inline-block";
            }
          
        });
        // Add event listener for delete button
        $('#example1 tbody').on('click', '.delete', function() {
            var data = table.row($(this).parents('tr')).data();
            document.getElementById("deleteBtn").value = data.id;

        });
        $('#example1 tbody').on('click', '.editpass', function() {
            var data = table.row($(this).parents('tr')).data();
            document.getElementById("updatepassuseremail").value = data.username;
            document.getElementById("editBtnpass").value = data.id;

        });

    });

