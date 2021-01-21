var x = JSON.parse(localStorage.getItem("user"));
var age18 = 0;
for (let i = 0; i < x.length; i++) {
    if (x[i].age < 18) {
        age18 = age18 + 1;
    }
}
document.getElementById('boxin1').innerHTML = age18;
var age19 = 0;
for (let i = 0; i < x.length; i++) {
    if (x[i].age > 19 || x[i].age < 50) {
        age19 = age19 + 1;
    }
}
document.getElementById('boxin2').innerHTML = age19;
var age50 = 0;
for (let i = 0; i < x.length; i++) {
    if (x[i].age > 50) {
        age50 = age50 + 1;
    }
}
document.getElementById('boxin3').innerHTML = age50;