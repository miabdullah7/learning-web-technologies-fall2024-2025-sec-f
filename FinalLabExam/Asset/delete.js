function ajaxDelete() {
    let xhttp = new XMLHttpRequest();
    
    xhttp.open("POST", "../controller/confirmDelete.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.send("submit=true");

    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            let response = this.responseText.trim();
            if (response === "success") {
                alert("User successfully deleted!");
                window.location.href = "../view/userlist.php"; 
            } else {
                alert("Error occurred while deleting the user.");
            }
        }
    };
}