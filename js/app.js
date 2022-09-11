const pwdShowHide = document.querySelector(".eye-icon");

// password show and hide
pwdShowHide.addEventListener('click', () => {
  let pwFields = document.querySelector(".form-input-password");
  let confirmPassword = document.querySelector(".confirm_password_input");

  if (pwFields.type === "password" && confirmPassword.type === "password") {
    pwFields.type = "text";
    confirmPassword.type = "text";
    pwdShowHide.classList.replace("bx-hide", "bx-show");

  } else {
    pwFields.type = "password";
    pwdShowHide.classList.replace("bx-show", "bx-hide");
    confirmPassword.type = "password";
  }
})