const icon = document.querySelectorAll('.eye-icon');
const input = document.getElementById('inputPassword');

// password show and hide
icon.forEach(eyeIcon => {
    eyeIcon.addEventListener("click", () => {
        let pwFields = eyeIcon.parentElement.parentElement.querySelectorAll('.form-input-password');
        
        pwFields.forEach(password => {
            if (password.type === "password") {
                password.type = "text";
                eyeIcon.classList.replace("bx-hide", "bx-show");
                return;
            }
                password.type = "password";
                eyeIcon.classList.replace("bx-show", "bx-hide");
                return;
        })
    });
});