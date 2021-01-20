var x = JSON.parse(localStorage.getItem("data"))
var table = document.createElement('table')
table.style.border = "2px solid  black";
table.style.width = "200px";
table.style.height = "200px";
var tr = document.createElement('tr')
tr.style.border = "2px solid  black";
var th1 = document.createElement('th')
var th2 = document.createElement('th')
var th3 = document.createElement('th')

th1.style.border = "2px solid  black";
th2.style.border = "2px solid  black";
th3.style.border = "2px solid  black";

var text1 = document.createTextNode('Name')
var text2 = document.createTextNode('Email')
var text3 = document.createTextNode('DOB')

th1.appendChild(text1)
th2.appendChild(text2)
th3.appendChild(text3)

tr.appendChild(th1)
tr.appendChild(th2)
tr.appendChild(th3)

table.appendChild(tr)
document.body.append(table)
for (let i = 0; i < 1; i++) {
    let b = i
    let row = document.createElement('tr');
    let arr = new Array()
    for (let j = 0; j < 3; j++) {
        arr.push(row.appendChild(document.createElement('td')));
    }
    let obj = Object.keys(x[0])
    console.log(obj)
    for (let k = 0; k < 3; k++) {

        let y = obj[k]
        arr[k].appendChild(document.createTextNode(x[b][y]))

    }
    table.appendChild(row)
}