const form = document.getElementById('form');
const name1 = document.getElementById('name');
const email = document.getElementById('email');
const phone = document.getElementById('phone');
const password = document.getElementById('password');
const cpassword = document.getElementById('cpassword');



function validate() {
    const name1value = name1.value.trim();
    const emailvalue = email.value.trim();
    const phonevalue = phone.value.trim();
    const passwordvalue = password.value.trim();
    const cpasswordvalue = cpassword.value.trim();

    if (nameval(name1value) && emailval(emailvalue) && phoneval(phonevalue) && passwordval(passwordvalue) && cpasswordval(passwordvalue, cpasswordvalue)) {
        return true

    } else {
        return false;
    }

}

function nameval(name1value) {
    if (name1value === '') {

        //show error
        return setErrorFor(name1, 'Name cannot be blank');
    } else {
        //add success
        return setSuccessFor(name1);
    }
}

function emailval(emailvalue) {
    if (emailvalue === '') {

        //show error
        return setErrorFor(email, 'Email cannot be blank');
    } else if (!(isEmail(emailvalue))) {
        return setErrorFor(email, 'Email is not valid');
    } else {
        //add success
        return setSuccessFor(email);
    }
}

function phoneval(phonevalue) {
    if (phonevalue === '') {
        return setErrorFor(phone, 'Phone Number cannot be blank');
    } else if (!(isPhone(phonevalue))) {
        return setErrorFor(phone, 'Phone Number is not valid');
    } else {
        return setSuccessFor(phone);
    }
}

function passwordval(passwordvalue) {
    if (passwordvalue === '') {

        //show error
        return setErrorFor(password, 'Password cannot be blank');
    } else {
        //add success
        return setSuccessFor(password);
    }
}

function cpasswordval(passwordvalue, cpasswordvalue) {
    if (cpasswordvalue === '') {

        //show error
        return setErrorFor(cpassword, 'Confirm Password cannot be blank');
    } else if (passwordvalue !== cpasswordvalue) {
        return setErrorFor(cpassword, 'Password does not match');
    } else {
        //add success
        return setSuccessFor(cpassword);

    }
}








function setErrorFor(input, message) {
    const formcontrol = input.parentElement; //form control
    const small = formcontrol.querySelector('small');
    //error message
    small.innerText = message;
    //add error class
    formcontrol.className = 'form-control error';
    return false

}

function setSuccessFor(input) {
    const formcontrol = input.parentElement;
    formcontrol.className = 'form-control success';
    return true
}

function isEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function isPhone(phone) {
    if (/^\d{10}$/.test(phone)) {
        return true;

    } else {
        return false;
    }
}