<?php include "partials/metaheadlogin.php"; ?>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="alert alert-success mb-3" id="loginSuccessMessage" style="display: none; width:100%;margin:0 auto;">
              <h5>You are successfully logged in !</h5>
            </div>
            <div class="alert alert-danger mb-3" id="loginFailureMessage" style="display: none;width:100%;margin:0 auto;">
              <h5>Login Failed,Enter Wrong Username or password.</h5>
            </div>
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <!-- <img src="images/logo.svg" alt="logo"> -->
                <img src="images/amdocs-logo.png" alt="logo">
              </div>

              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-3">
                <div id="divusernameError">
                  <p class="error-message" id="usernameError"></p>
                </div>
                <div class="form-group">
                  <span><i class="fa fa-user-circle-o" aria-hidden="true"></i></span>
                  <!-- <div class="input-group"> -->
                    <input type="email" class="form-control form-control-lg" id="username" onchange="handleChangeusername(this)" placeholder="Username">
                    <!-- <div class="input-group-addon" id="eye-icon">
                      <a href=""><i style="color:#4B49AC; visibility:hidden;" class="fa fa-eye-slash" aria-hidden="true"></i></a>
                    </div> -->
                  <!-- </div> -->
                </div>


                <div id="divPasswordError">
                  <p class="error-message" id="passwordError"></p>
                </div>
                <div class="form-group">
                  <span><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
                  <div class="input-group" id="show_hide_password" style=" border: 1px solid #CED4DA;">
                    <input type="password" style="border:none" class="form-control form-control-lg" id="password" onchange="handleChangePasswrd(this)" placeholder="Password">
                    <div class="input-group-addon" id="eye-icon">
                      <a href=""><i style="color:#4B49AC;" class="fa fa-eye-slash" aria-hidden="true"></i></a>
                    </div>
                  </div>
                </div>
                <div  class="mt-3">
                  <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" 
                  onClick="login()">SIGN IN</a>
                </div>
                <!-- <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div> -->
                <!-- <a href="#" class="auth-link text-black">Forgot password?</a> -->
            </div>
            <div class="mb-2">
              <!-- <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                    <i class="ti-facebook mr-2"></i>Connect using facebook
                  </button> -->
            </div>
            <!-- <div class="text-center mt-4 font-weight-light">
                  Don't have an account? 
                  <a href="register.html" class="text-primary">Create</a>
                </div> -->
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
  </div>
 
  </div>

  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <script src="js/pages/login.js"></script>
  <script src="js/pages/common.js"></script>
</body>

</html>