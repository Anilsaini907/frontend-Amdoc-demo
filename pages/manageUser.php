
    <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="http://localhost/skydash/css/manageuser.css">
    <?php include "../partials/headmetaPage/metahead.php"; ?>
    
</head>

<body>
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
                            <!-- <div class="input-group"> -->
                                <input type="text" class="form-control" id="useremail" placeholder="Enter username" required>
                                <!-- <div class="input-group-addon" id="eye-icon">
                                    <a href=""><i style="color:#4B49AC;visibility:hidden;" class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                </div>
                            </div> -->
                        </div>
                        <div class="form-group" id="passwordDiv">
                            <label for="password">Password</label>
                            <span><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>

                            <div class="input-group" id="show_hide_password" style=" border: 1px solid #CED4DA;">
                                <input type="password" style="border:none" class="form-control" id="password" placeholder="Enter password" required>
                                <div class="input-group-addon" id="eye-icon">
                                    <a href=""><i style="color:#4B49AC;" class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <!-- <div class="input-group"> -->
                                <select class="form-control" id="role">
                                    <option value="1">Admin</option>
                                    <option value="2">User</option>
                                </select>
                                <!-- <div class="input-group-addon" id="eye-icon">
                                    <a href=""><i style="color:#4B49AC;visibility:hidden;" class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                </div>
                            </div> -->
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
                            <!-- <div class="input-group"> -->
                                <input type="text" class="form-control" disabled id="updatepassuseremail" placeholder="Enter username" required>
                                <!-- <div class="input-group-addon" id="eye-icon">
                                    <a href=""><i style="color:#4B49AC; visibility:hidden;" class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                </div>
                            </div> -->
                        </div>

                        <div class="form-group">
                            <label for="password">New Password</label>
                            <span><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
                            <div class="input-group" id="show_hide_passwordnew" style=" border: 1px solid #CED4DA;">

                                <input type="password" style="border:none" class="form-control" id="updatepassword" placeholder="Enter password" required>
                                <div class="input-group-addon" id="eye-icon">
                                    <a href=""><i style="color:#4B49AC;" class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="role">Role</label>
                            <!-- <div class="input-group"> -->
                                <select class="form-control" id="updatepassrole" disabled>
                                    <option value="1">Admin</option>
                                    <option value="2">User</option>
                                </select>
                                <!-- <div class="input-group-addon" id="eye-icon">
                                    <a href=""><i style="color:#4B49AC; visibility:hidden;" class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                </div>
                            </div> -->
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button id="editBtnpass" style="background-color: #4B49AC;border-color: #4B49AC;" type="button" class="btn btn-success" onclick="updatePassUser()">Update User</button>

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
            <!-- <div id="right-sidebar" class="settings-panel">
                <i class="settings-close ti-close"></i>
                <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
                    </li>
                </ul>
                <div class="tab-content" id="setting-content">
                    <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
                        <div class="add-items d-flex px-3 mb-0">
                            <form class="form w-100">
                                <div class="form-group d-flex">
                                    <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                                    <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                                </div>
                            </form>
                        </div>
                        <div class="list-wrapper px-3">
                            <ul class="d-flex flex-column-reverse todo-list">
                                <li>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox">
                                            Team review meeting at 3.00 PM
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox">
                                            Prepare for presentation
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox">
                                            Resolve all the low priority tickets due today
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li class="completed">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox" checked>
                                            Schedule meeting for next week
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li class="completed">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox" checked>
                                            Project review
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                            </ul>
                        </div>
                        <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>
                        <div class="events pt-4 px-3">
                            <div class="wrapper d-flex mb-2">
                                <i class="ti-control-record text-primary mr-2"></i>
                                <span>Feb 11 2018</span>
                            </div>
                            <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
                            <p class="text-gray mb-0">The total number of sessions</p>
                        </div>
                        <div class="events pt-4 px-3">
                            <div class="wrapper d-flex mb-2">
                                <i class="ti-control-record text-primary mr-2"></i>
                                <span>Feb 7 2018</span>
                            </div>
                            <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
                            <p class="text-gray mb-0 ">Call Sarah Graves</p>
                        </div>
                    </div>
                   
                    <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
                        <div class="d-flex align-items-center justify-content-between border-bottom">
                            <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
                            <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
                        </div>
                        <ul class="chat-list">
                            <li class="list active">
                                <div class="profile"><img src="../images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                                <div class="info">
                                    <p>Thomas Douglas</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">19 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="../images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
                                <div class="info">
                                    <div class="wrapper d-flex">
                                        <p>Catherine</p>
                                    </div>
                                    <p>Away</p>
                                </div>
                                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                                <small class="text-muted my-auto">23 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="../images/faces/face3.jpg" alt="image"><span class="online"></span></div>
                                <div class="info">
                                    <p>Daniel Russell</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">14 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="../images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                                <div class="info">
                                    <p>James Richardson</p>
                                    <p>Away</p>
                                </div>
                                <small class="text-muted my-auto">2 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="../images/faces/face5.jpg" alt="image"><span class="online"></span></div>
                                <div class="info">
                                    <p>Madeline Kennedy</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">5 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="../images/faces/face6.jpg" alt="image"><span class="online"></span></div>
                                <div class="info">
                                    <p>Sarah Graves</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">47 min</small>
                            </li>
                        </ul>
                    </div>
                   
                </div>
            </div> -->
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

                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <p class="card-title">User Management</p>
                                        <button type="button" style="background-color: #4B49AC;
                                                     border-color: #4B49AC;" class="btn btn-success" data-toggle="modal" data-target="#loginModal" onclick="updateAddvalue()">
                                            Add user
                                        </button>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                <table id="example1" class="display expandable-table" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <!-- <th data-orderable="true">#</th>  -->
                                                            <th>id</th>
                                                            <th>User Name</th>
                                                            <!-- <th>Role id</th> -->
                                                            <th>Role Name</th>
                                                            <th data-orderable="false">Actions</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
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
                    <!-- <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Distributed by <a href="https://www.themewagon.com/" target="_blank">Themewagon</a></span> 
          </div> -->
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="../vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    
    <script src="../vendors/chart.js/Chart.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../js/off-canvas.js"></script>
    <script src="../js/hoverable-collapse.js"></script>
    <script src="../js/template.js"></script>
    <script src="../js/settings.js"></script>
    <script src="../js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../js/dashboard.js"></script>
    <script src="../js/Chart.roundedBarCharts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment.min.js"></script>
    <!-- Include Bootstrap Datepicker JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js"></script>


    <!-- End custom js for this page-->
    <script>
        document.getElementById('usernamewelcome').textContent += " " + userName.username.split("@")[0];
        document.getElementById('username').setAttribute('src', 'https://cdn.pixabay.com/photo/2016/05/05/02/37/sunset-1373171_1280.jpg');
    </script>
    <!-- Include data tables js -->
    <script src="../vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="../js/dataTables.select.min.js"></script>
    <!-- <script src="../vendors/jquery.dataTables1.11.5-CSS/jquery.datatable1.11.5.js"></script> -->
    <!-- <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script> -->
    <!-- Include Highcharts JS -->
    <script src="https://code.highcharts.com/highcharts.js"></script>

    <script src="../js/pages/common.js"></script>
    <script src="../js/pages/manageuser.js"></script>
</body>

</html>