const rmCheck = document.getElementById("remember");
const passInput = document.getElementById("password");
const emailInput = document.getElementById("email");

if (localStorage.checkbox && localStorage.checkbox !== "") {
    rmCheck.setAttribute("checked", "checked");
    passInput.value = localStorage.passInput;
    emailInput.value = localStorage.email;
} else {
    rmCheck.removeAttribute("checked");
    passInput.value = "";
    emailInput.value = "";
}

function Remember() {
    if (rmCheck.checked && emailInput.value !== "" && passInput.value !== "") {
        localStorage.email = emailInput.value;
        localStorage.passInput = passInput.value;
        localStorage.checkbox = rmCheck.value;
    } else {
        localStorage.email = "";
        localStorage.passInput = "";
        localStorage.checkbox = "";
    }
}

rmCheck.addEventListener("change", Remember);
emailInput.addEventListener("change", Remember);
passInput.addEventListener("change", Remember);