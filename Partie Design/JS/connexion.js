var pseudoOK=false;
var passwdOK=false;
var mailOK=false;
function init(){
    var pseudo=document.getElementById("Pseudo");
    pseudo.addEventListener("blur", function(){VerificationPseudo(pseudo.value);}, false);

    var passwd=document.getElementById("Password");
    passwd.addEventListener("blur", function(){VerificationPassword(passwd.value);}, false);
}

function VerificationPseudo(pseudo){
    mailOK=false;
    pseudoOK=false;
    if(/^[a-zA-Z0-9\._\-]+\@[a-zA-Z0-9\._\-]{2,}\.[a-z]{2,4}$/.test(pseudo)){
        //On a entré l'adresse mail
        mailOK=true;
        document.getElementById("VerifPseudo").textContent="";
    }
    else if(pseudo.length>=5 && pseudo.length<=15){
        //on a entré le pseudo
        pseudoOK=true;
        document.getElementById("VerifPseudo").textContent="";
    }
    else {
        document.getElementById("VerifPseudo").textContent="Le pseudo entré n'est pas du bon format.";
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
