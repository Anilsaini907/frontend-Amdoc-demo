 <!-- partial:partials/_navbar.html -->
 <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <!-- <a class="navbar-brand brand-logo mr-5" href="http://localhost/skydash/index.php"><img src="http://localhost/skydash/images/logo.svg" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="http://localhost/skydash/index.php"><img src="http://localhost/skydash/images/logo-mini.svg" alt="logo"/></a>
         -->
        <a class="navbar-brand brand-logo mr-5" href="http://localhost/skydash/index.php"><img src="http://localhost/skydash/images/amdocs-logo.png" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="http://localhost/skydash/index.php"><img src="http://localhost/skydash/images/amdoc.jpg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <!-- <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li> -->
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <!-- <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-bell mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="ti-info-alt mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Application Error</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Just now
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="ti-settings mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Settings</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Private message
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="ti-user mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">New user registration</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    2 days ago
                  </p>
                </div>
              </a>
            </div>
          </li> -->
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="http://localhost/skydash/images/amdoc.jpg" id="username" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <!-- <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
              </a> -->
              <a class="dropdown-item" onclick="logout()"> 
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
          <!-- <li class="nav-item nav-settings d-none d-lg-flex">
            <a class="nav-link" href="#">
              <i class="icon-ellipsis"></i>
            </a>
          </li> -->
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->

    <script>
  //  function decryptData(encryptedData, key) {
  //   const bytes = CryptoJS.AES.decrypt(encryptedData, key);
  //   const decryptedData = bytes.toString(CryptoJS.enc.Utf8);
  //   console.log("decryptedData", decryptedData);
  //   return JSON.parse(decryptedData);
  // }
 //const encryptionKey = 'Cemtics@123';
// const retrievedEncryptedData = sessionStorage.getItem('IS_VALID');
// console.log("nav",retrievedEncryptedData);
// const decryptedData = decryptData(retrievedEncryptedData, 'Cemtics@123');
// console.log("nav",decryptedData); // Output: { username: 'john', role: 'admin' }

let userName = JSON.parse(sessionStorage.getItem("IS_VALID"));
//let userName=decryptedData;
// document.getElementById('usernamewelcome').textContent += " "+ userName.username.split("@")[0]; 
document.getElementById('username').setAttribute('src', 'https://cdn.pixabay.com/photo/2016/05/05/02/37/sunset-1373171_1280.jpg');
function logout(){
    let userName = sessionStorage.getItem("IS_VALID");
    console.log("logout",userName);
    sessionStorage.clear();
    window.location.href = "http://localhost/skydash/login.php";
  }
// Set session expiration time to 30 minutes (30 * 60 * 1000 milliseconds)
var sessionExpirationTime = 10* 60 * 1000;
// Start a timer for session expiration
var sessionTimer = setTimeout(logout, sessionExpirationTime);
// Optionally, reset the timer when user interacts with the page (e.g., mouse move or key press)
document.addEventListener("mousemove", resetSessionTimer);
document.addEventListener("keypress", resetSessionTimer);

// Function to reset session timer when user interacts with the page
function resetSessionTimer() {
  clearTimeout(sessionTimer); // Clear existing timer
 // console.log("Session timer new");
  sessionTimer = setTimeout(logout, sessionExpirationTime); // Start a new timer
}
  </script>