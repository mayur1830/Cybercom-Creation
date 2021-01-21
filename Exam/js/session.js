var x = JSON.parse(localStorage.getItem("user"));
var y = JSON.parse(localStorage.getItem("time"));
document.write('<div id="data">')
document.write('<table border = "1" id = "t1">');
document.write('<tr>');
document.write('<th>Name</th> <th>Login Time</th>');
document.write('</tr>')
if (x === null) {
    alert("Records not found!");
    document.getElementsByTagName("table").style.display = "none";

} else {
    for (let i = 0; i < x.length; i++) {
        var index = i;
        document.write('<tr>')
        document.write('<td>' + x[i].name + '</td>')
        document.write('<td>' + y[i] + '</td>')
            //document.write('<td><button id="edit" onclick="Edit(index)">Edit</button><button id="delete" onclick="Delete(index)">Delete</button></td>')

        document.write('</tr>')


    }
}
document.write('</table>');
document.write('</div>')