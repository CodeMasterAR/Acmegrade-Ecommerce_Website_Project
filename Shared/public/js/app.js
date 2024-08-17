const loginForm = document.getElementById("login-form");
const signupForm = document.getElementById("signup-form");
const forgotPassForm = document.getElementById("forgot-pass-form");

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

let otpLink = document.getElementById("otp");
let otpTimer;


function startOtpTimer() {
  let timeLeft = 15;

  otpLink.textContent = `OTP invalid after ${timeLeft} seconds`;

  otpTimer = setInterval(() => {
    timeLeft -= 1;
    otpLink.textContent = `OTP invalid after ${timeLeft} seconds`;

    if (timeLeft <= 0) {
      clearInterval(otpTimer);
      otpLink.textContent = "Send OTP";
      otpLink.disabled = false;
    }
  }, 1000);
}

function generateOtp() {
  if (otpLink.disabled) return; // Prevent multiple clicks

  generatedOtp = generateRandom6DigitNumber().toString();
  alert(`Your OTP is: ${generatedOtp}`);
  document.querySelectorAll(".otp-box").forEach((box) => (box.value = ""));

  otpLink.disabled = true; // Disable the OTP link during countdown

  startOtpTimer(); // Start the countdown timer

  setTimeout(() => {
    generatedOtp = '';
    showToast("Your OTP has expired. Please request a new one.");
  }, 15000); // OTP expires after 15 seconds
}

function validateOtp(event) {
  event.preventDefault();

  const enteredOtp = Array.from(document.querySelectorAll(".otp-box"))
    .map((box) => box.value)
    .join("");

  if (enteredOtp !== "" && enteredOtp === generatedOtp) {
    const password = document.getElementById('forgotPasspassword').value;
    const confirmPassword = document.getElementById('forgotPassconfirmPassword').value;
    
    if (password !== confirmPassword) {
      showToast("Passwords don't match!", "warning");
    } else {
      document.getElementById("forgot-pass-form-content").submit();
    }
  } else {
    showToast("Incorrect OTP. Please try again.", "warning");
  }

  document.querySelectorAll(".otp-box").forEach(box => box.value = '');
}


document.getElementById("otp").addEventListener("click", generateOtp);
document.getElementById("validate-otp").addEventListener("click", function(event) {validateOtp(event)});

function passWordCheck(event) {
  event.preventDefault(); 

  const password = document.getElementById('password').value;
  const confirmPassword = document.getElementById('confirmPassword').value;
  
  if (password !== confirmPassword) {
    showToast("Passwords don't match!", "warning");
  } else {
    document.getElementById("signup-form-content").submit();
  }
}

document.getElementById("submit-form").addEventListener("click", function(event) {passWordCheck(event) });