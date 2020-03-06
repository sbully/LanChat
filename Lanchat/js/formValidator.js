let tabInput = document.querySelectorAll('.input');
let v_validForm = document.querySelector('.submit');

var regexPseudo = new RegExp(/^([A-Z]{2,})+[\w.-]*[A-Z\d]{1,}$/, "i");
var regexMail = new RegExp(/^[A-Z][\w.-]*[\w]@([A-Z\d]+([\w-]*[A-Z\d]+)*)*(\.[A-Z\d]+([\w-]*[A-Z\d]+)*)*\.[A-Z]{2,4}$/, "i");
var regexPass = new RegExp(/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?!.*\s).{8,16}$/);
var regexTel = new RegExp(/^(0([\d]{9})|([\d]{2}\s[\d]{2}\s[\d]{2}\s[\d]{2}\s[\d]{2})|(\+33)\s?[\d]{9})$/);

/*
console.log(tabInput);

tabInput.forEach(function (element) {
    element.addEventListener('input', function () {
        f_enable(this);
    });
});



function f_verif(element, index, array) {

    switch (element.getAttribute('name')) {
        case 'Pseudo_User':
            if ((element.value).match(regexPseudo)) {
                console.log("regexPseudo : true");
                return true;
            } else {
                console.log("regexPseudo : False");
                return false;
            }
            console.log("Pseudo_User");
            break;
        case 'Password_User':
            if ((element.value).match(regexPass)) {
                console.log("regexPass : true");
                return true;
            } else {
                console.log("regexPass :False");
                return false;
            }
            console.log("Password_User");
            break;
        case 'Password_User_Confirm': break;
        case 'Mail_User':
            if ((element.value).match(regexMail)) {
                console.log("regexMail :true");
                return true;
            } else {
                console.log("regexMail :False");
                return false;
            }
            console.log("Mail_User");
            break;
        case 'Mail_User_Confirm': break;
        case 'Avatar_User':

            console.log("Avatar_User");
            break;
        default: console.log("Default");
    }
}

function f_enable() {
    if (f_everyInput()) {
        console.log("Valider");
        v_validForm.disabled = false;
    }
    else {
        v_validForm.disabled = true;
    }
}

function f_everyInput() {
    return Array.from(tabInput).every(element => f_verif(element));
}
*/