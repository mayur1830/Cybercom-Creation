document.getElementById('adduser').addEventListener('click', function fun() {
    var arr = []
    if (localStorage.getItem('user')) {
        arr = JSON.parse(localStorage.getItem('user'));

    }

    var get_age = function getAge() {
        var today = new Date();
        var birthDate = new Date(document.getElementById('dob').value);
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        return age;
    }
    var obj = {
        name: document.getElementById('name').value,
        email: document.getElementById('email').value,
        pass: document.getElementById('password').value,
        dob: document.getElementById('dob').value,
        age: get_age(),

    }
    arr.push(obj)
    console.log(arr)
    localStorage.setItem("user", JSON.stringify(arr))
})
var x = JSON.parse(localStorage.getItem("user"));
document.write('<div id="data">')
document.write('<table border = "1" id = "t1">');
document.write('<tr>');
document.write('<th>Name</th> <th>Email</th> <th>Password</th> <th>BirthDate</th> <th>Age</th> <th>Action</th>');
document.write('</tr>')
if (x === null) {
    alert("Records not found!");
    document.getElementById("t1").style.display = "none";

} else {
    for (let i = 0; i < x.length; i++) {
        var index = i;
        document.write('<tr>')
        document.write('<td>' + x[i].name + '</td>')
        document.write('<td>' + x[i].email + '</td>')
        document.write('<td>' + x[i].pass + '</td>')
        document.write('<td>' + x[i].dob + '</td>')
        document.write('<td>' + x[i].age + '</td>')
        document.write('<td><button id="edit" onclick="Edit(index)">Edit</button><button id="delete" onclick="Delete(index)">Delete</button></td>')

        document.write('</tr>')


    }
}
document.write('</table>');
document.write('</div>')

function Edit(index) {
    document.getElementById("adduser").value = "Update User"
    var name = document.getElementById("name").value = x[index].name
    var email = document.getElementById("email").value = x[index].email
    var password = document.getElementById("password").value = x[index].pass
    var dob = document.getElementById("dob").value = x[index].dob


    //console.log(index)

}

function Delete(index) {
    document.getElementById("t1").deleteRow(index);
    delete x[i].name;
    delete x[i].email;
    delete x[i].pass;
    delete x[i].dob;
    delete x[i].age;

}