
// Validation for Username
function validateUsername() {
    let username = document.getElementById("username").value;
    let message = document.getElementById("usernameMessage");

    if (username.trim() == "") {
        message.textContent = "Invalid";
        message.style.color = "red";
        return false;
    } else {
        message.textContent = "Valid";
        message.style.color = "green";
        return true;
    }
}

// Validation for Fullname
function validateFullname() {
    let fullname = document.getElementById("fullname").value;
    let message = document.getElementById("fullnameMessage");

    console.log("Fullname: ", fullname); // Debugging log

    if (fullname.trim() == "") {
        message.textContent = "Invalid";
        message.style.color = "red";
        return false;
    } else {
        message.textContent = "Valid";
        message.style.color = "green";
        return true;
    }
}

// Validation for Password
function validatePassword() {
    let password = document.getElementById("password").value;
    let message = document.getElementById("passwordMessage");

    if (password.trim() == "") {
        message.textContent = "Password cannot be empty";
        message.style.color = "red";
        return false;
    } else {
        message.textContent = "Valid";
        message.style.color = "green";
        return true;
    }
}

// Validation for Phone number
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

// Submit function to send the data via AJAX
function ajaxUpdate() {
    if (!validateUsername() || !validateFullname() || !validatePassword() || !validatePhone()) {
        alert("Invalid data. Please correct the highlighted errors.");
        return;
    }

    let username = document.getElementById("username").value;
    let fullname = document.getElementById("fullname").value;
    let password = document.getElementById("password").value;
    let phone = document.getElementById("phone").value;

    let xhttp = new XMLHttpRequest();
    xhttp.open("POST", "../controller/update.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.send(
        `submit=true&username=${encodeURIComponent(username)}&fullname=${encodeURIComponent(fullname)}&password=${encodeURIComponent(password)}&phone=${encodeURIComponent(phone)}`
    );

    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            let response = this.responseText.trim();

            if (response === "success") {
                alert("User updated successfully! Redirecting to user list...");
                window.location.href = "../view/userlist.php";
            } else if (response === "null error") {
                alert("Null entries. Please try again.");
            } else if (response === "error") {
                alert("An error occurred. Please try again.");
            } else if (response === "submit error") {
                alert("Submit error. Please try again.");
            } else {
                alert("Unexpected error: " + response);
            }
        }
    };
}
