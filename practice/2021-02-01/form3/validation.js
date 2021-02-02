function validate() {

    if (document.myForm.firstname.value == "") {
        alert("Please provide your Firstname!");
        document.myForm.firstname.focus();
        return false;
    } else if (document.myForm.lastname.value == "") {
        alert("Please provide your Lastname!");
        document.myForm.latname.focus();
        return false;
    } else if (document.myForm.month.value == "-1") {
        alert("Please select Month!");
        document.myForm.month.focus();
        return false;
    } else if (document.myForm.day.value == "-1") {
        alert("Please select Day!");
        document.myForm.day.focus();
        return false;
    } else if (document.myForm.year.value == "-1") {
        alert("Please select Year!");
        document.myForm.year.focus();
        return false;
    } else if (radio('gender') == 0) {
        alert("Please select Gender!");

        document.myForm.gender.focus();
        return false;
    } else if (document.myForm.country.value == "-1") {
        alert("Please select Country!");
        document.myForm.country.focus();
        return false;
    } else if (document.myForm.email.value == "") {
        alert("Please provide your Email!");
        document.myForm.email.focus();
        return false;
    } else if (document.myForm.phone.value == "") {
        alert("Please provide your Phone Number!");
        document.myForm.phone.focus();
        return false;
    } else if (document.myForm.password.value == "") {
        alert("Please provide your password!");
        document.myForm.password.focus();
        return false;
    } else if (document.myForm.cpassword.value == "") {
        alert("Please provide your Confirm password!");
        document.myForm.cpassword.focus();
        return false;
    } else if (!(document.getElementById("agree").checked === true)) {
        alert("Please select Agreement Statement!");
        document.myForm.agree.focus();
        return false;
    } else {
        if (true) {
            let x = phone();
            let y = password();
            let z = email();

            if (x && y && Z) {
                alert("Form Submitted Successfully");
                return true;
            } else {
                alert("Enter Valid Data");
                return false;
            }
        }


    }


}

function phone() {
    var phone = document.myForm.phone.value;
    if (isNaN(phone)) {
        alert("Enter valid mobile Number");
        return false;

    } // else if (!(phone.length === 10)) {
    //     alert("Enter valid mobile Number");
    //     return false;

    // } 
    else {
        return true;
    }
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

function password() {
    var pass = document.myForm.password.value;
    var cpass = document.myForm.cpassword.value;
    if (pass === cpass) {
        return true
    } else {
        alert("Your Password does not matched")
        return false
    }
}

function validateEmail() {
    var emailID = document.myForm.email.value;
    atpos = emailID.indexOf("@");
    dotpos = emailID.lastIndexOf(".");

    if (atpos < 1 || (dotpos - atpos < 2)) {
        alert("Please enter correct email ID")
        document.myForm.email.focus();
        return false;
    } else {
        return true;
    }

}