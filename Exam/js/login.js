document.getElementById('register').addEventListener('click', function fun() {
    var attempt = 1
    if (attempt === 0) {
        alert('Admin already Registered')
    } else {
        window.location = "registration.html";
    }
    var Admin_info = {
        name: document.getElementById('admin_name').value,
        email: document.getElementById('admin_email').value,
        pass: document.getElementById('admin_password').value,
        conpass: document.getElementById('admin_cpassword').value,
        city: document.getElementById('admin_city').value,
        state: document.getElementById('admin_state').value
    }
    document.getElementById('admin_register').addEventListener('click', function register() {
        window.location = "login.html"
        alert('Registration Successfully')
        attempt--
        document.getElementById('register').disabled = true;
    })






})