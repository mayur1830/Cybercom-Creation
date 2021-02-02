function validate() {

    if (document.myForm.name.value == "") {
        alert("Please provide your name!");
        document.myForm.name.focus();
        return false;
    } else if (document.myForm.password.value == "") {
        alert("Please provide your password!");
        document.myForm.password.focus();
        return false;
    } else if (radio('gender') == 0) {
        alert("Please select Gender!");

        document.myForm.gender.focus();
        return false;
    } else if (document.myForm.month.value == "-1") {
        alert("Please select Month!");
        document.myForm.game.focus();
        return false;
    } else if (document.myForm.day.value == "-1") {
        alert("Please select Day!");
        document.myForm.day.focus();
        return false;
    } else if (document.myForm.year.value == "-1") {
        alert("Please select Year!");
        document.myForm.year.focus();
        return false;
    } else if (checkbox() == 0) {
        alert("Please select Games!");
        document.myForm.game.focus();
        return false;
    } else if (radio('marriage') == 0) {
        alert("Please select Maritial status!");
        document.myForm.marriage.focus();
        return false;
    } else if (!(document.getElementById("agree").checked === true)) {
        alert("Please select Agreement Statement!");
        document.myForm.agree.focus();
        return false;
    } else {
        alert("Form Submitted Successfully");
        return (true);

    }


}

function checkbox() {
    let count = 0;
    var checkboxes = document.getElementsByName('game[]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            count = count + 1;
        }
    }
    return count;
}

function radio(name) {
    let count = 0;
    let status = 0;
    var checkboxes = document.getElementsByName(name);
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            count = count + 1;
        }
    }
    status = count;
    count = 0;
    return status;

}