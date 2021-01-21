document.getElementById('adduser').addEventListener('click', function fun() {
    var arr = []
    if (localStorage.getItem('array')) {
        arr = JSON.parse(localStorage.getItem('array'));

    }
    var obj = {
        name: document.getElementById('name').value,
        email: document.getElementById('email').value,
        pass: document.getElementById('password').value,
        dob: document.getElementById('dob').value

    }
    arr.push(obj)
    console.log(arr)
    localStorage.setItem("array", JSON.stringify(arr))
})