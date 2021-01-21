document.getElementById('register').addEventListener('click', function fun() {
    var attempt = 1;
    if (attempt === 1) {
        window.location = "registration.html";
    } else {
        alert("Admin already registered")
    }



})
document.getElementById('login').addEventListener('click', function login() {
    var email = document.getElementById('email').value;
    var pass = document.getElementById('password').value;
    if (email === "abc@123" && pass === "abc") {
        window.location = "dashboard.html";
    }
})