function validate() {

    if (document.myForm.name.value == "") {
        alert("Please provide your name!");
        document.myForm.name.focus();
        return false;
    } else if (document.myForm.password.value == "") {
        alert("Please provide your password!");
        document.myForm.name.focus();
        return false;
    } else if (document.myForm.address.value == "") {
        alert("Please provide your address!");
        document.myForm.name.focus();
        return false;
    } else if (checkbox() == 0) {
        alert("Please select Games!");
        document.myForm.game.focus();
        return false;
    } else if (radio() == 0) {
        alert("Please select Gender!");
        document.myForm.game.focus();
        return false;
    } else if (document.myForm.age.value == "-1") {
        alert("Please provide your Age!");
        return false;
    } else if (!fileValidation()) {
        return false;

    } else {
        alert("Form Submitted Successfully");
        return (true);

    }


}

function fileValidation() {
    var fileInput =
        document.getElementById('file');

    var filePath = fileInput.value;

    // Allowing file type 
    var allowedExtensions =
        /(\.jpg|\.jpeg|\.png|\.gif|\.pdf)$/i;

    if (!allowedExtensions.exec(filePath)) {
        alert('Please Select Valid File');
        fileInput.value = '';
        return false;
    } else {

        return true;
    }
}

function checkbox() {
    var count = 0;
    var checkboxes = document.getElementsByName('game[]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            count = count + 1;
        }
    }
    return count;
}

function radio() {
    var count = 0;
    var checkboxes = document.getElementsByName('gender');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            count = count + 1;
        }
    }
    return count;
}