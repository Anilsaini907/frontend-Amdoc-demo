<?php include "../partials/headmetaPage/metahead.php"; ?>
<link rel="stylesheet" href="http://localhost/skydash/css/profile.css">
</head>

<body>
<?php include "../pages/loader.php" ;?>
    <!-- modal -->
    <div class="modal fade" id="sign-out">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Want to leave?</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    Press logout to leave
                </div>
                <div class="modal-footer">
                    <button type="button" style="background-color:#047acf;" class="btn btn-success" data-dismiss="modal">Stay Here</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="logout()">Logout</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end of modal -->

    <!-- Delete user modal -->
    <div class="modal fade" id="deleteuser">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Are you sure Want to Delete?</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    Press delete button to Remove user
                </div>
                <div class="modal-footer">
                    <button type="button" style="background-color: #4B49AC;    border-color: #4B49AC;" class="btn btn-success" data-dismiss="modal">Cancel</button>
                    <button id="deleteBtn" type="button" class="btn btn-danger" data-dismiss="modal" onclick="deleteUser()">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end of modal -->

    <!-- Add/Edit user modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Change Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="useremail" placeholder="Enter username" required>
                        </div>
                        <div class="form-group" id="passwordDiv">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter password" required>
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control" id="role">
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button id="addBtn" type="button" style="background-color: #4B49AC;    border-color: #4B49AC;" class="btn btn-success" onclick="addUser()">Add user</button>
                    <button id="editBtn" type="button" style="background-color: #4B49AC;    border-color: #4B49AC;" class="btn btn-success" onclick="editUser()">Edit Role</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end of modal -->


    <!-- update password user modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Change password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" disabled id="updatepassuseremail" placeholder="Enter username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password" class="form-control" id="updatepassword" placeholder="Enter password" required>
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control" id="updatepassrole" disabled>
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button id="editBtnpass" style="background-color: #4B49AC;border-color: #4B49AC;" type="button" class="btn btn-success" onclick="updatePassUser()">Update Password</button>

                </div>
            </div>
        </div>
    </div>
    <!-- end of modal -->
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <?php include "../partials/navbar.php"; ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            <div class="theme-setting-wrapper">
                <div id="settings-trigger"><i class="ti-settings"></i></div>
                <div id="theme-settings" class="settings-panel">
                    <i class="settings-close ti-close"></i>
                    <p class="settings-heading">SIDEBAR SKINS</p>
                    <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                        <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
                    </div>
                    <div class="sidebar-bg-options" id="sidebar-dark-theme">
                        <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
                    </div>
                    <p class="settings-heading mt-2">HEADER SKINS</p>
                    <div class="color-tiles mx-0 px-4">
                        <div class="tiles success"></div>
                        <div class="tiles warning"></div>
                        <div class="tiles danger"></div>
                        <div class="tiles info"></div>
                        <div class="tiles dark"></div>
                        <div class="tiles default"></div>
                    </div>
                </div>
            </div>
          
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <?php include "../partials/sidebar.php"; ?>

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="row">
                                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                                    <h3 id="usernamewelcome" class="font-weight-bold">Welcome</h3>
                                    <h6 class="font-weight-normal mb-0">All systems are running smoothly!</h6>
                                </div>
                                <div class="col-12 col-xl-4">
                                    <div class="justify-content-end d-flex">


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body ">
                                    <div class="error-msg"></div>
                                    <div class="col-xl-12 col-md-8">
                                        <form style="width: 50%;margin:0 auto;" id="profileForm">
                                            <div class="form-group">
                                                <label for="name" class="font-weight-bold">Name</label>
                                                <!-- <div class="input-group"> -->
                                                    <input type="text" class="form-control" id="name" placeholder="Enter name" disabled>
                                                    <!-- <div class="input-group-addon" id="eye-icon">
                                                        <a href=""><i style="color:#4B49AC; visibility:hidden;" class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                                    </div> -->
                                                <!-- </div> -->

                                            </div>



                                            <input type="hidden" class="form-control form-control-lg" id="oldpasswordhidden" placeholder="">

                                            <div class="form-group">
                                                <label for="oldPassword" class="font-weight-bold">Old Password</label>
                                                <span><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
                                                <div class="input-group" id="show_hide_password" style=" border: 1px solid #CED4DA;">
                                                    <input type="password" style="border:none" class="form-control " id="oldPassword" placeholder="Old Password" required>

                                                    <div class="input-group-addon" id="eye-icon">
                                                        <a href=""><i style="color:#4B49AC;" class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>




                                            <div class="form-group">
                                                <label for="newPassword" class="font-weight-bold">New Password</label>
                                                <span><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
                                                <div class="input-group" id="show_hide_passwordnew" style=" border: 1px solid #CED4DA;">
                                                    <input type="password" style="border:none" class="form-control" id="newPassword" placeholder="New Password" required>
                                                    <div class="input-group-addon" id="eye-icon">
                                                        <a href=""><i style="color:#4B49AC;" class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <label for="roleName" class="font-weight-bold">Role Name</label>
                                                <!-- <div class="input-group"> -->
                                                    <select class="form-control" id="roleName" disabled>
                                                        <option value="1">Admin</option>
                                                        <option value="2">User</option>
                                                        <!-- Add more options as needed -->
                                                    </select>
                                                    <!-- <div class="input-group-addon" id="eye-icon">
                                                        <a href=""><i style="color:#4B49AC; visibility:hidden;" class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                                    </div>
                                                </div> -->
                                            </div>
                                            <!-- <div  class="mt-3">
                  <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" 
                  type="submit">Update</a>
                </div> -->
                                            <button style="color: #fff;background-color: #4B49AC;border-color: #4B49AC;" 
                                            type="submit" class="btn  btn-success btn-lg">Update</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">All rights reserved with Amdocs</span>
                    </div>

                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <script src="../vendors/js/vendor.bundle.base.js"></script>
    <script src="../vendors/chart.js/Chart.min.js"></script>
    <script src="../vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="../js/dataTables.select.min.js"></script>
    <script src="../js/off-canvas.js"></script>
    <script src="../js/hoverable-collapse.js"></script>
    <script src="../js/template.js"></script>
    <script src="../js/settings.js"></script>
    <script src="../js/todolist.js"></script>
    <script src="../js/dashboard.js"></script>
    <script src="../js/Chart.roundedBarCharts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js"></script>
    <script>
        document.getElementById('usernamewelcome').textContent += " " + userName.username.split("@")[0];
        document.getElementById('username').setAttribute('src', 'https://cdn.pixabay.com/photo/2016/05/05/02/37/sunset-1373171_1280.jpg');
    </script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="../js/pages/common.js"></script>
    <script src="../js/pages/profile.js"></script>
</body>

</html>