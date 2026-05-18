let form = document.forms[0];
let nameField = document.getElementById("form-name");
let emailField = document.getElementById("form-email");
let passwordField = document.getElementById("form-pass");

form.addEventListener("submit", (e) => {
    e.preventDefault();
    hideErrorMessage(nameField);
    hideErrorMessage(emailField);
    hideErrorMessage(passwordField);

    if (checkFullName() && checkEmail() && checkPassword()) {
        form.submit();
    }
});

function checkFullName() {
    const nameRegex = /^[a-zA-Z ]{3,}$/;
    if (!nameRegex.test(nameField.value)) {
        showErrorMessage(nameField, "Please enter a valid Full Name!");
        return false;
    }
    return true;
}

function checkEmail() {
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!emailRegex.test(emailField.value)) {
        showErrorMessage(emailField, "Please enter a valid Email!");
        return false;
    }
    return true;
}

function checkPassword() {
    const passwordRegex = /^.{8,}$/;
    if (!passwordRegex.test(passwordField.value)) {
        showErrorMessage(passwordField, "Password must contains at least 8 characters!");
        return false;
    }
    return true;
}

function showErrorMessage(fieldElement, message) {
    let errorMessage = document.createElement("span");
    let inputContainer = fieldElement.parentElement;

    errorMessage.textContent = message;
    errorMessage.className = "text-red-500 text-sm";

    inputContainer.appendChild(errorMessage);
    fieldElement.classList.add("border-red-500");
}

function hideErrorMessage(fieldElement) {
    if (fieldElement.nextElementSibling) {
        if (fieldElement.nextElementSibling.tagName === "SPAN") {
            fieldElement.classList.remove("border-red-500");
            fieldElement.nextElementSibling.remove();
        }
    }
}


