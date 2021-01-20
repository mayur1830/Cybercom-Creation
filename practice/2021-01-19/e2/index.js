var person = function Info(name, age, email, tel) {
    this.name = name;
    this.age = age;
    this.email = email;
    this.tel = tel

}
var information = new Array();


function data(n) {
    for (let i = 0; i < n; i++) {
        information.push(new person('mayur', 18, 'abc@gmail.com', 8128459608))
        information.push(new person('gaurang', 20, 'abc1@gmail.com', 8128459609))
        information.push(new person('vijay', 22, 'abc2@gmail.com', 8128459607))
        information.push(new person('rahul', 124, 'abc3@gmail.com', 8128459606))
    }
}
data(1)
for (let p = 0; p < information.length; p++) {
    localStorage.setItem('ob' + [p], JSON.stringify(information[p]))
}

var table = document.createElement('table')
table.style.border = "2px solid  black";
table.style.width = "200px";
table.style.height = "200px";
var tr = document.createElement('tr')
tr.style.border = "2px solid  black";
var th1 = document.createElement('th')
var th2 = document.createElement('th')
var th3 = document.createElement('th')
var th4 = document.createElement('th')
th1.style.border = "2px solid  black";
th2.style.border = "2px solid  black";
th3.style.border = "2px solid  black";
th4.style.border = "2px solid  black";
var text1 = document.createTextNode('Name')
var text2 = document.createTextNode('Age')
var text3 = document.createTextNode('Email')
var text4 = document.createTextNode('Telephone')
th1.appendChild(text1)
th2.appendChild(text2)
th3.appendChild(text3)
th4.appendChild(text4)
tr.appendChild(th1)
tr.appendChild(th2)
tr.appendChild(th3)
tr.appendChild(th4)
table.appendChild(tr)
document.body.append(table)
for (let i = 0; i < information.length; i++) {
    let b = i
    let row = document.createElement('tr');
    let arr = new Array()
    for (let j = 0; j < 4; j++) {
        arr.push(row.appendChild(document.createElement('td')));
    }
    let obj = Object.keys(information[0])
    console.log(obj)
    for (let k = 0; k < 4; k++) {

        let y = obj[k]
        arr[k].appendChild(document.createTextNode(information[b][y]))

    }
    // let x;
    // for (let j = i; j < 4; j++) {
    //     x = row.appendChild(document.createElement('td'));
    //     x.appendChild(document.createTextNode(information[j].name))
    //     break;
    // }
    // for (let j = i; j < 4; j++) {
    //     x = row.appendChild(document.createElement('td'));
    //     x.appendChild(document.createTextNode(information[j].age))
    //     break;
    // }
    // for (let j = i; j < 4; j++) {
    //     x = row.appendChild(document.createElement('td'));
    //     x.appendChild(document.createTextNode(information[j].email))
    //     break;
    // }
    // for (let j = i; j < 4; j++) {
    //     x = row.appendChild(document.createElement('td'));
    //     x.appendChild(document.createTextNode(information[j].tel))
    //     break;
    // }
    table.appendChild(row)
}