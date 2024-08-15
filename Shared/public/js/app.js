const loginForm = document.getElementById("login-form");
const signupForm = document.getElementById("signup-form");
const forgotPassForm = document.getElementById("forgot-pass-form");

// Toggle between Signup and Login Forms
document.getElementById("signup-link").addEventListener("click", (event) => {
  event.preventDefault();
  toggleForms(signupForm, loginForm);
});

document.getElementById("login-link").addEventListener("click", (event) => {
  event.preventDefault();
  if (forgotPassForm.classList.contains("active")) {
    toggleForms(loginForm, forgotPassForm);
  } else {
    toggleForms(loginForm, signupForm);
  }
});

// Toggle between Forgot Password and Login Forms
document.getElementById("forgot-pass-link").addEventListener("click", (event) => {
  event.preventDefault();
  toggleForms(forgotPassForm, loginForm);
});

function toggleForms(showForm, hideForm) {
  showForm.classList.add("active");
  hideForm.classList.remove("active");
}

// OTP generation and validation
let generatedOtp = "";

function moveFocus(current, event) {
  const next = current.nextElementSibling;
  const prev = current.previousElementSibling;
  if (event.inputType === "insertText" && next && current.value.length === 1) {
    next.focus();
  } else if (event.inputType === "deleteContentBackward" && prev) {
    prev.focus();
  }
}

function generateRandom6DigitNumber() {
  return Math.floor(100000 + Math.random() * 900000);
}

function generateOtp() {
  generatedOtp = generateRandom6DigitNumber().toString();
  alert(`Your OTP is: ${generatedOtp}`);
  document.querySelectorAll(".otp-box").forEach((box) => (box.value = ""));
}

function validateOtp(event) {
  event.preventDefault();

  const enteredOtp = Array.from(document.querySelectorAll(".otp-box"))
    .map((box) => box.value)
    .join("");

  if (enteredOtp === generatedOtp) {
    const password = document.getElementById('forgotPasspassword').value;
    const confirmPassword = document.getElementById('forgotPassconfirmPassword').value;
    
    if (password !== confirmPassword) {
      showToast("Passwords don't match!", "warning");
    } else {
      showToast("Password changed successfully!", "success");
      setTimeout(() => {
        document.getElementById("forgot-pass-form-content").submit();
      }, 1000);
    }
  } else {
    showToast("Incorrect OTP. Please try again.", "warning");
  }

  document.querySelectorAll(".otp-box").forEach(box => box.value = '');
}

document.getElementById("otp").addEventListener("click", generateOtp);
document.getElementById("validate-otp").addEventListener("click", validateOtp);

function passWordCheck(event) {
  event.preventDefault(); 

  const password = document.getElementById('password').value;
  const confirmPassword = document.getElementById('confirmPassword').value;
  
  if (password !== confirmPassword) {
    showToast("Passwords don't match!", "warning");
  } else {
    showToast("You are successfully registered!", "success");
    setTimeout(() => {
      document.getElementById("signup-form-content").submit();
    }, 1000);
  }
}

document.getElementById("submit-form").addEventListener("click", passWordCheck);