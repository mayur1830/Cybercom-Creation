var Admin_info = {
    name: document.getElementById('name').value,
    email: document.getElementById('email').value,
    pass: document.getElementById('password').value,
    conpass: document.getElementById('cpassword').value,
    city: document.getElementById('city').value,

}
document.getElementById('register').addEventListener('click', function fun() {
    alert('Registration Successfully')
    window.location = "login.html"

})