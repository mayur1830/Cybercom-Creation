var Admin_info = {
    name: document.getElementById('name').value,
    email: document.getElementById('email').value,
    pass: document.getElementById('password').value,
    conpass: document.getElementById('cpassword').value,
    city: document.getElementById('city').value,
    tc: document.getElementById('tc').value,

}

document.getElementById('register').addEventListener('click', function fun() {

    var a = document.forms["myForm"]["name"].value
    var b = document.forms["myForm"]["email"].value
    var c = document.forms["myForm"]["password"].value
    var d = document.forms["myForm"]["cpassword"].value
    var e = document.forms["myForm"]["city"].value
    var f = document.forms["myForm"]["state"].value
    var g = document.forms["myForm"]["tc"].value
    if (a === " " || b === " " || c === " " || d === " " || e === " " || f === " " || g === " ") {
        alert("All Fields Are Required")
    } else {
        alert('Registration Successfully')
        window.location = "login.html"
    }


}.bind(this))