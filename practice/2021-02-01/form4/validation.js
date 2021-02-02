function validate() {

    if (document.myForm.name.value == "") {
        alert("Please provide your Name!");
        document.myForm.name.focus();
        return false;
    } else if (document.myForm.email.value == "") {
        alert("Please provide your Email!");
        document.myForm.email.focus();
        return false;
    } else if (document.myForm.subject.value == "") {
        alert("Please provide your subject!");
        document.myForm.subject.focus();
        return false;
    } else if (document.myForm.message.value == "") {
        alert("Please provide your Message!");
        document.myForm.message.focus();
        return false;
    } else {
        if (validateEmail()) {
            alert("Form Submit Successfully");
            return true;
        } else {
            alert("Please Enter Valid Data")
            return false;
        }
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