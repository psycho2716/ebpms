const pwdShowHide = document.querySelectorAll(".eye-icon");

// password show and hide
pwdShowHide.forEach((eyeIcon) => {
  eyeIcon.addEventListener("click", () => {
    let pwFields = eyeIcon.parentElement.parentElement.querySelectorAll(".form-input-password");

    pwFields.forEach((password) => {
      if (password.type === "password") {
        password.type = "text";
        eyeIcon.classList.replace("bx-hide", "bx-show");
        return;
      } else {password.type = "password";
      eyeIcon.classList.replace("bx-show", "bx-hide");
      return;
    }
    });
  });
});