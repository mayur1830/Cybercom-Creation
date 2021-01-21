document.getElementById('register').addEventListener('click', function fun() {
    var attempt = 1;
    if (attempt === 1) {
        window.location = "registration.html";
    } else {
        alert("Admin already registered")
    }



})
document.getElementById('login').addEventListener('click', function login() {
    var Logintime = []
    if (localStorage.getItem('time')) {
        Logintime = JSON.parse(localStorage.getItem('time'));

    }
    var email = document.getElementById('email').value;
    var pass = document.getElementById('password').value;
    if (email === "abc@123" && pass === "abc") {
        window.location = "dashboard.html";
    } else {

        var x = JSON.parse(localStorage.getItem("user"));
        for (let i = 0; i < x.length; i++) {

            if (x[i].email === email && x[i].pass === pass) {
                const now = new Date()
                Logintime.push(now)
                localStorage.setItem("time", JSON.stringify(Logintime))
                window.location = "dashboard.html"
            }
        }

    }

})
document.getElementById('logout').addEventListener('click', function logout() {
    var Logouttime = []
    if (localStorage.getItem('time1')) {
        Logouttime = JSON.parse(localStorage.getItem('time1'));

    }


    const now = new Date()
    Logouttime.push(now)
    localStorage.setItem("time1", JSON.stringify(Logouttime))
    window.location = "login.html"




})