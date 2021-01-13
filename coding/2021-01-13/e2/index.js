let Mark = {
    full_name: 'Mark',
    mass: 70,
    height: 3,
    bmi: function() {
        return (this.mass / (this.height * this.height))
    }
}
let John = {
    full_name: 'John',
    mass: 60,
    height: 4,
    bmi: function() {
        return (this.mass / (this.height * this.height))
    }
}
x = Mark.bmi()
y = John.bmi()
if (x > y) {
    document.write(Mark.full_name + " has highest BMI" + " " + x + "<br/>")
} else if (x == y) {
    document.write("Both has same BMI")
} else {
    document.write(John.full_name + " has highest BMI" + " " + y + "<br/>")
}