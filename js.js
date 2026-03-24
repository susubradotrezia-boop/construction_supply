function usersList() {
        fetch("php/usersList.php")
        .then(response => response.text())
        .then(data => {
            document.getElementById("tblContainer").innerHTML = data;
        });
    }
    function verifylog() {
        fetch("php/verifylog.php")
        .then(response => response.text())
        .then(data => {
            var res = "";
            res = data;
            if (res == "0") {
                window.location.href = "login.html";
            }
        });
    }

    function logout() {
        var msg = confirm("You are going to logout. Do you want to proceed?");
        if (msg == true) {
            fetch("php/logout.php")
            .then(response => response.text())
            .then(data => {
                window.location.href = "index.html";
            });
        }
    }