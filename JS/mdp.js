function showPassword() {
    var x = document.getElementById("mdp");
    var y = document.getElementById("confirmmdp");
    var toggleIcon = document.getElementById("togglePassword");

    if (x.type === "password") {
        x.type = "text";
        toggleIcon.src = "../Public/img/eye-open.png";
    } else {
        x.type = "password";
        toggleIcon.src = "../Public/img/eye-close.png";
    }
}