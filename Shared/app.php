<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ShopGlamor</title>
    <link rel="icon" href="./images/Logo.png" type="image/png" />

    <!-- CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="./public/styles/index.css" />
    <link rel="stylesheet" href="./public/styles/toaster.css" />
  </head>

  <body>
    <div id="toast-container"></div>

    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-8 form-design">
          <!-- Website Logo -->
          <div class="text-center">
            <img
              src="./images/Logo-removebg-preview.png"
              alt="ShopGlamor Logo"
              class="logo"
            />
          </div>
          <!-- Form Container -->
          <div class="form-container">
            <!-- Signup Form -->
            <div id="signup-form" class="toggle-form">
              <h3 class="text-center mb-4 form-heading">Sign Up</h3>
              <!-- Form Fields -->
              <form
                id="signup-form-content"
                action="./public/dbrequests/register.php"
                method="post"
              >
                <div class="form-group">
                  <input
                    type="email"
                    name="email"
                    class="form-control"
                    id="email"
                    placeholder=" "
                    required
                  />
                  <label for="email" class="form-label">Email Address</label>
                </div>
                <div class="form-group">
                  <input
                    type="password"
                    name="password"
                    class="form-control"
                    id="password"
                    placeholder=" "
                    required
                  />
                  <label for="password" class="form-label">Password</label>
                </div>
                <div class="form-group">
                  <input
                    type="password"
                    class="form-control"
                    id="confirmPassword"
                    placeholder=" "
                    required
                  />
                  <label for="confirmPassword" class="form-label"
                    >Confirm Password</label
                  >
                </div>
                <div class="form-group">
                  <select class="form-select" name="usertype" id="userType">
                    <option value="" disabled selected>Select User Type</option>
                    <option value="Customer">Customer</option>
                    <option value="Vendor">Vendor</option>
                  </select>
                </div>
                <button
                  type="submit"
                  id="submit-form"
                  class="form-button w-100"
                >
                  Sign Up
                </button>
                <div class="form-footer">
                  <p>
                    Already have an account?
                    <a href="#login" id="login-link">Login</a>
                  </p>
                </div>
              </form>
            </div>

            <!-- Login Form -->
            <div id="login-form" class="toggle-form active">
              <h3 class="text-center mb-4 form-heading">Login</h3>
              <form action="./public/dbrequests/login.php" method="post">
                <!-- Form Fields -->
                <div class="form-group">
                  <input
                    type="email"
                    name="email"
                    class="form-control"
                    id="loginEmail"
                    placeholder=" "
                    required
                  />
                  <label for="loginEmail" class="form-label"
                    >Email Address</label
                  >
                </div>
                <div class="form-group">
                  <input
                    type="password"
                    name="password"
                    class="form-control"
                    id="loginPassword"
                    placeholder=" "
                    required
                  />
                  <label for="loginPassword" class="form-label">Password</label>
                </div>
                <div class="mb-3 text-center">
                  <a href="#" id="forgot-pass-link">Forgot Password?</a>
                </div>
                <button type="submit" class="form-button w-100">Login</button>
                <div class="form-footer">
                  <p>
                    Don't have an account?
                    <a href="#signup" id="signup-link">Sign Up</a>
                  </p>
                </div>
              </form>
            </div>

            <!-- Forgot password -->
            <div id="forgot-pass-form" class="toggle-form">
              <h3 class="text-center mb-4 form-heading">Change Password</h3>
              <form
                id="forgot-pass-form-content"
                action="./public/dbrequests/changepassword.php"
                method="post"
              >
                <!-- Form Fields -->
                <div class="form-group">
                  <input
                    type="email"
                    name="email"
                    class="form-control"
                    id="forgotPassEmail"
                    placeholder=" "
                    required
                  />
                  <label for="forgotPassEmail" class="form-label"
                    >Email Address</label
                  >
                </div>
                <div class="form-group">
                  <input
                    type="password"
                    name="password"
                    class="form-control"
                    id="forgotPasspassword"
                    placeholder=" "
                    required
                  />
                  <label for="forgotPasspassword" class="form-label"
                    >Password</label
                  >
                </div>
                <div class="form-group">
                  <input
                    type="password"
                    class="form-control"
                    id="forgotPassconfirmPassword"
                    placeholder=" "
                    required
                  />
                  <label for="forgotPassconfirmPassword" class="form-label"
                    >Confirm Password</label
                  >
                </div>
                <div class="mb-3 text-center">
                  <a href="#" id="otp">Send OTP</a>
                </div>
                <div class="form-group">
                  <div class="otp-container">
                    <input
                      type="text"
                      class="otp-box"
                      maxlength="1"
                      oninput="moveFocus(this, event)"
                    />
                    <input
                      type="text"
                      class="otp-box"
                      maxlength="1"
                      oninput="moveFocus(this, event)"
                    />
                    <input
                      type="text"
                      class="otp-box"
                      maxlength="1"
                      oninput="moveFocus(this, event)"
                    />
                    <input
                      type="text"
                      class="otp-box"
                      maxlength="1"
                      oninput="moveFocus(this, event)"
                    />
                    <input
                      type="text"
                      class="otp-box"
                      maxlength="1"
                      oninput="moveFocus(this, event)"
                    />
                    <input
                      type="text"
                      class="otp-box"
                      maxlength="1"
                      oninput="moveFocus(this, event)"
                    />
                  </div>
                </div>
                <button
                  type="button"
                  id="validate-otp"
                  class="form-button w-100"
                >
                  Change Password
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="./public/js/app.js"></script>
    <script src="./public/js/toaster.js"></script>

    <script>
      window.addEventListener("DOMContentLoaded", (event) => {
        const toasterMessage = localStorage.getItem('toaster_message');
        const toasterType = localStorage.getItem('toaster_type');
        if (toasterMessage && toasterType){
          showToast(toasterMessage, toasterType);
          switch (toasterMessage) {
            case "Welcome to ShopGlamor!, have a good earning 😊":
              setTimeout(() => { window.location.href = '../Vendor/home.php'; }, 1000);
              break;
            case "Welcome to ShopGlamor!, have a nice shopping 😊":
              setTimeout(() => { window.location.href = '../Customer/home.php'; }, 1000);
              break;
          }
        }
        localStorage.removeItem('toaster_message');
        localStorage.removeItem('toaster_type');
      });
    </script>
  </body>
</html>
