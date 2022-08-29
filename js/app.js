const pwdShowHide = document.querySelectorAll(".eye-icon");

// password show and hide
pwdShowHide.addEventListener('click', () => {
  let pwFields = document.querySelectorAll(".form-input-password");

  if (pwFields.type === "password") {
    pwFields.type = "text";
    pwdShowHide.classList.replace("bx-show", "bx-hide");
  } else {
    pwFields.type = "password";
    pwdShowHide.classList.replace("bx-hide", "bx-show");
  }
})