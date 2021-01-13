let bills = [124, 48, 268] //array of bills

function tip_calculator(a) { //function calculating tips
    let tips = []
    for (let i = 0; i < a.length; i++) {
        if (a[i] <= 50) {
            tips.push(Number((a[i] * (20 / 100)).toFixed(2)));
        } else if (a[i] >= 50 && a[i] <= 200) {
            tips.push(Number((a[i] * (15 / 100)).toFixed(2)));
        } else {
            tips.push(Number((a[i] * (10 / 100)).toFixed(2)));
        }
    }
    return tips;
}
let tip = tip_calculator(bills); // getting tips array
document.write(tip + "<br/>")
    //console.log(tip)
let final = []
for (let i = 0; i < bills.length; i++) {
    final.push(Number(bills[i]) + Number(tip[i]))
}
document.write(final)
    //console.log(final)//final bill