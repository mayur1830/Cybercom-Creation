function fun() {
    var arr = []
    var obj = {
        name: document.getElementById('name').value,
        email: document.getElementById('email').value,
        dob: document.getElementById('db').value,
    }
    arr.push(obj)
    console.log(arr)
    localStorage.setItem("data", JSON.stringify(arr))
}