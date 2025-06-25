function showPassword() {
    let x = document.getElementById("mdp");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

function showPassword2() {
    let x = document.getElementById("mdp2");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

function showPassword3() {
    let x = document.getElementById("mdp3");
    var toggleIcon = document.getElementById("togglePassword");

    if (x.type === "password") {
        x.type = "text";
        toggleIcon.src = "../Public/img/eye-open.png";
    } else {
        x.type = "password";
        toggleIcon.src = "../Public/img/eye-close.png";
    }
}