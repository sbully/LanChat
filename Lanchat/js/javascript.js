//var tabLog = Array.from(document.querySelector('#Pseudo_User,#Password_User,#Mail_User'));


var pseudoUser = document.querySelector('#Pseudo_User');
//var passlogin = document.querySelector('#Password_login');
var passwordUser = document.querySelector('#Password_User');
var inputSub = document.querySelector('#inputValid');
var phone = document.querySelector('#Phone_Number');
var MailUser = document.querySelector('#Mail_User');

var regexPseudo = new RegExp(/^([A-Z]{2,})+[\w.-]*[A-Z\d]{1,}$/, "i");
var regexMail = new RegExp(/^[A-Z][\w.-]*[\w]@([A-Z\d]+([\w-]*[A-Z\d]+)*)*(\.[A-Z\d]+([\w-]*[A-Z\d]+)*)*\.[A-Z]{2,4}$/, "i");
var regexPass = new RegExp(/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?!.*\s).{8,16}$/);
var regexTel = new RegExp(/^(0([\d]{9})|([\d]{2}\s[\d]{2}\s[\d]{2}\s[\d]{2}\s[\d]{2})|(\+33)\s?[\d]{9})$/);

var regexRight = new RegExp(/[123]/); //lol


/*
function supportsCrypto() {
    return window.crypto && window.crypto.subtle && window.TextEncoder;
};
console.log(supportsCrypto());*/

function enable() {
    if (pseudoUser.value.match(regexPseudo) && passwordUser.value.match(regexPass)) {
        inputSub.disabled = false;
    } else {
        inputSub.disabled = true;
    }
};

if (phone != null) {
    phone.addEventListener('input', function () {
        if ((phone.value).match(regexTel)) {
            console.log("true");
        } else {
            console.log("False");
        }
    });
}

if (pseudoUser != null) {
    pseudoUser.addEventListener('input', function () {
        enable();
        if ((pseudoUser.value).match(regexPseudo)) {
            console.log("true");
        } else {
            console.log("False");
        }
    });
}

if (passwordUser != null) {
    passwordUser.addEventListener('input', function () {
        enable();
        if ((passwordUser.value).match(regexPass)) {
            console.log("true");
        } else {
            console.log("False");
        }
    });
}

if (MailUser != null) {
    MailUser.addEventListener('input', function () {
        if ((MailUser.value).match(regexMail)) {
            console.log("true");
        } else {
            console.log("False");
        }
    });
}
/*
if (passwordUser != null) {
    passwordUser.addEventListener('input', function () {
        enable();
        if ((passwordUser.value).match(regexPass)) {
            console.log("true");
        } else {
            console.log("False");
        }



        //crypto('SHA-256', "Hello").then(crypt => {console.log(crypt);});
        //console.log(crypt);
    });
}*/


function crypt_Pass(algo, str) {

    const encoder = new TextEncoder("utf-8");
    const data = encoder.encode(str);
    
    return window.crypto.subtle.digest('SHA-256', data);

    //return crypto.subtle.digest(algo, new TextEncoder().encode(str));
}

$('inputValid').click(function () { console.log("click"); });


function requet() {
    console.log("fonction");

    var request = $.ajax({
        url: './Controlers/myfunction.php',
        method: "POST",
        //dataType:'text',
        data: { refresh: "1" }/*,
        succes: function (data) {
            //reponse=JSON.parseJson(data);
            console.log("reponse:" + data);
        },
        error: function (error) {
            alert("Error" + JSON.stringify(error));
        },
        done: function(data){
            console.log("done reponse : "+data);
        }*/

    });
    request.then(function(reponse){
        /*data=JSON.parse(reponse);
        console.log("data:"+data);*/
        console.log("reponse true:"+reponse['TIMEOUT']);
        if(reponse['TIMEOUT']=='TRUE'){
            document.location.href="./Views/disconnect.php";
        }
        
    });

    //alert(data);
    /*
        request.done(function(){
            request.then(data=>alert(data));
        });
    
        request.fail(function(jqXHR, textStatus){
        console.log("False "+textStatus);
        });*/

}
//setInterval(requet, 2000);

