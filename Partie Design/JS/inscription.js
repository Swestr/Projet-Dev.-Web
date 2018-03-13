var pseudoOK=false;
var passwdOK=false;
var mailOK=false;
function init(){
    var pseudo=document.getElementById("Pseudo");
    pseudo.addEventListener("blur", function(){VerificationPseudo(pseudo.value);}, false);

    var passwd=document.getElementById("Password");
    passwd.addEventListener("blur", function(){VerificationPassword(passwd.value);}, false);

    var mail=document.getElementById("Mail");
    mail.addEventListener("blur", function(){VerificationMail(mail.value);}, false);
}

function VerificationPseudo(pseudo){
    if(pseudo.length<5){
        document.getElementById("VerifPseudo").textContent="Le pseudo n'est pas assez long.";
        pseudoOK=false;
    }
    else if(pseudo.length>15){
        document.getElementById("VerifPseudo").textContent="Le pseudo est trop long.";
        pseudoOK=false;
    }
    else {
        pseudoOK=true;
        document.getElementById("VerifPseudo").textContent="";
    }
}

function VerificationPassword(passwd){
    if(passwd.length<5){
        document.getElementById("VerifPasswd").textContent="Le mot de passe n'est pas assez long.";
        passwdOK=false;
    }
    else {
        passwdOK=true;
        document.getElementById("VerifPasswd").textContent="";
    }
}


function VerificationMail(mail){
    if(!/^[a-zA-Z0-9\._\-]+\@[a-zA-Z0-9\._\-]{2,}\.[a-z]{2,4}$/.test(mail)){
        document.getElementById("VerifMail").textContent="L'adresse mail n'est pas valide.";
        mailOK=false;
    }
    else {
        mailOK=true;
        document.getElementById("VerifMail").textContent="";
    }
}
