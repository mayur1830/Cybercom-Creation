const form = document.getElementById('form');
const name1 = document.getElementById('name');
const email = document.getElementById('email');
const phone = document.getElementById('phone');
const title = document.getElementById('title');
const date = document.getElementById('date');




function validate() {
    const name1value = name1.value.trim();
    const emailvalue = email.value.trim();
    const phonevalue = phone.value.trim();
    const titlevalue = title.value.trim();
    const datevalue = date.value.trim();


    if (name1value === '') {

        //show error
        return setErrorFor(name1, 'Name cannot be blank');
    } else {
        //add success
        setSuccessFor(name1);
    }
    if (emailvalue === '') {

        //show error
        return setErrorFor(email, 'Email cannot be blank');
    } else if (!(isEmail(emailvalue))) {
        return setErrorFor(email, 'Email is not valid');
    } else {
        //add success
        setSuccessFor(email);
    }
    if (phonevalue === '') {
        return setErrorFor(phone, 'Phone Number cannot be blank');
    } else if (!(isPhone(phonevalue))) {
        return setErrorFor(phone, 'Phone Number is not valid');
    } else {
        setSuccessFor(phone);
    }
    if (titlevalue === '') {
        return setErrorFor(title, 'Title cannot be blank');
    } else {
        setSuccessFor(title);
    }
    if (datevalue === '') {
        return setErrorFor(date, 'Date & Time  cannot be blank');
    } else {
        setSuccessFor(date);
    }
    return true;





}

// function nameval(name1value) {
//     if (name1value === '') {

//         //show error
//         return setErrorFor(name1, 'Name cannot be blank');
//     } else {
//         //add success
//         return setSuccessFor(name1);
//     }
// }

// function emailval(emailvalue) {
//     if (emailvalue === '') {

//         //show error
//         return setErrorFor(email, 'Email cannot be blank');
//     } else if (!(isEmail(emailvalue))) {
//         return setErrorFor(email, 'Email is not valid');
//     } else {
//         //add success
//         return setSuccessFor(email);
//     }
// }

// function phoneval(phonevalue) {
//     if (phonevalue === '') {
//         return setErrorFor(phone, 'Phone Number cannot be blank');
//     } else if (!(isPhone(phonevalue))) {
//         return setErrorFor(phone, 'Phone Number is not valid');
//     } else {
//         return setSuccessFor(phone);
//     }
// }

// function titleval(titlevalue) {
//     if (titlevalue === '') {
//         return setErrorFor(title, 'Title cannot be blank');
//     } else {
//         return setSuccessFor(title);
//     }


// }

// function titleval(datevalue) {
//     if (datevalue === '') {
//         return setErrorFor(date, 'Date & Time  cannot be blank');
//     } else {
//         return setSuccessFor(date);
//     }


// }






function setErrorFor(input, message) {
    const formcontrol = input.parentElement; //form control
    const small = formcontrol.querySelector('small');
    //error message
    small.innerText = message;
    //add error class
    formcontrol.className = 'form-group error';
    return false

}

function setSuccessFor(input) {
    const formcontrol = input.parentElement;
    formcontrol.className = 'form-group success';
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