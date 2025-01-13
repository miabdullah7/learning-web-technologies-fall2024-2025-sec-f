function validateUsername() {
    let username = document.getElementById("username").value;
    let message = document.getElementById("usernameMessage");

    if (username.trim() === "") {
        message.textContent = "Invalid";
        message.style.color = "red";
        return false;
    } else {
        message.textContent = "Valid";
        message.style.color = "green";
        return true;
    }
}

function validateFullname() {
    let fullname = document.getElementById("fullname").value;
    let message = document.getElementById("fullnameMessage");

    if (fullname.trim() === "") {
        message.textContent = "Invalid";
        message.style.color = "red";
        return false;
    } else {
        message.textContent = "Valid";
        message.style.color = "green";
        return true;
    }
}

function validatePassword() {
    let password = document.getElementById("password").value;
    let message = document.getElementById("passwordMessage");

    if (password.trim() === "") {
        message.textContent = "Password cannot be empty";
        message.style.color = "red";
        return false;
    } else {
        message.textContent = "Valid";
        message.style.color = "green";
        return true;
    }
}

function validatePhone() {
    let phone = document.getElementById("phone").value;
    let message = document.getElementById("phoneMessage");

    if (phone.trim() === "") {
        message.textContent = "Contact cannot be empty";
        message.style.color = "red";
        return false;
    } else {
        message.textContent = "Valid";
        message.style.color = "green";
        return true;
    }
}

function ajaxSignup() {
    if (!validateUsername() || !validateFullname() || !validatePassword() || !validatePhone()) {
        alert("Invalid data");
        return;
    }

    let username = document.getElementById("username").value;
    let fullname = document.getElementById("fullname").value;
    let password = document.getElementById("password").value;
    let phone = document.getElementById("phone").value;
    let xhttp = new XMLHttpRequest();

    xhttp.open("POST", "../controller/signupCheck.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(`username=${encodeURIComponent(username)}&fullname=${encodeURIComponent(fullname)}&password=${encodeURIComponent(password)}&phone=${encodeURIComponent(phone)}`);

    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            let response = this.responseText.trim();

            if (response === "success") {
                alert("Signup successful! Redirecting to login...");
                window.location.href = "../view/login.html";
            } else if (response === "error") {
                alert("Signup failed! Please try again.");
            } else {
                alert("Unexpected error: " + response);
            }
        }
    };
}